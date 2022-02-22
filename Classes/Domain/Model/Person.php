<?php

declare(strict_types=1);

namespace ReCentGlobe\Rcgprojectdb\Domain\Model;


use TYPO3\CMS\Extbase\Domain\Model\FileReference;
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
 * Person
 */
class Person extends AbstractEntity
{

    /**
     * image
     *
     * @var FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $image = null;

    /**
     * title
     *
     * @var string
     */
    protected $title = '';

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
     * description
     *
     * @var string
     */
    protected $description = '';

    /**
     * slug
     * @var string
     */
    protected $slug = '';

    /**
     * email
     *
     * @var string
     */
    protected $email = '';

    /**
     * phone
     *
     * @var string
     */
    protected $phone = '';

    /**
     * profile
     * @var string
     */
    protected $profile = '';

    /**
     * researchArea
     *
     * @var ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category>
     */
    protected $researchArea = null;

    /**
     * position
     *
     * @var ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category>
     */
    protected $position = null;

    /**
     * projectLead
     *
     * @var ObjectStorage<\ReCentGlobe\Rcgprojectdb\Domain\Model\Project>
     */
    protected $projectLead = null;

    /**
     * projectMember
     *
     * @var ObjectStorage<\ReCentGlobe\Rcgprojectdb\Domain\Model\Project>
     */
    protected $projectMember = null;

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
        $this->projectLead = $this->projectLead ?: new ObjectStorage();
        $this->projectMember = $this->projectMember ?: new ObjectStorage();
        $this->researchArea = $this->researchArea ?: new ObjectStorage();
        $this->position = $this->position ?: new ObjectStorage();
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getProfile(): string
    {
        return $this->profile;
    }

    /**
     * @param string $profile
     */
    public function setProfile(string $profile): void
    {
        $this->profile = $profile;
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
    public function getPosition(): ?ObjectStorage
    {
        return $this->position;
    }

    /**
     * @param ObjectStorage $position
     */
    public function setPosition(?ObjectStorage $position): void
    {
        $this->position = $position;
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
     * Adds a projectLead
     *
     * @param \ReCentGlobe\Rcgprojectdb\Domain\Model\Project $projectLead
     * @return void
     */
    public function addProjectLead(\ReCentGlobe\Rcgprojectdb\Domain\Model\Project $projectLead)
    {
        $this->projectLead->attach($projectLead);
    }

    /**
     * Removes a projectLead
     *
     * @param \ReCentGlobe\Rcgprojectdb\Domain\Model\Project $projectLeadToRemove The Project to be removed
     * @return void
     */
    public function removeProjectLead(\ReCentGlobe\Rcgprojectdb\Domain\Model\Project $projectLeadToRemove)
    {
        $this->projectLead->detach($projectLeadToRemove);
    }

    /**
     * Returns the projectLead
     *
     * @return ObjectStorage<\ReCentGlobe\Rcgprojectdb\Domain\Model\Project> projects
     */
    public function getProjectLead()
    {
        return $this->projectLead;
    }

    /**
     * Sets the projectLead
     *
     * @param ObjectStorage<\ReCentGlobe\Rcgprojectdb\Domain\Model\Project> $projectLead
     * @return void
     */
    public function setProjectLead(ObjectStorage $projectLead)
    {
        $this->projectLead = $projectLead;
    }

    /**
     * Adds a projectMember
     *
     * @param \ReCentGlobe\Rcgprojectdb\Domain\Model\Project $projectMember
     * @return void
     */
    public function addProjectMember(\ReCentGlobe\Rcgprojectdb\Domain\Model\Project $projectMember)
    {
        $this->projectMember->attach($projectMember);
    }

    /**
     * Removes a Projecmember
     *
     * @param \ReCentGlobe\Rcgprojectdb\Domain\Model\Project $projectMemberToRemove The Project to be removed
     * @return void
     */
    public function removeProjectMember(\ReCentGlobe\Rcgprojectdb\Domain\Model\Project $projectMemberToRemove)
    {
        $this->projectMember->detach($projectMemberToRemove);
    }

    /**
     * Returns the projectMember
     *
     * @return ObjectStorage<\ReCentGlobe\Rcgprojectdb\Domain\Model\Project> projects
     */
    public function getProjectMember()
    {
        return $this->projectMember;
    }

    /**
     * Sets the projectMember
     *
     * @param ObjectStorage<\ReCentGlobe\Rcgprojectdb\Domain\Model\Project> $projectMember
     * @return void
     */
    public function setProjectMember(ObjectStorage $projectMember)
    {
        $this->projectMember = $projectMember;
    }

    /**
     * @return FileReference
     */
    public function getImage(): ?FileReference
    {
        return $this->image;
    }

    /**
     * @param FileReference $image
     */
    public function setImage(?FileReference $image): void
    {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }


}
