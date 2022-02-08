<?php
defined('TYPO3_MODE') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Rcgprojectdb',
        'Projectlist',
        [
            \ReCentGlobe\Rcgprojectdb\Controller\ProjectController::class => 'list, show'
        ],
        // non-cacheable actions
        [
            \ReCentGlobe\Rcgprojectdb\Controller\ProjectController::class => '',
            \ReCentGlobe\Rcgprojectdb\Controller\PersonController::class => ''
        ]
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Rcgprojectdb',
        'Personlist',
        [
            \ReCentGlobe\Rcgprojectdb\Controller\PersonController::class => 'list, show'
        ],
        // non-cacheable actions
        [
            \ReCentGlobe\Rcgprojectdb\Controller\ProjectController::class => '',
            \ReCentGlobe\Rcgprojectdb\Controller\PersonController::class => ''
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
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

    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
    $iconRegistry->registerIcon(
        'rcgprojectdb-plugin-projectlist',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:rcgprojectdb/Resources/Public/Icons/user_plugin_projectlist.svg']
    );
    $iconRegistry->registerIcon(
        'rcgprojectdb-plugin-personlist',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:rcgprojectdb/Resources/Public/Icons/user_plugin_personlist.svg']
    );
})();
