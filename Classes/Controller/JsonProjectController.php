<?php

declare(strict_types=1);

namespace ReCentGlobe\Rcgprojectdb\Controller;


use ReCentGlobe\Rcgprojectdb\Domain\Model\Project;
use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use ReCentGlobe\Rcgprojectdb\Mvc\View\JsonView;
use TYPO3\CMS\Extbase\Pagination\QueryResultPaginator;
use TYPO3\CMS\Core\Pagination\SimplePagination;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

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
class JsonProjectController extends ProjectController
{
    /**
     * view
     *
     * @var JsonView
     */
    protected $view;

    /**
     * defaultViewObjectName
     *
     * @var string
     */
    protected $defaultViewObjectName = JsonView::class;

    /**
     * action list
     *
     * @param Project
     * @return string|object|null|void
     */
    public function listAction(int $currentPage = 1)
    {
        $this->view->setVariablesToRender(['projects','settings']);
        $projects = $this->projectRepository->findAll();

        $currentPage = $this->request->hasArgument('currentPage') ? (int)$this->request->getArgument('currentPage') : $currentPage;
        $perPage = $this->request->hasArgument('perPage') ? (int)$this->request->getArgument('perPage') : (int)$this->settings['itemsPerPage'];
        
        $paginator = new QueryResultPaginator($projects, $currentPage, $perPage);

        $this->view->assign('projects', $paginator->getPaginatedItems());
        $this->view->assign('settings', $paginator);
    }

    /**
     * action search
     *
     * @param int $currentPage
     * @return string|object|null|void
     */
    public function searchAction(int $currentPage = 1) {
        $query = $this->request->hasArgument('q') ? $this->request->getArgument('q') : 'SFB';
        $this->view->setVariablesToRender(['projects','settings']);
        $projects = $this->projectRepository->findByFilter($query);

        $currentPage = $this->request->hasArgument('currentPage') ? (int)$this->request->getArgument('currentPage') : $currentPage;
        $perPage = $this->request->hasArgument('perPage') ? (int)$this->request->getArgument('perPage') : (int)$this->settings['itemsPerPage'];

        $paginator = new QueryResultPaginator($projects, $currentPage, $perPage);

        $this->view->assign('projects', $paginator->getPaginatedItems());
        $this->view->assign('settings', $_POST);
    }

    /**
     * action show
     *
     * @param Project
     * @return string|object|null|void
     */
    public function showAction(Project $project)
    {
        $this->view->setVariablesToRender(['project']);
        $this->view->assign('project', $project);
    }
}
