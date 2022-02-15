<?php

declare(strict_types=1);

namespace ReCentGlobe\Rcgprojectdb\Domain\Repository;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
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
 * The repository for Categories
 */
class CategoryRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    /**
     * Find categories by a given parent
     *
     * @param $categories
     */
    public function getCategoryfilter($parent)
    {
        $query = $this->createQuery();
        $sql = 'SELECT uid, title
                FROM sys_category
                WHERE
                deleted = 0
                AND hidden = 0 AND parent = ' . $parent;

        $query->statement($sql);
        $items = $query->execute(true);

        // sort
        foreach ($items as $key => $part) {
            $sort[$key] = $part['title'];
        }
        array_multisort($sort, SORT_ASC, $items);

        return $items;
    }

    /**
     * @param $categories
     */
    public function getSingleCategory($uid)
    {
        $query = $this->createQuery();
        $sql = 'SELECT uid, title
                FROM sys_category
                WHERE
                deleted = 0
                AND hidden = 0 AND uid = '.$uid;

        $query->statement($sql);
        $items = $query->execute(true);

        return $items;

    }

}
