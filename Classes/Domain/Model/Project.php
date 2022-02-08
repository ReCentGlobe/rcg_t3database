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
     * researchArea
     *
     * @var mixed
     */
    protected $researchArea = 0;

    /**
     * funder
     *
     * @var mixed
     */
    protected $funder = 0;

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
     * @var mixed
     */
    protected $fundingFormat = 0;

    /**
     * persons
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ReCentGlobe\Rcgprojectdb\Domain\Model\Person>
     */
    protected $persons = null;

    /**
     * tags
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ReCentGlobe\Rcgprojectdb\Domain\Model\Tag>
     */
    protected $tags = null;

    /**
     * partners
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ReCentGlobe\Rcgprojectdb\Domain\Model\Organization>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $partners = null;

    /**
     * Related Social Links (e.g. Facebook, Twitter, Homepage)
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ReCentGlobe\Rcgprojectdb\Domain\Model\SocialLink>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $relatedLinks = null;

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
        $this->persons = $this->persons ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->tags = $this->tags ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->partners = $this->partners ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * Returns the researchArea
     *
     * @return mixed researchArea
     */
    public function getResearchArea()
    {
        return $this->researchArea;
    }

    /**
     * Sets the researchArea
     *
     * @param int $researchArea
     * @return void
     */
    public function setResearchArea(int $researchArea)
    {
        $this->researchArea = $researchArea;
    }

    /**
     * Returns the funder
     *
     * @return mixed funder
     */
    public function getFunder()
    {
        return $this->funder;
    }

    /**
     * Sets the funder
     *
     * @param int $funder
     * @return void
     */
    public function setFunder(int $funder)
    {
        $this->funder = $funder;
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
     * Returns the fundingFormat
     *
     * @return mixed fundingFormat
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
     * @param \ReCentGlobe\Rcgprojectdb\Domain\Model\Person $person
     * @return void
     */
    public function addPerson(\ReCentGlobe\Rcgprojectdb\Domain\Model\Person $person)
    {
        $this->persons->attach($person);
    }

    /**
     * Removes a Person
     *
     * @param \ReCentGlobe\Rcgprojectdb\Domain\Model\Person $personToRemove The Person to be removed
     * @return void
     */
    public function removePerson(\ReCentGlobe\Rcgprojectdb\Domain\Model\Person $personToRemove)
    {
        $this->persons->detach($personToRemove);
    }

    /**
     * Returns the persons
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ReCentGlobe\Rcgprojectdb\Domain\Model\Person> persons
     */
    public function getPersons()
    {
        return $this->persons;
    }

    /**
     * Sets the persons
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ReCentGlobe\Rcgprojectdb\Domain\Model\Person> $persons
     * @return void
     */
    public function setPersons(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $persons)
    {
        $this->persons = $persons;
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
     * Adds a Organization
     *
     * @param \ReCentGlobe\Rcgprojectdb\Domain\Model\Organization $partner
     * @return void
     */
    public function addPartner(\ReCentGlobe\Rcgprojectdb\Domain\Model\Organization $partner)
    {
        $this->partners->attach($partners);
    }

    /**
     * Removes a Organization
     *
     * @param \ReCentGlobe\Rcgprojectdb\Domain\Model\Organization $partnerToRemove The Organization to be removed
     * @return void
     */
    public function removePartner(\ReCentGlobe\Rcgprojectdb\Domain\Model\Organization $partnerToRemove)
    {
        $this->partners->detach($partnerToRemove);
    }

    /**
     * Returns the partners
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ReCentGlobe\Rcgprojectdb\Domain\Model\Organization> partners
     */
    public function getPartners()
    {
        return $this->partners;
    }

    /**
     * Sets the partners
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ReCentGlobe\Rcgprojectdb\Domain\Model\Organization> $partners
     * @return void
     */
    public function setPartners(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $partners)
    {
        $this->partners = $partners;
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
}
