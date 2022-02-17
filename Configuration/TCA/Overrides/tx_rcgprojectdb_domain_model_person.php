<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManager;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Extbase\Object\ObjectManager;

defined('TYPO3_MODE') || die();

$ll = 'LLL:EXT:rcgprojectdb/Resources/Private/Language/locallang_db.xlf:';

$objectManager = GeneralUtility::makeInstance(ObjectManager::class);
$configurationManager = $objectManager->get(ConfigurationManager::class);
$extbaseFrameworkConfiguration = $configurationManager->getConfiguration(ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT);
$categoryPid = $extbaseFrameworkConfiguration['plugin.']['tx_rcgprojectdb.']['settings.']['categories.'];


ExtensionManagementUtility::makeCategorizable(
    'rcgprojectdb',
    'tx_rcgprojectdb_domain_model_person',
    'research_area',
    [
        // Set a custom label
        'label' => $ll . 'tx_rcgprojectdb_domain_model_person.research_area',
        'fieldConfiguration' => [
            'foreign_table_where' => ' AND sys_category.sys_language_uid IN (-1, 0) ORDER BY sys_category.title ASC',
            'treeConfig' => [
                'rootUid' => $categoryPid['researchAreas'],
                'size' => 5,
                'appearance' => [
                    'expandAll' => true,
                    'showHeader' => false,
                    'nonSelectableLevels' => '0',
                ],
            ]
        ],
    ]
);

ExtensionManagementUtility::makeCategorizable(
    'rcgprojectdb',
    'tx_rcgprojectdb_domain_model_person',
    'position',
    [
        // Set a custom label
        'label' => $ll . 'tx_rcgprojectdb_domain_model_person.position',
        'fieldConfiguration' => [
            'foreign_table_where' => ' AND sys_category.sys_language_uid IN (-1, 0) ORDER BY sys_category.title ASC',
            'treeConfig' => [
                'rootUid' => $categoryPid['position'],
                'size' => 5,
                'appearance' => [
                    'expandAll' => true,
                    'showHeader' => false,
                    'nonSelectableLevels' => '0',
                ],
            ]
        ],
    ]
);
