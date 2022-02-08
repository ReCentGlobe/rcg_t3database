<?php

declare(strict_types=1);

namespace ReCentGlobe\Rcgprojectdb\Domain\Model;


/**
 * This file is part of the "ReCentGlobe Database" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Florian Förster <florian.foerster@uni-leipzig.de>, ReCentGlobe
 */

/**
 * Person
 */
class Person extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * firstname
     *
     * @var string
     */
    protected $firstname = '';

    /**
     * lastname
     *
     * @var string
     */
    protected $lastname = '';

    /**
     * projects
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ReCentGlobe\Rcgprojectdb\Domain\Model\Project>
     */
    protected $projects = null;

    /**
     * __construct
     */
    public function __construct()
    {

        // Do not remove the next line: It would break the functionality
        $this->initializeObject();
    }

    /**
     * Initializes all ObjectStorage properties when model is reconstructed from DB (where __construct is not called)
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    public function initializeObject()
    {
        $this->projects = $this->projects ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the firstname
     *
     * @return string firstname
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Sets the firstname
     *
     * @param string $firstname
     * @return void
     */
    public function setFirstname(string $firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * Returns the lastname
     *
     * @return string lastname
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Sets the lastname
     *
     * @param string $lastname
     * @return void
     */
    public function setLastname(string $lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * Adds a Project
     *
     * @param \ReCentGlobe\Rcgprojectdb\Domain\Model\Project $project
     * @return void
     */
    public function addProject(\ReCentGlobe\Rcgprojectdb\Domain\Model\Project $project)
    {
        $this->projects->attach($project);
    }

    /**
     * Removes a Project
     *
     * @param \ReCentGlobe\Rcgprojectdb\Domain\Model\Project $projectToRemove The Project to be removed
     * @return void
     */
    public function removeProject(\ReCentGlobe\Rcgprojectdb\Domain\Model\Project $projectToRemove)
    {
        $this->projects->detach($projectToRemove);
    }

    /**
     * Returns the projects
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ReCentGlobe\Rcgprojectdb\Domain\Model\Project> projects
     */
    public function getProjects()
    {
        return $this->projects;
    }

    /**
     * Sets the projects
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ReCentGlobe\Rcgprojectdb\Domain\Model\Project> $projects
     * @return void
     */
    public function setProjects(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $projects)
    {
        $this->projects = $projects;
    }
}
