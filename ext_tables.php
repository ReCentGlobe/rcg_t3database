<?php
defined('TYPO3_MODE') || die();

(static function() {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_rcgprojectdb_domain_model_project', 'EXT:rcgprojectdb/Resources/Private/Language/locallang_csh_tx_rcgprojectdb_domain_model_project.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_rcgprojectdb_domain_model_project');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_rcgprojectdb_domain_model_person', 'EXT:rcgprojectdb/Resources/Private/Language/locallang_csh_tx_rcgprojectdb_domain_model_person.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_rcgprojectdb_domain_model_person');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_rcgprojectdb_domain_model_tag', 'EXT:rcgprojectdb/Resources/Private/Language/locallang_csh_tx_rcgprojectdb_domain_model_tag.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_rcgprojectdb_domain_model_tag');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_rcgprojectdb_domain_model_organization', 'EXT:rcgprojectdb/Resources/Private/Language/locallang_csh_tx_rcgprojectdb_domain_model_organization.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_rcgprojectdb_domain_model_organization');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_rcgprojectdb_domain_model_sociallink', 'EXT:rcgprojectdb/Resources/Private/Language/locallang_csh_tx_rcgprojectdb_domain_model_sociallink.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_rcgprojectdb_domain_model_sociallink');
})();
