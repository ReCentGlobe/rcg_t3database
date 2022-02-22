<?php

declare(strict_types=1);

namespace ReCentGlobe\Rcgprojectdb\Domain\Repository;


use ReCentGlobe\Rcgprojectdb\Domain\Model\Dto\PersonDemand;
use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * This file is part of the "ReCentGlobe Database" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Florian Förster <florian.foerster@uni-leipzig.de>, ReCentGlobe
 */

/**
 * The repository for people
 */
class PersonRepository extends Repository
{

    /**
     * @var array
     */
    protected $defaultOrderings = ['sorting' => QueryInterface::ORDER_ASCENDING];

    /**
     * Find all persons by filter demand
     * @param PersonDemand|null $demand
     * @return QueryResultInterface
     * @throws InvalidQueryException
     */
    public function findDemanded(PersonDemand $demand = NULL): QueryResultInterface
    {
        $query = $this->createQuery();
        $constraints = [];
        if ($demand !== NULL) {
            // Research Area Constraints
            if ($demand->getResearchArea() !== NULL && count($demand->getResearchArea())) {
                $researchAreaConstraints = [];

                foreach ($demand->getResearchArea() as $singleArea) {
                    $researchAreaConstraints[] = $query->contains('researchArea', $singleArea);
                }

                $constraints[] = $query->logicalOr($researchAreaConstraints);
            }

            // Person Text Query
            if (is_string($demand->getSearchQuery())) {
                $searchWordConstraints = [];

                // TODO: Implement description field for Person Model
                $searchWordConstraints[] = $query->like('description', '%' . $demand->getSearchQuery() . '%');
                $searchWordConstraints[] = $query->like('firstname', '%' . $demand->getSearchQuery() . '%');
                $searchWordConstraints[] = $query->like('lastname', '%' . $demand->getSearchQuery() . '%');
                $searchWordConstraints[] = $query->like('projectMember.title', '%' . $demand->getSearchQuery() . '%');
                $searchWordConstraints[] = $query->like('projectMember.description', '%' . $demand->getSearchQuery() . '%');
                $searchWordConstraints[] = $query->like('projectLead.title', '%' . $demand->getSearchQuery() . '%');
                $searchWordConstraints[] = $query->like('projectLead.description', '%' . $demand->getSearchQuery() . '%');

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
