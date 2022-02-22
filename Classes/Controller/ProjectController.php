<?php

declare(strict_types=1);

namespace ReCentGlobe\Rcgprojectdb\Controller;

use ReCentGlobe\Rcgprojectdb\Domain\Model\Dto\ProjectDemand;
use ReCentGlobe\Rcgprojectdb\Domain\Model\Project;
use ReCentGlobe\Rcgprojectdb\Domain\Repository\CategoryRepository;
use ReCentGlobe\Rcgprojectdb\Domain\Repository\ProjectRepository;
use ReCentGlobe\Rcgprojectdb\Utility\CategoryUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Mvc\ResponseInterface;
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
class ProjectController extends ActionController
{

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
     * action list
     *
     * @param ProjectDemand $filter
     * @throws \TYPO3\CMS\Core\Context\Exception\AspectNotFoundException
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
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
