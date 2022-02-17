<?php
declare(strict_types=1);

namespace ReCentGlobe\Rcgprojectdb\Hooks\Tca;

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

/**
 * Dynamic label of the address record based on tsconfig
 */
class Label
{
    private const FALLBACK = [
        ['lastname', 'firstname'],
        ['email'],
    ];

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
                    $label[] = BackendUtility::getProcessedValue('tt_address', $field, $row[$field], 0, false, 0, $row['uid']);
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
        $labelConfiguration = BackendUtility::getPagesTSconfig($pid)['tt_address.']['label'] ?? '';
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