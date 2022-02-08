<?php

declare(strict_types=1);

namespace ReCentGlobe\Rcgprojectdb\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\CMS\Extbase\Mvc\View\ViewInterface;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author Florian Förster <florian.foerster@uni-leipzig.de>
 */
class ProjectControllerTest extends UnitTestCase
{
    /**
     * @var \ReCentGlobe\Rcgprojectdb\Controller\ProjectController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\ReCentGlobe\Rcgprojectdb\Controller\ProjectController::class))
            ->onlyMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllProjectsFromRepositoryAndAssignsThemToView(): void
    {
        $allProjects = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $projectRepository = $this->getMockBuilder(\ReCentGlobe\Rcgprojectdb\Domain\Repository\ProjectRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $projectRepository->expects(self::once())->method('findAll')->will(self::returnValue($allProjects));
        $this->subject->_set('projectRepository', $projectRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('projects', $allProjects);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenProjectToView(): void
    {
        $project = new \ReCentGlobe\Rcgprojectdb\Domain\Model\Project();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('project', $project);

        $this->subject->showAction($project);
    }
}
