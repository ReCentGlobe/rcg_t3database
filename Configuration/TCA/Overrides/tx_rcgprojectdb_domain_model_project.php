<?php
defined('TYPO3_MODE') || die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
   'rcgprojectdb',
   'tx_rcgprojectdb_domain_model_project',
   'research_area',
    [
        // Set a custom label
        'label' => 'LLL:EXT:rcgprojectdb/Resources/Private/Language/locallang_db.xlf:tx_rcgprojectdb_domain_model_project.research_area',
        'fieldConfiguration' => [
            'foreign_table_where' => ' AND sys_category.sys_language_uid IN (-1, 0) ORDER BY sys_category.title ASC',
        ],
    ]
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    'rcgprojectdb',
    'tx_rcgprojectdb_domain_model_project',
    'project_discipline',
    [
        // Set a custom label
        'label' => 'LLL:EXT:rcgprojectdb/Resources/Private/Language/locallang_db.xlf:tx_rcgprojectdb_domain_model_project.project_discipline',
        'fieldConfiguration' => [
            'foreign_table_where' => ' AND sys_category.sys_language_uid IN (-1, 0) ORDER BY sys_category.title ASC',
        ],
    ]
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    'rcgprojectdb',
    'tx_rcgprojectdb_domain_model_project',
    'project_regions',
    [
        // Set a custom label
        'label' => 'LLL:EXT:rcgprojectdb/Resources/Private/Language/locallang_db.xlf:tx_rcgprojectdb_domain_model_project.project_regions',
        'fieldConfiguration' => [
            'foreign_table_where' => ' AND sys_category.sys_language_uid IN (-1, 0) ORDER BY sys_category.title ASC',
        ],
    ]
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    'rcgprojectdb',
    'tx_rcgprojectdb_domain_model_project',
    'project_era',
    [
        // Set a custom label
        'label' => 'LLL:EXT:rcgprojectdb/Resources/Private/Language/locallang_db.xlf:tx_rcgprojectdb_domain_model_project.project_era',
        'fieldConfiguration' => [
            'foreign_table_where' => ' AND sys_category.sys_language_uid IN (-1, 0) ORDER BY sys_category.title ASC',
        ],
    ]
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    'rcgprojectdb',
    'tx_rcgprojectdb_domain_model_project',
    'type',
    [
        // Set a custom label
        'label' => 'LLL:EXT:rcgprojectdb/Resources/Private/Language/locallang_db.xlf:tx_rcgprojectdb_domain_model_project.type',
        'fieldConfiguration' => [
            'foreign_table_where' => ' AND sys_category.sys_language_uid IN (-1, 0) ORDER BY sys_category.title ASC',
        ],
    ]
);
