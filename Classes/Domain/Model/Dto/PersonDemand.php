<?php

namespace ReCentGlobe\Rcgprojectdb\Domain\Model\Dto;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * This file is part of the "ReCentGlobe Database" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Florian Förster <florian.foerster@uni-leipzig.de>, ReCentGlobe
 */

/**
 * Person Demand
 */
class PersonDemand extends AbstractEntity
{

    /**
     * @var string The search query
     */
    protected string $searchQuery = '';

    /**
     * @var ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category>
     */
    protected $researchArea = null;

    /**
     * Related ProjectLead
     * @var ObjectStorage<\ReCentGlobe\Rcgprojectdb\Domain\Model\Project>
     */
    protected $relatedProjectLead = null;

    /**
     * Related ProjectMember
     * @var ObjectStorage<\ReCentGlobe\Rcgprojectdb\Domain\Model\Project>
     */
    protected $relatedProjectMember = null;

    /**
     * @return string
     */
    public function getSearchQuery(): string
    {
        return $this->searchQuery;
    }

    /**
     * @param string $searchQuery
     */
    public function setSearchQuery(string $searchQuery): void
    {
        $this->searchQuery = $searchQuery;
    }

    /**
     * @return ObjectStorage
     */
    public function getResearchArea(): ?ObjectStorage
    {
        return $this->researchArea;
    }

    /**
     * @param ObjectStorage $researchArea
     */
    public function setResearchArea(?ObjectStorage $researchArea): void
    {
        $this->researchArea = $researchArea;
    }

    /**
     * @return ObjectStorage
     */
    public function getRelatedProjectLead(): ?ObjectStorage
    {
        return $this->relatedProjectLead;
    }

    /**
     * @param ObjectStorage $relatedProjectLead
     */
    public function setRelatedProjectLead(?ObjectStorage $relatedProjectLead): void
    {
        $this->relatedProjectLead = $relatedProjectLead;
    }

    /**
     * @return ObjectStorage
     */
    public function getRelatedProjectMember(): ?ObjectStorage
    {
        return $this->relatedProjectMember;
    }

    /**
     * @param ObjectStorage $relatedProjectMember
     */
    public function setRelatedProjectMember(?ObjectStorage $relatedProjectMember): void
    {
        $this->relatedProjectMember = $relatedProjectMember;
    }


}