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
    public function getFundingFormatReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getFundingFormat()
        );
    }

    /**
     * @test
     */
    public function setFundingFormatForStringSetsFundingFormat(): void
    {
        $this->subject->setFundingFormat('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('fundingFormat'));
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
    public function getRelatedProjectLeadsReturnsInitialValueForPerson(): void
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getRelatedProjectLeads()
        );
    }

    /**
     * @test
     */
    public function setRelatedProjectLeadsForObjectStorageContainingPersonSetsRelatedProjectLeads(): void
    {
        $relatedProjectLead = new \ReCentGlobe\Rcgprojectdb\Domain\Model\Person();
        $objectStorageHoldingExactlyOneRelatedProjectLeads = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneRelatedProjectLeads->attach($relatedProjectLead);
        $this->subject->setRelatedProjectLeads($objectStorageHoldingExactlyOneRelatedProjectLeads);

        self::assertEquals($objectStorageHoldingExactlyOneRelatedProjectLeads, $this->subject->_get('relatedProjectLeads'));
    }

    /**
     * @test
     */
    public function addRelatedProjectLeadToObjectStorageHoldingRelatedProjectLeads(): void
    {
        $relatedProjectLead = new \ReCentGlobe\Rcgprojectdb\Domain\Model\Person();
        $relatedProjectLeadsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $relatedProjectLeadsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($relatedProjectLead));
        $this->subject->_set('relatedProjectLeads', $relatedProjectLeadsObjectStorageMock);

        $this->subject->addRelatedProjectLead($relatedProjectLead);
    }

    /**
     * @test
     */
    public function removeRelatedProjectLeadFromObjectStorageHoldingRelatedProjectLeads(): void
    {
        $relatedProjectLead = new \ReCentGlobe\Rcgprojectdb\Domain\Model\Person();
        $relatedProjectLeadsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $relatedProjectLeadsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($relatedProjectLead));
        $this->subject->_set('relatedProjectLeads', $relatedProjectLeadsObjectStorageMock);

        $this->subject->removeRelatedProjectLead($relatedProjectLead);
    }

    /**
     * @test
     */
    public function getRelatedProjectMembersReturnsInitialValueForPerson(): void
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getRelatedProjectMembers()
        );
    }

    /**
     * @test
     */
    public function setRelatedProjectMembersForObjectStorageContainingPersonSetsRelatedProjectMembers(): void
    {
        $relatedProjectMember = new \ReCentGlobe\Rcgprojectdb\Domain\Model\Person();
        $objectStorageHoldingExactlyOneRelatedProjectMembers = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneRelatedProjectMembers->attach($relatedProjectMember);
        $this->subject->setRelatedProjectMembers($objectStorageHoldingExactlyOneRelatedProjectMembers);

        self::assertEquals($objectStorageHoldingExactlyOneRelatedProjectMembers, $this->subject->_get('relatedProjectMembers'));
    }

    /**
     * @test
     */
    public function addRelatedProjectMemberToObjectStorageHoldingRelatedProjectMembers(): void
    {
        $relatedProjectMember = new \ReCentGlobe\Rcgprojectdb\Domain\Model\Person();
        $relatedProjectMembersObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $relatedProjectMembersObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($relatedProjectMember));
        $this->subject->_set('relatedProjectMembers', $relatedProjectMembersObjectStorageMock);

        $this->subject->addRelatedProjectMember($relatedProjectMember);
    }

    /**
     * @test
     */
    public function removeRelatedProjectMemberFromObjectStorageHoldingRelatedProjectMembers(): void
    {
        $relatedProjectMember = new \ReCentGlobe\Rcgprojectdb\Domain\Model\Person();
        $relatedProjectMembersObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $relatedProjectMembersObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($relatedProjectMember));
        $this->subject->_set('relatedProjectMembers', $relatedProjectMembersObjectStorageMock);

        $this->subject->removeRelatedProjectMember($relatedProjectMember);
    }

    /**
     * @test
     */
    public function getInstitutionsReturnsInitialValueForOrganization(): void
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getInstitutions()
        );
    }

    /**
     * @test
     */
    public function setInstitutionsForObjectStorageContainingOrganizationSetsInstitutions(): void
    {
        $institution = new \ReCentGlobe\Rcgprojectdb\Domain\Model\Organization();
        $objectStorageHoldingExactlyOneInstitutions = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneInstitutions->attach($institution);
        $this->subject->setInstitutions($objectStorageHoldingExactlyOneInstitutions);

        self::assertEquals($objectStorageHoldingExactlyOneInstitutions, $this->subject->_get('institutions'));
    }

    /**
     * @test
     */
    public function addInstitutionToObjectStorageHoldingInstitutions(): void
    {
        $institution = new \ReCentGlobe\Rcgprojectdb\Domain\Model\Organization();
        $institutionsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $institutionsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($institution));
        $this->subject->_set('institutions', $institutionsObjectStorageMock);

        $this->subject->addInstitution($institution);
    }

    /**
     * @test
     */
    public function removeInstitutionFromObjectStorageHoldingInstitutions(): void
    {
        $institution = new \ReCentGlobe\Rcgprojectdb\Domain\Model\Organization();
        $institutionsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $institutionsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($institution));
        $this->subject->_set('institutions', $institutionsObjectStorageMock);

        $this->subject->removeInstitution($institution);
    }

    /**
     * @test
     */
    public function getFunderReturnsInitialValueForOrganization(): void
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getFunder()
        );
    }

    /**
     * @test
     */
    public function setFunderForObjectStorageContainingOrganizationSetsFunder(): void
    {
        $funder = new \ReCentGlobe\Rcgprojectdb\Domain\Model\Organization();
        $objectStorageHoldingExactlyOneFunder = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneFunder->attach($funder);
        $this->subject->setFunder($objectStorageHoldingExactlyOneFunder);

        self::assertEquals($objectStorageHoldingExactlyOneFunder, $this->subject->_get('funder'));
    }

    /**
     * @test
     */
    public function getCooperationPartnersReturnsInitialValueForOrganization(): void
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getCooperationPartners()
        );
    }

    /**
     * @test
     */
    public function setCooperationPartnersForObjectStorageContainingOrganizationSetsCooperationPartners(): void
    {
        $cooperationPartner = new \ReCentGlobe\Rcgprojectdb\Domain\Model\Organization();
        $objectStorageHoldingExactlyOneCooperationPartners = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneCooperationPartners->attach($cooperationPartner);
        $this->subject->setCooperationPartners($objectStorageHoldingExactlyOneCooperationPartners);

        self::assertEquals($objectStorageHoldingExactlyOneCooperationPartners, $this->subject->_get('cooperationPartners'));
    }

    /**
     * @test
     */
    public function addCooperationPartnerToObjectStorageHoldingCooperationPartners(): void
    {
        $cooperationPartner = new \ReCentGlobe\Rcgprojectdb\Domain\Model\Organization();
        $cooperationPartnersObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $cooperationPartnersObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($cooperationPartner));
        $this->subject->_set('cooperationPartners', $cooperationPartnersObjectStorageMock);

        $this->subject->addCooperationPartner($cooperationPartner);
    }

    /**
     * @test
     */
    public function removeCooperationPartnerFromObjectStorageHoldingCooperationPartners(): void
    {
        $cooperationPartner = new \ReCentGlobe\Rcgprojectdb\Domain\Model\Organization();
        $cooperationPartnersObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $cooperationPartnersObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($cooperationPartner));
        $this->subject->_set('cooperationPartners', $cooperationPartnersObjectStorageMock);

        $this->subject->removeCooperationPartner($cooperationPartner);
    }
}
