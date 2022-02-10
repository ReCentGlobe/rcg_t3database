<?php

declare(strict_types=1);

namespace ReCentGlobe\Rcgprojectdb\Controller;


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
class ProjectController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * projectRepository
     *
     * @var \ReCentGlobe\Rcgprojectdb\Domain\Repository\ProjectRepository
     */
    protected $projectRepository = null;

    /**
     * action index
     *
     * @param ReCentGlobe\Rcgprojectdb\Domain\Model\Project
     * @return string|object|null|void
     */
    public function indexAction()
    {
    }

    /**
     * action list
     *
     * @param ReCentGlobe\Rcgprojectdb\Domain\Model\Project
     * @return string|object|null|void
     */
    public function listAction()
    {
        $projects = $this->projectRepository->findAll();
        $this->view->assign('projects', $projects);
    }

    /**
     * action search
     *
     * @param ReCentGlobe\Rcgprojectdb\Domain\Model\Project
     * @return string|object|null|void
     */
    public function searchAction() {
        $itemsPerPage = $this->settings['defaultItemsPerPage'];
        $page = 0;

        if ($this->request->hasArgument('page')) {
            $page = intval($this->request->getArgument('page'));
        }

        // get items, set items per page and next page
        $next = $this->projectRepository->findItems(intval($this->settings['defaultItemsPerPage']), $page);

        $projects = $this->offerRepository->findByAccountNumber('123456');
        $this->view->assign('projects', $projects);

        //$this->view->assign('settings', $this->settings);
        //$this->view->assign('next', $next->count());
        //$this->view->assign('page', $page + 1);
    }

    /**
     * action show
     *
     * @param ReCentGlobe\Rcgprojectdb\Domain\Model\Project
     * @return string|object|null|void
     */
    public function showAction(\ReCentGlobe\Rcgprojectdb\Domain\Model\Project $project)
    {
        $this->view->assign('project', $project);
    }

    /**
     * @param \ReCentGlobe\Rcgprojectdb\Domain\Repository\ProjectRepository $ProjectRepository
     */
    public function injectProjectRepository(\ReCentGlobe\Rcgprojectdb\Domain\Repository\ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }
}
