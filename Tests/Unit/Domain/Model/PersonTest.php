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
class PersonTest extends UnitTestCase
{
    /**
     * @var \ReCentGlobe\Rcgprojectdb\Domain\Model\Person|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \ReCentGlobe\Rcgprojectdb\Domain\Model\Person::class,
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
    public function getFirstnameReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getFirstname()
        );
    }

    /**
     * @test
     */
    public function setFirstnameForStringSetsFirstname(): void
    {
        $this->subject->setFirstname('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('firstname'));
    }

    /**
     * @test
     */
    public function getLastnameReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getLastname()
        );
    }

    /**
     * @test
     */
    public function setLastnameForStringSetsLastname(): void
    {
        $this->subject->setLastname('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('lastname'));
    }

    /**
     * @test
     */
    public function getProjectsReturnsInitialValueForProject(): void
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getProjects()
        );
    }

    /**
     * @test
     */
    public function setProjectsForObjectStorageContainingProjectSetsProjects(): void
    {
        $project = new \ReCentGlobe\Rcgprojectdb\Domain\Model\Project();
        $objectStorageHoldingExactlyOneProjects = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneProjects->attach($project);
        $this->subject->setProjects($objectStorageHoldingExactlyOneProjects);

        self::assertEquals($objectStorageHoldingExactlyOneProjects, $this->subject->_get('projects'));
    }

    /**
     * @test
     */
    public function addProjectToObjectStorageHoldingProjects(): void
    {
        $project = new \ReCentGlobe\Rcgprojectdb\Domain\Model\Project();
        $projectsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $projectsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($project));
        $this->subject->_set('projects', $projectsObjectStorageMock);

        $this->subject->addProject($project);
    }

    /**
     * @test
     */
    public function removeProjectFromObjectStorageHoldingProjects(): void
    {
        $project = new \ReCentGlobe\Rcgprojectdb\Domain\Model\Project();
        $projectsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $projectsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($project));
        $this->subject->_set('projects', $projectsObjectStorageMock);

        $this->subject->removeProject($project);
    }
}
