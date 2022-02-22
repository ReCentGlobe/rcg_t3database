<?php

use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManager;

defined('TYPO3_MODE') || die();

$ll = 'LLL:EXT:rcgprojectdb/Resources/Private/Language/locallang_db.xlf:';

$objectManager = GeneralUtility::makeInstance(ObjectManager::class);
$configurationManager = $objectManager->get(ConfigurationManager::class);
$extbaseFrameworkConfiguration = $configurationManager->getConfiguration(ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT);
$categoryPid = $extbaseFrameworkConfiguration['plugin.']['tx_rcgprojectdb.']['settings.']['categories.'];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    'rcgprojectdb',
    'tx_rcgprojectdb_domain_model_project',
    'research_area',
    [
        // Set a custom label
        'label' => $ll . 'tx_rcgprojectdb_domain_model_project.research_area',
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

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    'rcgprojectdb',
    'tx_rcgprojectdb_domain_model_project',
    'project_discipline',
    [
        // Set a custom label
        'label' => $ll . 'tx_rcgprojectdb_domain_model_project.project_discipline',
        'fieldConfiguration' => [
            'foreign_table_where' => ' AND sys_category.sys_language_uid IN (-1, 0) ORDER BY sys_category.title ASC',
            'treeConfig' => [
                'rootUid' => $categoryPid['projectDiscipline'],
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

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    'rcgprojectdb',
    'tx_rcgprojectdb_domain_model_project',
    'project_regions',
    [
        // Set a custom label
        'label' => $ll . 'tx_rcgprojectdb_domain_model_project.project_regions',
        'fieldConfiguration' => [
            'foreign_table_where' => ' AND sys_category.sys_language_uid IN (-1, 0) ORDER BY sys_category.title ASC',
            'treeConfig' => [
                'rootUid' => $categoryPid['projectRegion'],
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

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    'rcgprojectdb',
    'tx_rcgprojectdb_domain_model_project',
    'project_era',
    [
        // Set a custom label
        'label' => $ll . 'tx_rcgprojectdb_domain_model_project.project_era',
        'fieldConfiguration' => [
            'foreign_table_where' => ' AND sys_category.sys_language_uid IN (-1, 0) ORDER BY sys_category.title ASC',
            'treeConfig' => [
                'rootUid' => $categoryPid['projectEra'],
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

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    'rcgprojectdb',
    'tx_rcgprojectdb_domain_model_project',
    'type',
    [
        // Set a custom label
        'label' => $ll . 'tx_rcgprojectdb_domain_model_project.type',
        'fieldConfiguration' => [
            'foreign_table_where' => ' AND sys_category.sys_language_uid IN (-1, 0) ORDER BY sys_category.title ASC',
            'maxitems' => 1,
            'minitems' => 1,
            'size' => 1,
            'treeConfig' => [
                'rootUid' => $categoryPid['projectType'],
                'appearance' => [
                    'expandAll' => true,
                    'showHeader' => false,
                    'nonSelectableLevels' => '0',
                ],
            ]
        ],
    ]
);
