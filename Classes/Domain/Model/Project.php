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
 * Project
 */
class Project extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * image
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
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
     * @var mixed
     */
    protected $projectDiscipline = 0;

    /**
     * projectRegions
     *
     * @var mixed
     */
    protected $projectRegions = 0;

    /**
     * projectEra
     *
     * @var mixed
     */
    protected $projectEra = 0;

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
    protected $fundingFormat = 0;

    /**
     * Related Social Links (e.g. Facebook, Twitter, Homepage)
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ReCentGlobe\Rcgprojectdb\Domain\Model\SocialLink>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $relatedLinks = null;

    /**
     * relatedProjectLeads
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ReCentGlobe\Rcgprojectdb\Domain\Model\Person>
     */
    protected $relatedProjectLeads = null;

    /**
     * tags
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ReCentGlobe\Rcgprojectdb\Domain\Model\Tag>
     */
    protected $tags = null;

    /**
     * cooperationPartners
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ReCentGlobe\Rcgprojectdb\Domain\Model\Organization>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $cooperationPartners = null;

    /**
     * relatedProjectMembers
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ReCentGlobe\Rcgprojectdb\Domain\Model\Person>
     */
    protected $relatedProjectMembers = null;

    /**
     * researchArea
     *
     * @var \ReCentGlobe\Rcgprojectdb\Domain\Model\ResearchArea
     */
    protected $researchArea = null;

    /**
     * institutions
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ReCentGlobe\Rcgprojectdb\Domain\Model\Organization>
     */
    protected $institutions = null;

    /**
     * funder
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ReCentGlobe\Rcgprojectdb\Domain\Model\Organization>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $funder = null;

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
        $this->relatedLinks = $this->relatedLinks ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->relatedProjectLeads = $this->relatedProjectLeads ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->relatedProjectMembers = $this->relatedProjectMembers ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->institutions = $this->institutions ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->funder = $this->funder ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->cooperationPartners = $this->cooperationPartners ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->tags = $this->tags ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->researchArea = $this->researchArea ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->projectDiscipline = $this->projectDiscipline ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->projectRegions = $this->projectRegions ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->projectEra = $this->projectEra ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
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
     * @return mixed projectDiscipline
     */
    public function getProjectDiscipline()
    {
        return $this->projectDiscipline;
    }

    /**
     * Sets the projectDiscipline
     *
     * @param int $projectDiscipline
     * @return void
     */
    public function setProjectDiscipline(int $projectDiscipline)
    {
        $this->projectDiscipline = $projectDiscipline;
    }

    /**
     * Returns the projectRegions
     *
     * @return mixed projectRegions
     */
    public function getProjectRegions()
    {
        return $this->projectRegions;
    }

    /**
     * Sets the projectRegions
     *
     * @param int $projectRegions
     * @return void
     */
    public function setProjectRegions(int $projectRegions)
    {
        $this->projectRegions = $projectRegions;
    }

    /**
     * Returns the projectEra
     *
     * @return mixed projectEra
     */
    public function getProjectEra()
    {
        return $this->projectEra;
    }

    /**
     * Sets the projectEra
     *
     * @param int $projectEra
     * @return void
     */
    public function setProjectEra(int $projectEra)
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
     * Adds a Tag
     *
     * @param \ReCentGlobe\Rcgprojectdb\Domain\Model\Tag $tag
     * @return void
     */
    public function addTag(\ReCentGlobe\Rcgprojectdb\Domain\Model\Tag $tag)
    {
        $this->tags->attach($tag);
    }

    /**
     * Removes a Tag
     *
     * @param \ReCentGlobe\Rcgprojectdb\Domain\Model\Tag $tagToRemove The Tag to be removed
     * @return void
     */
    public function removeTag(\ReCentGlobe\Rcgprojectdb\Domain\Model\Tag $tagToRemove)
    {
        $this->tags->detach($tagToRemove);
    }

    /**
     * Returns the tags
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ReCentGlobe\Rcgprojectdb\Domain\Model\Tag> tags
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Sets the tags
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ReCentGlobe\Rcgprojectdb\Domain\Model\Tag> $tags
     * @return void
     */
    public function setTags(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $tags)
    {
        $this->tags = $tags;
    }

    /**
     * Adds a SocialLink
     *
     * @param \ReCentGlobe\Rcgprojectdb\Domain\Model\SocialLink $relatedLink
     * @return void
     */
    public function addRelatedLink(\ReCentGlobe\Rcgprojectdb\Domain\Model\SocialLink $relatedLink)
    {
        $this->relatedLinks->attach($relatedLink);
    }

    /**
     * Removes a SocialLink
     *
     * @param \ReCentGlobe\Rcgprojectdb\Domain\Model\SocialLink $relatedLinkToRemove The SocialLink to be removed
     * @return void
     */
    public function removeRelatedLink(\ReCentGlobe\Rcgprojectdb\Domain\Model\SocialLink $relatedLinkToRemove)
    {
        $this->relatedLinks->detach($relatedLinkToRemove);
    }

    /**
     * Returns the relatedLinks
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ReCentGlobe\Rcgprojectdb\Domain\Model\SocialLink> $relatedLinks
     */
    public function getRelatedLinks()
    {
        return $this->relatedLinks;
    }

    /**
     * Sets the relatedLinks
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ReCentGlobe\Rcgprojectdb\Domain\Model\SocialLink> $relatedLinks
     * @return void
     */
    public function setRelatedLinks(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $relatedLinks)
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
     * @param int $fundingFormat
     * @return void
     */
    public function setFundingFormat(int $fundingFormat)
    {
        $this->fundingFormat = $fundingFormat;
    }

    /**
     * Adds a Person
     *
     * @param \ReCentGlobe\Rcgprojectdb\Domain\Model\Person $relatedProjectLead
     * @return void
     */
    public function addRelatedProjectLead(\ReCentGlobe\Rcgprojectdb\Domain\Model\Person $relatedProjectLead)
    {
        $this->relatedProjectLeads->attach($relatedProjectLead);
    }

    /**
     * Removes a Person
     *
     * @param \ReCentGlobe\Rcgprojectdb\Domain\Model\Person $relatedProjectLeadToRemove The Person to be removed
     * @return void
     */
    public function removeRelatedProjectLead(\ReCentGlobe\Rcgprojectdb\Domain\Model\Person $relatedProjectLeadToRemove)
    {
        $this->relatedProjectLeads->detach($relatedProjectLeadToRemove);
    }

    /**
     * Returns the relatedProjectLeads
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ReCentGlobe\Rcgprojectdb\Domain\Model\Person> relatedProjectLeads
     */
    public function getRelatedProjectLeads()
    {
        return $this->relatedProjectLeads;
    }

    /**
     * Sets the relatedProjectLeads
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ReCentGlobe\Rcgprojectdb\Domain\Model\Person> $relatedProjectLeads
     * @return void
     */
    public function setRelatedProjectLeads(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $relatedProjectLeads)
    {
        $this->relatedProjectLeads = $relatedProjectLeads;
    }

    /**
     * Adds a Organization
     *
     * @param \ReCentGlobe\Rcgprojectdb\Domain\Model\Organization $cooperationPartner
     * @return void
     */
    public function addCooperationPartner(\ReCentGlobe\Rcgprojectdb\Domain\Model\Organization $cooperationPartner)
    {
        $this->cooperationPartners->attach($cooperationPartners);
    }

    /**
     * Removes a Organization
     *
     * @param \ReCentGlobe\Rcgprojectdb\Domain\Model\Organization $cooperationPartnerToRemove The Organization to be removed
     * @return void
     */
    public function removeCooperationPartner(\ReCentGlobe\Rcgprojectdb\Domain\Model\Organization $cooperationPartnerToRemove)
    {
        $this->cooperationPartners->detach($cooperationPartnerToRemove);
    }

    /**
     * Returns the cooperationPartners
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ReCentGlobe\Rcgprojectdb\Domain\Model\Organization> cooperationPartners
     */
    public function getCooperationPartners()
    {
        return $this->cooperationPartners;
    }

    /**
     * Sets the cooperationPartners
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ReCentGlobe\Rcgprojectdb\Domain\Model\Organization> $cooperationPartners
     * @return void
     */
    public function setCooperationPartners(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $cooperationPartners)
    {
        $this->cooperationPartners = $cooperationPartners;
    }

    /**
     * Adds a Person
     *
     * @param \ReCentGlobe\Rcgprojectdb\Domain\Model\Person $relatedProjectMember
     * @return void
     */
    public function addRelatedProjectMember(\ReCentGlobe\Rcgprojectdb\Domain\Model\Person $relatedProjectMember)
    {
        $this->relatedProjectMembers->attach($relatedProjectMember);
    }

    /**
     * Removes a Person
     *
     * @param \ReCentGlobe\Rcgprojectdb\Domain\Model\Person $relatedProjectMemberToRemove The Person to be removed
     * @return void
     */
    public function removeRelatedProjectMember(\ReCentGlobe\Rcgprojectdb\Domain\Model\Person $relatedProjectMemberToRemove)
    {
        $this->relatedProjectMembers->detach($relatedProjectMemberToRemove);
    }

    /**
     * Returns the relatedProjectMembers
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ReCentGlobe\Rcgprojectdb\Domain\Model\Person> $relatedProjectMembers
     */
    public function getRelatedProjectMembers()
    {
        return $this->relatedProjectMembers;
    }

    /**
     * Sets the relatedProjectMembers
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ReCentGlobe\Rcgprojectdb\Domain\Model\Person> $relatedProjectMembers
     * @return void
     */
    public function setRelatedProjectMembers(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $relatedProjectMembers)
    {
        $this->relatedProjectMembers = $relatedProjectMembers;
    }

    /**
     * Returns the researchArea
     *
     * @return \ReCentGlobe\Rcgprojectdb\Domain\Model\ResearchArea $researchArea
     */
    public function getResearchArea()
    {
        return $this->researchArea;
    }

    /**
     * Sets the researchArea
     *
     * @param \ReCentGlobe\Rcgprojectdb\Domain\Model\ResearchArea $researchArea
     * @return void
     */
    public function setResearchArea(\ReCentGlobe\Rcgprojectdb\Domain\Model\ResearchArea $researchArea)
    {
        $this->researchArea = $researchArea;
    }

    /**
     * Adds a Organization
     *
     * @param \ReCentGlobe\Rcgprojectdb\Domain\Model\Organization $institution
     * @return void
     */
    public function addInstitution(\ReCentGlobe\Rcgprojectdb\Domain\Model\Organization $institution)
    {
        $this->institutions->attach($institution);
    }

    /**
     * Removes a Organization
     *
     * @param \ReCentGlobe\Rcgprojectdb\Domain\Model\Organization $institutionToRemove The Organization to be removed
     * @return void
     */
    public function removeInstitution(\ReCentGlobe\Rcgprojectdb\Domain\Model\Organization $institutionToRemove)
    {
        $this->institutions->detach($institutionToRemove);
    }

    /**
     * Returns the institutions
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ReCentGlobe\Rcgprojectdb\Domain\Model\Organization> $institutions
     */
    public function getInstitutions()
    {
        return $this->institutions;
    }

    /**
     * Sets the institutions
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ReCentGlobe\Rcgprojectdb\Domain\Model\Organization> $institutions
     * @return void
     */
    public function setInstitutions(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $institutions)
    {
        $this->institutions = $institutions;
    }

    /**
     * Adds a Organization
     *
     * @param \ReCentGlobe\Rcgprojectdb\Domain\Model\Organization $funder
     * @return void
     */
    public function addFunder(\ReCentGlobe\Rcgprojectdb\Domain\Model\Organization $funder)
    {
        $this->funder->attach($funder);
    }

    /**
     * Removes a Organization
     *
     * @param \ReCentGlobe\Rcgprojectdb\Domain\Model\Organization $funderToRemove The Organization to be removed
     * @return void
     */
    public function removeFunder(\ReCentGlobe\Rcgprojectdb\Domain\Model\Organization $funderToRemove)
    {
        $this->funder->detach($funderToRemove);
    }

    /**
     * Returns the funder
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ReCentGlobe\Rcgprojectdb\Domain\Model\Organization> $funder
     */
    public function getFunder()
    {
        return $this->funder;
    }

    /**
     * Sets the funder
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ReCentGlobe\Rcgprojectdb\Domain\Model\Organization> $funder
     * @return void
     */
    public function setFunder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $funder)
    {
        $this->funder = $funder;
    }
}
