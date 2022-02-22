<?php
declare(strict_types=1);

namespace ReCentGlobe\Rcgprojectdb\Mvc\View;

/**
 * This file is part of the "ReCentGlobe Database" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Florian Förster <florian.foerster@uni-leipzig.de>, ReCentGlobe
 */

use TYPO3\CMS\Extbase\Mvc\View\JsonView as ExtbaseJsonView;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class JsonView extends ExtbaseJsonView
{
    /**
     * @var array
     */
    protected $configuration = [
        'projects' => [
            '_descendAll' => [
                '_exclude' => ['uid'],
                '_descend' => [
                    'researchArea' => [
                            '_descendAll' => [
                            ]
                        ],
                    'funder'
                ]
            ]
        ],
        'project' => [
            '_exclude' => ['uid'],
        ],
        'settings' => [
            '_only' => [
                'currentPageNumber',
                'numberOfPages'
            ]
        ]
    ];

    /**
     * Transforming ObjectStorages to Arrays for the JSON view
     *
     * @param mixed $value
     */
    protected function transformValue($value, array $configuration): array
    {
        if ($value instanceof ObjectStorage) {
            $value = $value->toArray();
        }
        return parent::transformValue($value, $configuration);
    }
}