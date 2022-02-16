<?php

declare(strict_types=1);

namespace ReCentGlobe\Rcgprojectdb\Domain\Repository;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Repository;
use TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings;


/**
 * This file is part of the "ReCentGlobe Database" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Florian Förster <florian.foerster@uni-leipzig.de>, ReCentGlobe
 */

/**
 * The repository for Projects
 */
class ProjectRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    /**
     * @var array
     */
    protected $defaultOrderings = ['sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING];

    public function initializeObject() {

    }

    public function findViaAccNo($querystring = '') {
        $query = $this->createQuery();
        if ($querystring) {
            $query->matching(
                $query->like('short_title',  '%'.$querystring.'%')
            );
        }
        return $query->execute();
    }

    public function findByFilter($querystring) {
        // Create empty query = select * from table
        $query = $this->createQuery();
        $query->matching(
        // ALL conditions have to be met (AND)
            $query->logicalAnd(
            // table column carId must be euqal to $carId
                $query->like('short_title',  '%'.$querystring.'%'),
            // table column color must be euqal to $color
            //$query->equals('color', $color)
            )
        );
        // Add query options
        return $query->execute();
    }
}
