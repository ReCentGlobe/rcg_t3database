<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:rcgprojectdb/Resources/Private/Language/locallang_db.xlf:tx_rcgprojectdb_domain_model_jointproject',
        'label' => 'short_title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'title',
        'iconfile' => 'EXT:rcgprojectdb/Resources/Public/Icons/tx_rcgprojectdb_domain_model_project.png'
    ],
    'types' => [
        '1' => [
            'showitem' => '--palette--;;general, short_description, description,related_links,contact, 
                        --div--;ProjectCat, sub_project,  project_discipline, project_regions, project_era, 
                        --div--;People, related_project_leads, related_project_members, 
                        --div--;InOut, 
                        --div--;Related, research_area, institutions, 
                        --div--;Funding, --palette--;;funding,  
                        --div--;Cooperation, cooperation_partners, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, sys_language_uid, l10n_parent, l10n_diffsource, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_rcgprojectdb_domain_model_jointproject',
                'foreign_table_where' => 'AND {#tx_rcgprojectdb_domain_model_jointproject}.{#pid}=###CURRENT_PID### AND {#tx_rcgprojectdb_domain_model_jointproject}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],

        'image' => [
            'exclude' => true,
            'label' => 'LLL:EXT:rcgprojectdb/Resources/Private/Language/locallang_db.xlf:tx_rcgprojectdb_domain_model_project.image',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'image',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
                    ],
                    'foreign_types' => [
                        '0' => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ]
                    ],
                    'foreign_match_fields' => [
                        'fieldname' => 'image',
                        'tablenames' => 'tx_rcgprojectdb_domain_model_project',
                        'table_local' => 'sys_file',
                    ],
                    'maxitems' => 1
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),

        ],
        'title' => [
            'exclude' => true,
            'label' => 'LLL:EXT:rcgprojectdb/Resources/Private/Language/locallang_db.xlf:tx_rcgprojectdb_domain_model_project.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required',
                'default' => ''
            ],
        ],
        'short_title' => [
            'exclude' => true,
            'label' => 'LLL:EXT:rcgprojectdb/Resources/Private/Language/locallang_db.xlf:tx_rcgprojectdb_domain_model_project.short_title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'account_number' => [
            'exclude' => true,
            'label' => 'LLL:EXT:rcgprojectdb/Resources/Private/Language/locallang_db.xlf:tx_rcgprojectdb_domain_model_project.account_number',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'short_description' => [
            'exclude' => true,
            'label' => 'LLL:EXT:rcgprojectdb/Resources/Private/Language/locallang_db.xlf:tx_rcgprojectdb_domain_model_project.short_description',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
                'default' => ''
            ]
        ],
        'description' => [
            'exclude' => true,
            'label' => 'LLL:EXT:rcgprojectdb/Resources/Private/Language/locallang_db.xlf:tx_rcgprojectdb_domain_model_project.description',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
                'fieldControl' => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],

        ],
        'contact' => [
            'exclude' => true,
            'label' => 'LLL:EXT:rcgprojectdb/Resources/Private/Language/locallang_db.xlf:tx_rcgprojectdb_domain_model_project.contact',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
                'fieldControl' => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],

        ],
        'project_discipline' => [
            'exclude' => true,
            'label' => 'LLL:EXT:rcgprojectdb/Resources/Private/Language/locallang_db.xlf:tx_rcgprojectdb_domain_model_project.project_discipline',
            'config' => [
                'type' => 'category',
            ]
        ],
        'project_regions' => [
            'exclude' => true,
            'label' => 'LLL:EXT:rcgprojectdb/Resources/Private/Language/locallang_db.xlf:tx_rcgprojectdb_domain_model_project.project_regions',
            'config' => [
                'type' => 'category',
            ]
        ],
        'project_era' => [
            'exclude' => true,
            'label' => 'LLL:EXT:rcgprojectdb/Resources/Private/Language/locallang_db.xlf:tx_rcgprojectdb_domain_model_project.project_era',
            'config' => [
                'type' => 'category',
            ]
        ],
        'funding_start' => [
            'exclude' => true,
            'label' => 'LLL:EXT:rcgprojectdb/Resources/Private/Language/locallang_db.xlf:tx_rcgprojectdb_domain_model_project.funding_start',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 7,
                'eval' => 'date',
                'default' => time()
            ],
        ],
        'funding_end' => [
            'exclude' => true,
            'label' => 'LLL:EXT:rcgprojectdb/Resources/Private/Language/locallang_db.xlf:tx_rcgprojectdb_domain_model_project.funding_end',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 7,
                'eval' => 'date',
                'default' => time()
            ],
        ],
        'funding_amount' => [
            'exclude' => true,
            'label' => 'LLL:EXT:rcgprojectdb/Resources/Private/Language/locallang_db.xlf:tx_rcgprojectdb_domain_model_project.funding_amount',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'funding_format' => [
            'exclude' => true,
            'label' => 'LLL:EXT:rcgprojectdb/Resources/Private/Language/locallang_db.xlf:tx_rcgprojectdb_domain_model_project.funding_format',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'related_links' => [
            'exclude' => true,
            'label' => 'LLL:EXT:rcgprojectdb/Resources/Private/Language/locallang_db.xlf:tx_rcgprojectdb_domain_model_project.related_links',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_rcgprojectdb_domain_model_sociallink',
                'foreign_field' => 'project',
                'maxitems' => 9999,
                'appearance' => [
                    'collapseAll' => 0,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1
                ],
            ],

        ],
        'related_project_leads' => [
            'exclude' => true,
            'label' => 'LLL:EXT:rcgprojectdb/Resources/Private/Language/locallang_db.xlf:tx_rcgprojectdb_domain_model_project.related_project_leads',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_rcgprojectdb_domain_model_person',
                'MM' => 'tx_rcgprojectdb_project_person_mm',
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],

        ],
        'related_project_members' => [
            'exclude' => true,
            'label' => 'LLL:EXT:rcgprojectdb/Resources/Private/Language/locallang_db.xlf:tx_rcgprojectdb_domain_model_project.related_project_members',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_rcgprojectdb_domain_model_person',
                'MM' => 'tx_rcgprojectdb_project_relatedprojectmembers_person_mm',
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],

        ],
        'research_area' => [
            'exclude' => true,
            'label' => 'LLL:EXT:rcgprojectdb/Resources/Private/Language/locallang_db.xlf:tx_rcgprojectdb_domain_model_project.research_area',
            'config' => [
                'type' => 'category',
            ],

        ],
        'institutions' => [
            'exclude' => true,
            'label' => 'LLL:EXT:rcgprojectdb/Resources/Private/Language/locallang_db.xlf:tx_rcgprojectdb_domain_model_project.institutions',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_rcgprojectdb_domain_model_organization',
                'MM' => 'tx_rcgprojectdb_project_institutions_organization_mm',
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],

        ],
        'funder' => [
            'exclude' => true,
            'label' => 'LLL:EXT:rcgprojectdb/Resources/Private/Language/locallang_db.xlf:tx_rcgprojectdb_domain_model_project.funder',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_rcgprojectdb_domain_model_organization',
                'foreign_field' => 'project5',
                'maxitems' => 9999,
                'appearance' => [
                    'collapseAll' => 0,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1
                ],
            ],

        ],
        'cooperation_partners' => [
            'exclude' => true,
            'label' => 'LLL:EXT:rcgprojectdb/Resources/Private/Language/locallang_db.xlf:tx_rcgprojectdb_domain_model_project.cooperation_partners',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_rcgprojectdb_domain_model_organization',
                'foreign_field' => 'project',
                'maxitems' => 9999,
                'appearance' => [
                    'collapseAll' => 0,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1
                ],
            ],

        ],
        'sub_project' => [
            'exclude' => true,
            'label' => 'LLL:EXT:rcgprojectdb/Resources/Private/Language/locallang_db.xlf:tx_rcgprojectdb_domain_model_jointproject.sub_project',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_rcgprojectdb_domain_model_project',
                'MM' => 'tx_rcgprojectdb_jointproject_project_mm',
                'default' => 0,
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],

        ],
    
    ],
    'palettes' => [
        'general' => [
            'label' => 'General Stuff',
            'description' => 'palette description',
            'showitem' => 'title,--linebreak--, short_title, account_number, --linebreak--, image',
        ],
        'funding' => [
            'label' => 'Funding',
            'description' => 'palette description',
            'showitem' => 'funder, --linebreak--, funding_start, funding_end,--linebreak--, funding_amount, funding_format',
        ],
    ]
];
