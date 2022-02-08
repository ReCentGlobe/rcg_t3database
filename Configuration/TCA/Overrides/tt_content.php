<?php
defined('TYPO3_MODE') || die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Rcgprojectdb',
    'Projectlist',
    'List RCG Projects'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Rcgprojectdb',
    'Personlist',
    'List RCG Persons'
);
