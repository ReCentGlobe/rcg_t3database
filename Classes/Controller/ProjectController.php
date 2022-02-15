<?php

declare(strict_types=1);

namespace ReCentGlobe\Rcgprojectdb\Controller;

use \ReCentGlobe\Rcgprojectdb\Domain\Repository\CategoryRepository;
use \ReCentGlobe\Rcgprojectdb\Domain\Repository\ProjectRepository;
use ReCentGlobe\Rcgprojectdb\Utility\CategoryUtility;
use \TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

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
     * @param ReCentGlobe\Rcgprojectdb\Domain\Model\Project
     * @return string|object|null|void
     */
    public function listAction()
    {
        $data = GeneralUtility::_GP('tx_fgzdatabase_showpeople');


        $context = GeneralUtility::makeInstance(Context::class);
        $langId = $context->getPropertyFromAspect('language', 'id');
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump(array_values($this->settings['categories']));

        $catfilter = array_values($this->settings['categories']);
        foreach ($catfilter as $k => $v) {
            //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump(CategoryUtility::getCategoryListWithChilds($v));
            $categoryList = $this->categoryRepository->getCategoryfilter($v);
            //$cat = GeneralUtility::intExplode(',', $categoryList, true);

            //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($categoryList);
            $this->view->assign('cat-'.$v, $categoryList);
        }

        $projects = $this->projectRepository->findAll();
        $this->view->assign('projects', $projects);
        $this->view->assign('sysLanguageUid', $langId);
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
