<?php
defined('TYPO3_MODE') || die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
   'rcgprojectdb',
   'tx_rcgprojectdb_domain_model_project'
);
