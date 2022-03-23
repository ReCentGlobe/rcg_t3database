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
 * Project
 */
class Project extends AbstractEntity
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
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $title = '';

    /**
     * shortTitle
     *
     * @var string
     */
    protected $shortTitle = '';

    /**
     * accountNumber
     *
     * @var string
     */
    protected $accountNumber = '';

    /**
     * shortDescription
     *
     * @var string
     */
    protected $shortDescription = '';

    /**
     * description
     *
     * @var string
     */
    protected $description = '';

    /**
     * contact
     *
     * @var string
     */
    protected $contact = '';

    /**
     * projectDiscipline
     *
     * @var ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category>
     */
    protected $projectDiscipline = null;

    /**
     * projectRegions
     *
     * @var ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category>
     */
    protected $projectRegions = null;

    /**
     * projectEra
     *
     * @var ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category>
     */
    protected $projectEra = null;

    /**
     * fundingStart
     *
     * @var \DateTime
     */
    protected $fundingStart = null;

    /**
     * fundingEnd
     *
     * @var \DateTime
     */
    protected $fundingEnd = null;

    /**
     * fundingAmount
     *
     * @var string
     */
    protected $fundingAmount = '';

    /**
     * fundingFormat
     *
     * @var string
     */
    protected $fundingFormat = '';

    /**
     * Related Social Links (e.g. Facebook, Twitter, Homepage)
     *
     * @var ObjectStorage<SocialLink>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $relatedLinks = null;

    /**
     * relatedProjectLeads
     *
     * @var ObjectStorage<Person>
     */
    protected $relatedProjectLeads = null;

    /**
     * cooperationPartners
     *
     * @var ObjectStorage<Organization>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $cooperationPartners = null;

    /**
     * relatedProjectMembers
     *
     * @var ObjectStorage<Person>
     */
    protected $relatedProjectMembers = null;

    /**
     * researchArea
     *
     * @var ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category>
     */
    protected $researchArea = null;

    /**
     * institutions
     *
     * @var ObjectStorage<Organization>
     */
    protected $institutions = null;

    /**
     * funder
     *
     * @var ObjectStorage<Organization>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $funder = null;

    /**
     * @var ObjectStorage<Project>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $parentProject;

    /**
     * @var ObjectStorage<Project>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $childProject;

    /**
     * @var string
     */
    protected $type = '';

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
        $this->relatedLinks = $this->relatedLinks ?: new ObjectStorage();
        $this->relatedProjectLeads = $this->relatedProjectLeads ?: new ObjectStorage();
        $this->relatedProjectMembers = $this->relatedProjectMembers ?: new ObjectStorage();
        $this->institutions = $this->institutions ?: new ObjectStorage();
        $this->funder = $this->funder ?: new ObjectStorage();
        $this->cooperationPartners = $this->cooperationPartners ?: new ObjectStorage();
        $this->researchArea = $this->researchArea ?: new ObjectStorage();
        $this->projectDiscipline = $this->projectDiscipline ?: new ObjectStorage();
        $this->projectRegions = $this->projectRegions ?: new ObjectStorage();
        $this->projectEra = $this->projectEra ?: new ObjectStorage();
    }

    /**
     * Returns the image
     *
     * @return FileReference image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the image
     *
     * @param FileReference $image
     * @return void
     */
    public function setImage(FileReference $image)
    {
        $this->image = $image;
    }

    /**
     * Returns the title
     *
     * @return string title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * Returns the shortTitle
     *
     * @return string shortTitle
     */
    public function getShortTitle()
    {
        return $this->shortTitle;
    }

    /**
     * Sets the shortTitle
     *
     * @param string $shortTitle
     * @return void
     */
    public function setShortTitle(string $shortTitle)
    {
        $this->shortTitle = $shortTitle;
    }

    /**
     * Returns the accountNumber
     *
     * @return string accountNumber
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * Sets the accountNumber
     *
     * @param string $accountNumber
     * @return void
     */
    public function setAccountNumber(string $accountNumber)
    {
        $this->accountNumber = $accountNumber;
    }

    /**
     * Returns the shortDescription
     *
     * @return string shortDescription
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * Sets the shortDescription
     *
     * @param string $shortDescription
     * @return void
     */
    public function setShortDescription(string $shortDescription)
    {
        $this->shortDescription = $shortDescription;
    }

    /**
     * Returns the description
     *
     * @return string description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * Returns the contact
     *
     * @return string contact
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Sets the contact
     *
     * @param string $contact
     * @return void
     */
    public function setContact(string $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Returns the projectDiscipline
     *
     * @return ObjectStorage $projectDiscipline
     */
    public function getProjectDiscipline()
    {
        return $this->projectDiscipline;
    }

    /**
     * Sets the projectDiscipline
     *
     * @param ObjectStorage $projectDiscipline
     * @return void
     */
    public function setProjectDiscipline(ObjectStorage $projectDiscipline)
    {
        $this->projectDiscipline = $projectDiscipline;
    }

    /**
     * Returns the projectRegions
     *
     * @return ObjectStorage $projectRegions
     */
    public function getProjectRegions()
    {
        return $this->projectRegions;
    }

    /**
     * Sets the projectRegions
     *
     * @param ObjectStorage $projectRegions
     * @return void
     */
    public function setProjectRegions(ObjectStorage $projectRegions)
    {
        $this->projectRegions = $projectRegions;
    }

    /**
     * Returns the projectEra
     *
     * @return ObjectStorage $projectEra
     */
    public function getProjectEra()
    {
        return $this->projectEra;
    }

    /**
     * Sets the projectEra
     *
     * @param ObjectStorage $projectEra
     * @return void
     */
    public function setProjectEra(ObjectStorage $projectEra)
    {
        $this->projectEra = $projectEra;
    }

    /**
     * Returns the fundingStart
     *
     * @return \DateTime fundingStart
     */
    public function getFundingStart()
    {
        return $this->fundingStart;
    }

    /**
     * Sets the fundingStart
     *
     * @param \DateTime $fundingStart
     * @return void
     */
    public function setFundingStart(\DateTime $fundingStart)
    {
        $this->fundingStart = $fundingStart;
    }

    /**
     * Returns the fundingEnd
     *
     * @return \DateTime fundingEnd
     */
    public function getFundingEnd()
    {
        return $this->fundingEnd;
    }

    /**
     * Sets the fundingEnd
     *
     * @param \DateTime $fundingEnd
     * @return void
     */
    public function setFundingEnd(\DateTime $fundingEnd)
    {
        $this->fundingEnd = $fundingEnd;
    }

    /**
     * Returns the fundingAmount
     *
     * @return string fundingAmount
     */
    public function getFundingAmount()
    {
        return $this->fundingAmount;
    }

    /**
     * Sets the fundingAmount
     *
     * @param string $fundingAmount
     * @return void
     */
    public function setFundingAmount(string $fundingAmount)
    {
        $this->fundingAmount = $fundingAmount;
    }

    /**
     * Adds a SocialLink
     *
     * @param SocialLink $relatedLink
     * @return void
     */
    public function addRelatedLink(SocialLink $relatedLink)
    {
        $this->relatedLinks->attach($relatedLink);
    }

    /**
     * Removes a SocialLink
     *
     * @param SocialLink $relatedLinkToRemove The SocialLink to be removed
     * @return void
     */
    public function removeRelatedLink(SocialLink $relatedLinkToRemove)
    {
        $this->relatedLinks->detach($relatedLinkToRemove);
    }

    /**
     * Returns the relatedLinks
     *
     * @return ObjectStorage<SocialLink> $relatedLinks
     */
    public function getRelatedLinks()
    {
        return $this->relatedLinks;
    }

    /**
     * Sets the relatedLinks
     *
     * @param ObjectStorage<SocialLink> $relatedLinks
     * @return void
     */
    public function setRelatedLinks(ObjectStorage $relatedLinks)
    {
        $this->relatedLinks = $relatedLinks;
    }

    /**
     * Returns the fundingFormat
     *
     * @return string fundingFormat
     */
    public function getFundingFormat()
    {
        return $this->fundingFormat;
    }

    /**
     * Sets the fundingFormat
     *
     * @param string $fundingFormat
     * @return void
     */
    public function setFundingFormat(string $fundingFormat)
    {
        $this->fundingFormat = $fundingFormat;
    }

    /**
     * Adds a Person
     *
     * @param Person $relatedProjectLead
     * @return void
     */
    public function addRelatedProjectLead(Person $relatedProjectLead)
    {
        $this->relatedProjectLeads->attach($relatedProjectLead);
    }

    /**
     * Removes a Person
     *
     * @param Person $relatedProjectLeadToRemove The Person to be removed
     * @return void
     */
    public function removeRelatedProjectLead(Person $relatedProjectLeadToRemove)
    {
        $this->relatedProjectLeads->detach($relatedProjectLeadToRemove);
    }

    /**
     * Returns the relatedProjectLeads
     *
     * @return ObjectStorage<Person> relatedProjectLeads
     */
    public function getRelatedProjectLeads()
    {
        return $this->relatedProjectLeads;
    }

    /**
     * Sets the relatedProjectLeads
     *
     * @param ObjectStorage<Person> $relatedProjectLeads
     * @return void
     */
    public function setRelatedProjectLeads(ObjectStorage $relatedProjectLeads)
    {
        $this->relatedProjectLeads = $relatedProjectLeads;
    }

    /**
     * Adds a Organization
     *
     * @param Organization $cooperationPartners
     * @return void
     */
    public function addCooperationPartner(Organization $cooperationPartners): void
    {
        $this->cooperationPartners->attach($cooperationPartners);
    }

    /**
     * Removes a Organization
     *
     * @param Organization $cooperationPartnerToRemove The Organization to be removed
     * @return void
     */
    public function removeCooperationPartner(Organization $cooperationPartnerToRemove)
    {
        $this->cooperationPartners->detach($cooperationPartnerToRemove);
    }

    /**
     * Returns the cooperationPartners
     *
     * @return ObjectStorage<Organization> cooperationPartners
     */
    public function getCooperationPartners()
    {
        return $this->cooperationPartners;
    }

    /**
     * Sets the cooperationPartners
     *
     * @param ObjectStorage<Organization> $cooperationPartners
     * @return void
     */
    public function setCooperationPartners(ObjectStorage $cooperationPartners)
    {
        $this->cooperationPartners = $cooperationPartners;
    }

    /**
     * Adds a Person
     *
     * @param Person $relatedProjectMember
     * @return void
     */
    public function addRelatedProjectMember(Person $relatedProjectMember)
    {
        $this->relatedProjectMembers->attach($relatedProjectMember);
    }

    /**
     * Removes a Person
     *
     * @param Person $relatedProjectMemberToRemove The Person to be removed
     * @return void
     */
    public function removeRelatedProjectMember(Person $relatedProjectMemberToRemove)
    {
        $this->relatedProjectMembers->detach($relatedProjectMemberToRemove);
    }

    /**
     * Returns the relatedProjectMembers
     *
     * @return ObjectStorage<Person> $relatedProjectMembers
     */
    public function getRelatedProjectMembers()
    {
        return $this->relatedProjectMembers;
    }

    /**
     * Sets the relatedProjectMembers
     *
     * @param ObjectStorage<Person> $relatedProjectMembers
     * @return void
     */
    public function setRelatedProjectMembers(ObjectStorage $relatedProjectMembers)
    {
        $this->relatedProjectMembers = $relatedProjectMembers;
    }

    /**
     * Returns the researchArea
     *
     * @return ObjectStorage $researchArea
     */
    public function getResearchArea()
    {
        return $this->researchArea;
    }

    /**
     * Sets the researchArea
     *
     * @param ObjectStorage $researchArea
     * @return void
     */
    public function setResearchArea(ObjectStorage $researchArea)
    {
        $this->researchArea = $researchArea;
    }

    /**
     * Adds a Organization
     *
     * @param Organization $institution
     * @return void
     */
    public function addInstitution(Organization $institution)
    {
        $this->institutions->attach($institution);
    }

    /**
     * Removes a Organization
     *
     * @param Organization $institutionToRemove The Organization to be removed
     * @return void
     */
    public function removeInstitution(Organization $institutionToRemove)
    {
        $this->institutions->detach($institutionToRemove);
    }

    /**
     * Returns the institutions
     *
     * @return ObjectStorage<Organization> $institutions
     */
    public function getInstitutions()
    {
        return $this->institutions;
    }

    /**
     * Sets the institutions
     *
     * @param ObjectStorage<Organization> $institutions
     * @return void
     */
    public function setInstitutions(ObjectStorage $institutions)
    {
        $this->institutions = $institutions;
    }

    /**
     * Returns the funder
     *
     * @return ObjectStorage<Organization> $funder
     */
    public function getFunder()
    {
        return $this->funder;
    }

    /**
     * Sets the funder
     *
     * @param ObjectStorage<Organization> $funder
     * @return void
     */
    public function setFunder(ObjectStorage $funder)
    {
        $this->funder = $funder;
    }

    /**
     * Returns a parent project
     *
     * @return ObjectStorage<Project> $parentProject
     */
    public function getParentProject()
    {
        return $this->parentProject;
    }

    /**
     * Sets the parent project
     *
     * @param ObjectStorage<Project> $parentProject
     * @return void
     */
    public function setParentProject(ObjectStorage $parentProject)
    {
        $this->parentProject = $parentProject;
    }

    /**
     * Returns a child project
     *
     * @return ObjectStorage<Project> $childProject
     */
    public function getChildProject()
    {
        return $this->childProject;
    }

    /**
     * Sets the child project
     *
     * @param ObjectStorage<Project> $childProject
     * @return void
     */
    public function setChildProject(ObjectStorage $childProject): void
    {
        $this->childProject = $childProject;
    }
}
