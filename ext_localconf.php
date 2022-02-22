<?php

use ReCentGlobe\Rcgprojectdb\Controller\JsonProjectController;
use ReCentGlobe\Rcgprojectdb\Controller\PersonController;
use ReCentGlobe\Rcgprojectdb\Controller\ProjectController;
use TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider;
use TYPO3\CMS\Core\Imaging\IconRegistry;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3_MODE') || die();

(static function() {
    ExtensionUtility::configurePlugin(
        'Rcgprojectdb',
        'Projectlist',
        [
            ProjectController::class => 'list',
        ],
        // non-cacheable actions
        [
            ProjectController::class => 'list',
        ]
    );

    ExtensionUtility::configurePlugin(
        'Rcgprojectdb',
        'Projectdetail',
        [
            ProjectController::class => 'show',
        ],
        // non-cacheable actions
        []
    );

    ExtensionUtility::configurePlugin(
        'Rcgprojectdb',
        'Projectajax',
        [
            JsonProjectController::class => 'list, show, search',
        ],
        // non-cacheable actions
        [
            JsonProjectController::class => 'list, show, search',
            PersonController::class => ''
        ]
    );

    ExtensionUtility::configurePlugin(
        'Rcgprojectdb',
        'Personlist',
        [
            PersonController::class => 'list'
        ],
        // non-cacheable actions
        []
    );
    ExtensionUtility::configurePlugin(
        'Rcgprojectdb',
        'Persondetail',
        [
            PersonController::class => 'show'
        ],
        // non-cacheable actions
        []
    );

    // wizards
    ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    projectlist {
                        iconIdentifier = rcgprojectdb-plugin-projectlist
                        title = LLL:EXT:rcgprojectdb/Resources/Private/Language/locallang_db.xlf:tx_rcgprojectdb_projectlist.name
                        description = LLL:EXT:rcgprojectdb/Resources/Private/Language/locallang_db.xlf:tx_rcgprojectdb_projectlist.description
                        tt_content_defValues {
                            CType = list
                            list_type = rcgprojectdb_projectlist
                        }
                    }
                    projectdetail {
                        iconIdentifier = rcgprojectdb-plugin-projectdetail
                        title = LLL:EXT:rcgprojectdb/Resources/Private/Language/locallang_db.xlf:tx_rcgprojectdb_projectdetail.name
                        description = LLL:EXT:rcgprojectdb/Resources/Private/Language/locallang_db.xlf:tx_rcgprojectdb_projectdetail.description
                        tt_content_defValues {
                            CType = list
                            list_type = rcgprojectdb_projectdetail
                        }
                    }
                    personlist {
                        iconIdentifier = rcgprojectdb-plugin-personlist
                        title = LLL:EXT:rcgprojectdb/Resources/Private/Language/locallang_db.xlf:tx_rcgprojectdb_personlist.name
                        description = LLL:EXT:rcgprojectdb/Resources/Private/Language/locallang_db.xlf:tx_rcgprojectdb_personlist.description
                        tt_content_defValues {
                            CType = list
                            list_type = rcgprojectdb_personlist
                        }
                    }
                }
                show = *
            }
       }'
    );

    $iconRegistry = GeneralUtility::makeInstance(IconRegistry::class);
    $iconRegistry->registerIcon(
        'rcgprojectdb-plugin-projectlist',
        SvgIconProvider::class,
        ['source' => 'EXT:rcgprojectdb/Resources/Public/Icons/user_plugin_projectlist.svg']
    );
    $iconRegistry->registerIcon(
        'rcgprojectdb-plugin-personlist',
        SvgIconProvider::class,
        ['source' => 'EXT:rcgprojectdb/Resources/Public/Icons/user_plugin_personlist.svg']
    );
    $iconRegistry->registerIcon(
        'rcgprojectdb-plugin-projectdetail',
        SvgIconProvider::class,
        ['source' => 'EXT:rcgprojectdb/Resources/Public/Icons/user_plugin_projectdetail.svg']
    );

})();
