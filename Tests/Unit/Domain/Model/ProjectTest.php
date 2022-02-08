<?php

declare(strict_types=1);

namespace ReCentGlobe\Rcgprojectdb\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author Florian Förster <florian.foerster@uni-leipzig.de>
 */
class ProjectTest extends UnitTestCase
{
    /**
     * @var \ReCentGlobe\Rcgprojectdb\Domain\Model\Project|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \ReCentGlobe\Rcgprojectdb\Domain\Model\Project::class,
            ['dummy']
        );
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getImageReturnsInitialValueForFileReference(): void
    {
        self::assertEquals(
            null,
            $this->subject->getImage()
        );
    }

    /**
     * @test
     */
    public function setImageForFileReferenceSetsImage(): void
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setImage($fileReferenceFixture);

        self::assertEquals($fileReferenceFixture, $this->subject->_get('image'));
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle(): void
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('title'));
    }

    /**
     * @test
     */
    public function getShortTitleReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getShortTitle()
        );
    }

    /**
     * @test
     */
    public function setShortTitleForStringSetsShortTitle(): void
    {
        $this->subject->setShortTitle('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('shortTitle'));
    }

    /**
     * @test
     */
    public function getAccountNumberReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getAccountNumber()
        );
    }

    /**
     * @test
     */
    public function setAccountNumberForStringSetsAccountNumber(): void
    {
        $this->subject->setAccountNumber('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('accountNumber'));
    }

    /**
     * @test
     */
    public function getShortDescriptionReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getShortDescription()
        );
    }

    /**
     * @test
     */
    public function setShortDescriptionForStringSetsShortDescription(): void
    {
        $this->subject->setShortDescription('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('shortDescription'));
    }

    /**
     * @test
     */
    public function getDescriptionReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function setDescriptionForStringSetsDescription(): void
    {
        $this->subject->setDescription('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('description'));
    }

    /**
     * @test
     */
    public function getContactReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getContact()
        );
    }

    /**
     * @test
     */
    public function setContactForStringSetsContact(): void
    {
        $this->subject->setContact('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('contact'));
    }

    /**
     * @test
     */
    public function getProjectDisciplineReturnsInitialValueForMixed(): void
    {
    }

    /**
     * @test
     */
    public function setProjectDisciplineForMixedSetsProjectDiscipline(): void
    {
    }

    /**
     * @test
     */
    public function getProjectRegionsReturnsInitialValueForMixed(): void
    {
    }

    /**
     * @test
     */
    public function setProjectRegionsForMixedSetsProjectRegions(): void
    {
    }

    /**
     * @test
     */
    public function getProjectEraReturnsInitialValueForMixed(): void
    {
    }

    /**
     * @test
     */
    public function setProjectEraForMixedSetsProjectEra(): void
    {
    }

    /**
     * @test
     */
    public function getResearchAreaReturnsInitialValueForMixed(): void
    {
    }

    /**
     * @test
     */
    public function setResearchAreaForMixedSetsResearchArea(): void
    {
    }

    /**
     * @test
     */
    public function getFunderReturnsInitialValueForMixed(): void
    {
    }

    /**
     * @test
     */
    public function setFunderForMixedSetsFunder(): void
    {
    }

    /**
     * @test
     */
    public function getFundingStartReturnsInitialValueForDateTime(): void
    {
        self::assertEquals(
            null,
            $this->subject->getFundingStart()
        );
    }

    /**
     * @test
     */
    public function setFundingStartForDateTimeSetsFundingStart(): void
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setFundingStart($dateTimeFixture);

        self::assertEquals($dateTimeFixture, $this->subject->_get('fundingStart'));
    }

    /**
     * @test
     */
    public function getFundingEndReturnsInitialValueForDateTime(): void
    {
        self::assertEquals(
            null,
            $this->subject->getFundingEnd()
        );
    }

    /**
     * @test
     */
    public function setFundingEndForDateTimeSetsFundingEnd(): void
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setFundingEnd($dateTimeFixture);

        self::assertEquals($dateTimeFixture, $this->subject->_get('fundingEnd'));
    }

    /**
     * @test
     */
    public function getFundingAmountReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getFundingAmount()
        );
    }

    /**
     * @test
     */
    public function setFundingAmountForStringSetsFundingAmount(): void
    {
        $this->subject->setFundingAmount('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('fundingAmount'));
    }

    /**
     * @test
     */
    public function getFundingFormatReturnsInitialValueForMixed(): void
    {
    }

    /**
     * @test
     */
    public function setFundingFormatForMixedSetsFundingFormat(): void
    {
    }

    /**
     * @test
     */
    public function getRelatedLinksReturnsInitialValueForSocialLink(): void
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getRelatedLinks()
        );
    }

    /**
     * @test
     */
    public function setRelatedLinksForObjectStorageContainingSocialLinkSetsRelatedLinks(): void
    {
        $relatedLink = new \ReCentGlobe\Rcgprojectdb\Domain\Model\SocialLink();
        $objectStorageHoldingExactlyOneRelatedLinks = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneRelatedLinks->attach($relatedLink);
        $this->subject->setRelatedLinks($objectStorageHoldingExactlyOneRelatedLinks);

        self::assertEquals($objectStorageHoldingExactlyOneRelatedLinks, $this->subject->_get('relatedLinks'));
    }

    /**
     * @test
     */
    public function addRelatedLinkToObjectStorageHoldingRelatedLinks(): void
    {
        $relatedLink = new \ReCentGlobe\Rcgprojectdb\Domain\Model\SocialLink();
        $relatedLinksObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $relatedLinksObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($relatedLink));
        $this->subject->_set('relatedLinks', $relatedLinksObjectStorageMock);

        $this->subject->addRelatedLink($relatedLink);
    }

    /**
     * @test
     */
    public function removeRelatedLinkFromObjectStorageHoldingRelatedLinks(): void
    {
        $relatedLink = new \ReCentGlobe\Rcgprojectdb\Domain\Model\SocialLink();
        $relatedLinksObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $relatedLinksObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($relatedLink));
        $this->subject->_set('relatedLinks', $relatedLinksObjectStorageMock);

        $this->subject->removeRelatedLink($relatedLink);
    }

    /**
     * @test
     */
    public function getPersonsReturnsInitialValueForPerson(): void
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getPersons()
        );
    }

    /**
     * @test
     */
    public function setPersonsForObjectStorageContainingPersonSetsPersons(): void
    {
        $person = new \ReCentGlobe\Rcgprojectdb\Domain\Model\Person();
        $objectStorageHoldingExactlyOnePersons = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOnePersons->attach($person);
        $this->subject->setPersons($objectStorageHoldingExactlyOnePersons);

        self::assertEquals($objectStorageHoldingExactlyOnePersons, $this->subject->_get('persons'));
    }

    /**
     * @test
     */
    public function addPersonToObjectStorageHoldingPersons(): void
    {
        $person = new \ReCentGlobe\Rcgprojectdb\Domain\Model\Person();
        $personsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $personsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($person));
        $this->subject->_set('persons', $personsObjectStorageMock);

        $this->subject->addPerson($person);
    }

    /**
     * @test
     */
    public function removePersonFromObjectStorageHoldingPersons(): void
    {
        $person = new \ReCentGlobe\Rcgprojectdb\Domain\Model\Person();
        $personsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $personsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($person));
        $this->subject->_set('persons', $personsObjectStorageMock);

        $this->subject->removePerson($person);
    }

    /**
     * @test
     */
    public function getTagsReturnsInitialValueForTag(): void
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getTags()
        );
    }

    /**
     * @test
     */
    public function setTagsForObjectStorageContainingTagSetsTags(): void
    {
        $tag = new \ReCentGlobe\Rcgprojectdb\Domain\Model\Tag();
        $objectStorageHoldingExactlyOneTags = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneTags->attach($tag);
        $this->subject->setTags($objectStorageHoldingExactlyOneTags);

        self::assertEquals($objectStorageHoldingExactlyOneTags, $this->subject->_get('tags'));
    }

    /**
     * @test
     */
    public function addTagToObjectStorageHoldingTags(): void
    {
        $tag = new \ReCentGlobe\Rcgprojectdb\Domain\Model\Tag();
        $tagsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $tagsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($tag));
        $this->subject->_set('tags', $tagsObjectStorageMock);

        $this->subject->addTag($tag);
    }

    /**
     * @test
     */
    public function removeTagFromObjectStorageHoldingTags(): void
    {
        $tag = new \ReCentGlobe\Rcgprojectdb\Domain\Model\Tag();
        $tagsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $tagsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($tag));
        $this->subject->_set('tags', $tagsObjectStorageMock);

        $this->subject->removeTag($tag);
    }

    /**
     * @test
     */
    public function getPartnersReturnsInitialValueForOrganization(): void
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getPartners()
        );
    }

    /**
     * @test
     */
    public function setPartnersForObjectStorageContainingOrganizationSetsPartners(): void
    {
        $partner = new \ReCentGlobe\Rcgprojectdb\Domain\Model\Organization();
        $objectStorageHoldingExactlyOnePartners = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOnePartners->attach($partner);
        $this->subject->setPartners($objectStorageHoldingExactlyOnePartners);

        self::assertEquals($objectStorageHoldingExactlyOnePartners, $this->subject->_get('partners'));
    }

    /**
     * @test
     */
    public function addPartnerToObjectStorageHoldingPartners(): void
    {
        $partner = new \ReCentGlobe\Rcgprojectdb\Domain\Model\Organization();
        $partnersObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $partnersObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($partner));
        $this->subject->_set('partners', $partnersObjectStorageMock);

        $this->subject->addPartner($partner);
    }

    /**
     * @test
     */
    public function removePartnerFromObjectStorageHoldingPartners(): void
    {
        $partner = new \ReCentGlobe\Rcgprojectdb\Domain\Model\Organization();
        $partnersObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $partnersObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($partner));
        $this->subject->_set('partners', $partnersObjectStorageMock);

        $this->subject->removePartner($partner);
    }
}
