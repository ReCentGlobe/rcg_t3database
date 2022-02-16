<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3_MODE') || die();

$ll = 'LLL:EXT:rcgprojectdb/Resources/Private/Language/locallang_db.xlf:';

ExtensionManagementUtility::makeCategorizable(
    'rcgprojectdb',
    'tx_rcgprojectdb_domain_model_person'
);
