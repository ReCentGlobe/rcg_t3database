<?php

declare(strict_types=1);

namespace ReCentGlobe\Rcgprojectdb\Controller;

use ReCentGlobe\Rcgprojectdb\Domain\Model\Project;
use ReCentGlobe\Rcgprojectdb\Domain\Repository\CategoryRepository;
use ReCentGlobe\Rcgprojectdb\Domain\Repository\ProjectRepository;
use ReCentGlobe\Rcgprojectdb\Utility\CategoryUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
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


    // TODO: Cleanup List Action

    /**
     * action list
     *
     * @param Project
     * @return string|object|null|void
     */
    public function listAction()
    {
        $data = GeneralUtility::_GP('tx_fgzdatabase_showpeople');

        $context = GeneralUtility::makeInstance(Context::class);
        $langId = $context->getPropertyFromAspect('language', 'id');
        //DebuggerUtility::var_dump(array_values($this->settings['categories']));

        $catfilter = array_values($this->settings['categories']);
        foreach ($catfilter as $k => $v) {
            $categoryList = $this->categoryRepository->findChildren($v);
            //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($categoryList);
            $this->view->assign('cat-' . $v, $categoryList);
        }

        $projects = $this->projectRepository->findAll();
        $resultCount = $this->projectRepository->countAll();
        DebuggerUtility::var_dump($resultCount);

        $assignValues = [
            'projects' => $projects,
            'resultCount' => $resultCount,
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
