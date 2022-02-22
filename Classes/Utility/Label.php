<?php
declare(strict_types=1);

namespace ReCentGlobe\Rcgprojectdb\Utility;

/**
 * This file is part of the "ReCentGlobe Database" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Florian Förster <florian.foerster@uni-leipzig.de>, ReCentGlobe
 */

use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * Dynamic label of the address record based on tsconfig
 */
class Label
{
    private const FALLBACK = [
        ['lastname', 'firstname'],
        ['email'],
    ];

    public function getObjectLabel(&$params, &$pObj)
    {
        if ($params['table'] !== 'tx_rcgprojectdb_domain_model_person') {
            return '';
        }
        // Get complete record
        $rec = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($params['table'], $params['row']['uid']);
        // Write to the label
        $params['title'] = $rec['firstname'] . ' ' . $rec['lastname'];
    }

    public function getAddressLabel(array &$params): void
    {
        if (!($params['row']['pid'] ?? 0)) {
            return;
        }

        $row = $params['row'];
        $configuration = $this->getConfiguration($row['pid']);
        if (!$configuration) {
            return;
        }

        foreach ($configuration as $fieldList) {
            $label = [];
            foreach ($fieldList as $field) {
                if (isset($row[$field]) && !empty($row[$field])) {
                    $label[] = BackendUtility::getProcessedValue('tx_rcgprojectdb_project_person', $field, $row[$field], 0, false, 0, $row['uid']);
                }
            }
            if (!empty($label)) {
                $params['title'] = implode(', ', $label);
                return;
            }
        }
    }

    protected function getConfiguration(int $pid): array
    {
        $labelConfiguration = BackendUtility::getPagesTSconfig($pid)['tx_rcgprojectdb_project_person.']['label'] ?? '';
        if (!$labelConfiguration) {
            return self::FALLBACK;
        }

        $configuration = [];
        $options = GeneralUtility::trimExplode(';', $labelConfiguration, true);
        foreach ($options as $option) {
            $configuration[] = GeneralUtility::trimExplode(',', $option, true);
        }
        return $configuration;
    }
}