<?php

declare(strict_types=1);

namespace ReCentGlobe\Rcgprojectdb\Controller;

use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use ReCentGlobe\Rcgprojectdb\Domain\Model\Dto\ProjectDemand;
use ReCentGlobe\Rcgprojectdb\Domain\Model\Project;
use ReCentGlobe\Rcgprojectdb\Domain\Repository\CategoryRepository;
use ReCentGlobe\Rcgprojectdb\Domain\Repository\ProjectRepository;
use ReCentGlobe\Rcgprojectdb\Mvc\View\JsonView;
use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Mvc\Exception\NoSuchArgumentException;
use TYPO3\CMS\Extbase\Pagination\QueryResultPaginator;
use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Core\Pagination\SimplePagination;


/**
 * This file is part of the "ReCentGlobe Database" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Florian Förster <florian.foerster@uni-leipzig.de>, ReCentGlobe
 */

/**
 * ProjectController
 */
class ProjectController extends ActionController
{
    /** @var ResponseFactoryInterface */
    private $responseFactory;

    /**
     * @var StreamFactoryInterface
     */
    protected $streamFactory;

    /**
     * projectRepository
     *
     * @var ProjectRepository
     */
    protected $projectRepository = null;

    /**
     * categoryRepository
     *
     * @var CategoryRepository
     */
    protected $categoryRepository = null;

    /**
     * @param ResponseFactoryInterface $responseFactory
     * @param StreamFactoryInterface $streamFactory
     */
    public function __construct(ResponseFactoryInterface $responseFactory, StreamFactoryInterface $streamFactory)
    {
        $this->responseFactory = $responseFactory;
        $this->streamFactory = $streamFactory;
    }

    /**
     * action list
     *
     * @param ProjectDemand $filter
     * @throws \TYPO3\CMS\Core\Context\Exception\AspectNotFoundException
     * @throws InvalidQueryException
     */
    public function listAction(ProjectDemand $filter = null)
    {
        $context = GeneralUtility::makeInstance(Context::class);
        $langId = $context->getPropertyFromAspect('language', 'id');

        $catfilter = array_values($this->settings['categories']);
        foreach ($catfilter as $k => $v) {
            $categoryList = $this->categoryRepository->findChildren($v);
            $this->view->assign('cat-' . $v, $categoryList);
        }

        $projects = $this->projectRepository->findDemanded(
            $filter
        );

        $assignValues = [
            'projects' => $projects,
            'filter' => $filter,
            'sysLanguageUid' => $langId
        ];

        $this->view->assignMultiple($assignValues);
    }

    /**
     * action show
     *
     * @param Project $project
     * @return string|object|null|void
     */
    public function showAction(Project $project)
    {
        $this->view->assign('project', $project);
    }


    /**
     * initialize v Action
     * @return void
     */
    public function initializeAjaxlistAction(): void
    {
        $this->defaultViewObjectName = JsonView::class;
    }

    /**
     * action ajaxList
     * @param ProjectDemand|null $filter
     * @param int $currentPage
     * @return void
     * @throws NoSuchArgumentException
     * @throws InvalidQueryException
     */
    public function ajaxlistAction(ProjectDemand $filter = null, int $currentPage = 1): void
    {
        $this->view->setVariablesToRender(['projects', 'settings']);
        $projects = $this->projectRepository->findDemanded(
            $filter
        );
        $currentPage = $this->request->hasArgument('currentPage') ? (int)$this->request->getArgument('currentPage') : $currentPage;
        $perPage = $this->request->hasArgument('perPage') ? (int)$this->request->getArgument('perPage') : (int)$this->settings['itemsPerPage'];

        $paginator = new QueryResultPaginator($projects, $currentPage, $perPage);

        $assignValues = [
            'projects' => $paginator->getPaginatedItems(),
            'filter' => $filter,
            'settings' => $paginator
        ];

        $this->view->assignMultiple($assignValues);
    }

    /**
     * initialize ajaxShow Action
     * @return void
     */
    public function initializeAjaxshowAction(): void
    {
        $this->defaultViewObjectName = JsonView::class;
    }

    /**
     * action ajaxShow
     *
     * @param Project
     * @return string|object|null|void
     */
    public function ajaxshowAction(Project $project)
    {
        $this->view->setVariablesToRender(['project']);
        $this->view->assign('project', $project);
    }

    /**
     * @param ProjectRepository $ProjectRepository
     */
    public function injectProjectRepository(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    /**
     * Inject categoryRepository
     *
     * @param CategoryRepository $CategoryRepository
     */
    public function injectCategoryRepository(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

}
