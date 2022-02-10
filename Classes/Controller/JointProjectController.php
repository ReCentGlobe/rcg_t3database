<?php

declare(strict_types=1);

namespace ReCentGlobe\Rcgprojectdb\Controller;


/**
 * This file is part of the "Rcgprojectdb" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 
 */

/**
 * JointProjectController
 */
class JointProjectController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * jointProjectRepository
     *
     * @var \ReCentGlobe\Rcgprojectdb\Domain\Repository\JointProjectRepository
     */
    protected $jointProjectRepository = null;

    /**
     * @param \ReCentGlobe\Rcgprojectdb\Domain\Repository\JointProjectRepository $jointProjectRepository
     */
    public function injectJointProjectRepository(\ReCentGlobe\Rcgprojectdb\Domain\Repository\JointProjectRepository $jointProjectRepository)
    {
        $this->jointProjectRepository = $jointProjectRepository;
    }

    /**
     * action list
     *
     * @return string|object|null|void
     */
    public function listAction()
    {
        $jointProjects = $this->jointProjectRepository->findAll();
        $this->view->assign('jointProjects', $jointProjects);
    }

    /**
     * action show
     *
     * @param \ReCentGlobe\Rcgprojectdb\Domain\Model\JointProject $jointProject
     * @return string|object|null|void
     */
    public function showAction(\ReCentGlobe\Rcgprojectdb\Domain\Model\JointProject $jointProject)
    {
        $this->view->assign('jointProject', $jointProject);
    }
}
