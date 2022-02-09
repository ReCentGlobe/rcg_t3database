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

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['example_registration'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
// plugin signature: <extension key without underscores> '_' <plugin name in lowercase>
    'example_registration',
    // Flexform configuration schema file
    'FILE:EXT:example/Configuration/FlexForms/Registration.xml'
);
