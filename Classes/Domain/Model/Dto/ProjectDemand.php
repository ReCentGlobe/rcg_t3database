<?php

namespace ReCentGlobe\Rcgprojectdb\Domain\Model\Dto;

use ReCentGlobe\Rcgprojectdb\Domain\Model\Category;
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
 * Demand
 */
class ProjectDemand extends AbstractEntity
{

    /**
     * @var string The search query
     */
    protected string $searchQuery = '';

    /**
     * @var ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category> projectType category
     */
    protected $projectType = null;

    /**
     * @var ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category> projectRegion category
     */
    protected $projectRegion = null;

    /**
     * @var ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category> projectEra category
     */
    protected $projectEra = null;

    /**
     * @var ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category> projectDiscipline category
     */
    protected $projectDiscipline = null;

    /**
     * @var ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category> researchArea category
     */
    protected $researchArea = null;

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
    public function getProjectType(): ?ObjectStorage
    {
        return $this->projectType;
    }

    /**
     * @param ObjectStorage $projectType
     */
    public function setProjectType(?ObjectStorage $projectType): void
    {
        $this->projectType = $projectType;
    }

    /**
     * @return ObjectStorage
     */
    public function getProjectRegion(): ?ObjectStorage
    {
        return $this->projectRegion;
    }

    /**
     * @param ObjectStorage $projectRegion
     */
    public function setProjectRegion(?ObjectStorage $projectRegion): void
    {
        $this->projectRegion = $projectRegion;
    }

    /**
     * @return ObjectStorage
     */
    public function getProjectEra(): ?ObjectStorage
    {
        return $this->projectEra;
    }

    /**
     * @param ObjectStorage $projectEra
     */
    public function setProjectEra(?ObjectStorage $projectEra): void
    {
        $this->projectEra = $projectEra;
    }

    /**
     * @return ObjectStorage
     */
    public function getProjectDiscipline(): ?ObjectStorage
    {
        return $this->projectDiscipline;
    }

    /**
     * @param ObjectStorage $projectDiscipline
     */
    public function setProjectDiscipline(?ObjectStorage $projectDiscipline): void
    {
        $this->projectDiscipline = $projectDiscipline;
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


}