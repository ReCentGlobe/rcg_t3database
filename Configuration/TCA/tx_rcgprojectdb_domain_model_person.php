<?php

use TYPO3\CMS\Core\Resource\File;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

$ll = 'LLL:EXT:rcgprojectdb/Resources/Private/Language/locallang_db.xlf:';


return [
    'ctrl' => [
        'title' => $ll . 'tx_rcgprojectdb_domain_model_person',
        'label' => 'lastname',
        'label_userFunc' => \ReCentGlobe\Rcgprojectdb\Utility\Label::class . '->getObjectLabel',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'sortby' => 'sorting',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'searchFields' => 'firstname,lastname',
        'iconfile' => 'EXT:rcgprojectdb/Resources/Public/Icons/tx_rcgprojectdb_domain_model_person.png'
    ],
    'types' => [
        '1' => ['showitem' => 'image, title, firstname, lastname, slug, description, email, phone, profile, research_area, position, project_lead, project_member, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, sys_language_uid, l10n_parent, l10n_diffsource, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden, '],
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
                'foreign_table' => 'tx_rcgprojectdb_domain_model_person',
                'foreign_table_where' => 'AND {#tx_rcgprojectdb_domain_model_person}.{#pid}=###CURRENT_PID### AND {#tx_rcgprojectdb_domain_model_person}.{#sys_language_uid} IN (-1,0)',
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
        'image' => [
            'exclude' => false,
            'label' => $ll . 'tx_rcgprojectdb_domain_model_person.image',
            'config' => ExtensionManagementUtility::getFileFieldTCAConfig(
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
                        File::FILETYPE_TEXT => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        File::FILETYPE_IMAGE => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        File::FILETYPE_AUDIO => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        File::FILETYPE_VIDEO => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        File::FILETYPE_APPLICATION => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ]
                    ],
                    'foreign_match_fields' => [
                        'fieldname' => 'image',
                        'tablenames' => 'tx_rcgprojectdb_domain_model_person',
                        'table_local' => 'sys_file',
                    ],
                    'maxitems' => 1
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),

        ],
        'title' => [
            'exclude' => false,
            'label' => $ll . 'tx_rcgprojectdb_domain_model_person.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'firstname' => [
            'exclude' => false,
            'label' => $ll . 'tx_rcgprojectdb_domain_model_person.firstname',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'lastname' => [
            'exclude' => false,
            'label' => $ll . 'tx_rcgprojectdb_domain_model_person.lastname',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'slug' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:pages.slug',
            'displayCond' => 'VERSION:IS:false',
            'config' => [
                'type' => 'slug',
                'size' => 50,
                'generatorOptions' => [
                    'fields' => ['firstname', 'lastname'],
                    'fieldSeparator' => '-',
                    'replacements' => [
                        '/' => '-'
                    ],
                ],
                'fallbackCharacter' => '-',
                'eval' => 'unique',
                'default' => ''
            ]
        ],
        'description' => [
            'exclude' => false,
            'label' => $ll . 'tx_rcgprojectdb_domain_model_person.description',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
                'fieldControl' => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols' => 10,
                'rows' => 15,
                'eval' => 'trim',
            ],

        ],
        'email' => [
            'exclude' => false,
            'label' => $ll . 'tx_rcgprojectdb_domain_model_person.email',
            'config' => [
                'type' => 'input',
                'size' => 20,
                'eval' => 'trim,email',
                'max' => 255,
                'softref' => 'email',
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ]
        ],
        'phone' => [
            'exclude' => false,
            'label' => $ll . 'tx_rcgprojectdb_domain_model_person.phone',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
                'size' => 20,
                'max' => 30,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ]
        ],
        'profile' => [
            'exclude' => false,
            'label' => $ll . 'tx_rcgprojectdb_domain_model_person.profile',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputLink',
                'fieldControl' => [
                    'linkPopup' => [
                        'options' => [
                            'blindLinkOptions' => 'mail,file,spec,folder',
                        ],
                    ],
                ],
                'eval' => 'trim',
                'size' => 20,
                'max' => 255,
                'softref' => 'typolink,url',
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'research_area' => [
            'exclude' => false,
            'label' => $ll . 'tx_rcgprojectdb_domain_model_person.research_area',
            'config' => [
                'type' => 'category',
            ],
        ],
        'position' => [
            'exclude' => false,
            'label' => $ll . 'tx_rcgprojectdb_domain_model_person.position',
            'config' => [
                'type' => 'category',
            ],
        ],
        'project_lead' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => $ll . 'tx_rcgprojectdb_domain_model_person.project_lead',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_rcgprojectdb_domain_model_project',
                'foreign_table' => 'tx_rcgprojectdb_domain_model_project',
                'MM_opposite_field' => 'related_project_leads',
                'size' => 5,
                'minitems' => 0,
                'maxitems' => 100,
                'readOnly' => 1,
                'MM' => 'tx_rcgprojectdb_project_relatedprojectleads_person_mm',
            ],
        ],
        'project_member' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => $ll . 'tx_rcgprojectdb_domain_model_person.project_member',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_rcgprojectdb_domain_model_project',
                'foreign_table' => 'tx_rcgprojectdb_domain_model_project',
                'MM_opposite_field' => 'related_project_members',
                'size' => 5,
                'minitems' => 0,
                'maxitems' => 100,
                'readOnly' => 1,
                'MM' => 'tx_rcgprojectdb_project_relatedprojectmembers_person_mm',
            ],
        ],

    ],
];
