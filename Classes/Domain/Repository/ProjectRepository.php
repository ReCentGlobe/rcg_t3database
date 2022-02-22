<?php

declare(strict_types=1);

namespace ReCentGlobe\Rcgprojectdb\Domain\Repository;

use ReCentGlobe\Rcgprojectdb\Domain\Model\Dto\ProjectDemand;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;
use TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;


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
class ProjectRepository extends Repository
{

    /**
     * @var array
     */
    protected $defaultOrderings = ['sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING];

    public function initializeObject()
    {

    }

    public function findViaAccNo($querystring = '')
    {
        $query = $this->createQuery();
        if ($querystring) {
            $query->matching(
                $query->like('short_title', '%' . $querystring . '%')
            );
        }
        return $query->execute();
    }

    public function findByFilter($querystring)
    {
        // Create empty query = select * from table
        $query = $this->createQuery();
        $query->matching(
        // ALL conditions have to be met (AND)
            $query->logicalAnd(
            // table column carId must be euqal to $carId
                $query->like('short_title', '%' . $querystring . '%'),
            // table column color must be euqal to $color
            //$query->equals('color', $color)
            )
        );
        // Add query options
        return $query->execute();
    }

    /**
     * Find all projects by filter demand
     * @param ProjectDemand|null $demand
     * @return QueryResultInterface
     * @throws InvalidQueryException
     */
    public function findDemanded(ProjectDemand $demand = NULL): QueryResultInterface
    {
        $query = $this->createQuery();
        $constraints = [];
        if ($demand !== NULL) {

            // Project Type Constraints
            if ($demand->getProjectType() !== NULL && count($demand->getProjectType())) {
                $projectTypeConstraints = [];

                foreach ($demand->getProjectType() as $singleType) {
                    $projectTypeConstraints[] = $query->contains('type', $singleType);
                }

                $constraints[] = $query->logicalOr($projectTypeConstraints);
            }

            // Project Region Constraints
            if ($demand->getProjectRegion() !== NULL && count($demand->getProjectRegion())) {
                $projectRegionConstraints = [];

                foreach ($demand->getProjectRegion() as $singleRegion) {
                    $projectRegionConstraints[] = $query->contains('projectRegions', $singleRegion);
                }

                $constraints[] = $query->logicalOr($projectRegionConstraints);
            }

            // Project Discipline Constraints
            if ($demand->getProjectDiscipline() !== NULL && count($demand->getProjectDiscipline())) {
                $projectDisciplineConstraints = [];

                foreach ($demand->getProjectDiscipline() as $singleDiscipline) {
                    $projectDisciplineConstraints[] = $query->contains('projectDiscipline', $singleDiscipline);
                }

                $constraints[] = $query->logicalOr($projectDisciplineConstraints);
            }

            // Project Era Constraints
            if ($demand->getProjectEra() !== NULL && count($demand->getProjectEra())) {
                $projectEraConstraints = [];

                foreach ($demand->getProjectEra() as $singleEra) {
                    $projectEraConstraints[] = $query->contains('projectEra', $singleEra);
                }

                $constraints[] = $query->logicalOr($projectEraConstraints);
            }

            // Research Area Constraints
            if ($demand->getResearchArea() !== NULL && count($demand->getResearchArea())) {
                $researchAreaConstraints = [];

                foreach ($demand->getResearchArea() as $singleArea) {
                    $researchAreaConstraints[] = $query->contains('researchArea', $singleArea);
                }

                $constraints[] = $query->logicalOr($researchAreaConstraints);
            }

            // Project Text Query
            if (is_string($demand->getSearchQuery())) {
                $searchWordConstraints = [];

                $searchWordConstraints[] = $query->like('description', '%' . $demand->getSearchQuery() . '%');
                $searchWordConstraints[] = $query->like('title', '%' . $demand->getSearchQuery() . '%');
                $searchWordConstraints[] = $query->like('relatedProjectLeads.firstname', '%' . $demand->getSearchQuery() . '%');
                $searchWordConstraints[] = $query->like('relatedProjectLeads.lastname', '%' . $demand->getSearchQuery() . '%');
                $searchWordConstraints[] = $query->like('relatedProjectMembers.firstname', '%' . $demand->getSearchQuery() . '%');
                $searchWordConstraints[] = $query->like('relatedProjectMembers.lastname', '%' . $demand->getSearchQuery() . '%');

                $constraints[] = $query->logicalOr($searchWordConstraints);
            }
        }

        $numberOfConstraints = count($constraints);
        if ($numberOfConstraints === 1) {
            $query->matching(reset($constraints));
        } elseif ($numberOfConstraints >= 2) {
            $query->matching($query->logicalAnd(...$constraints));
        }
        return $query->execute();
    }
}
