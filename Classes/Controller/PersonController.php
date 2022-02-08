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
 * PersonController
 */
class PersonController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * personRepository
     *
     * @var \ReCentGlobe\Rcgprojectdb\Domain\Repository\PersonRepository
     */
    protected $personRepository = null;

    /**
     * action index
     *
     * @param ReCentGlobe\Rcgprojectdb\Domain\Model\Person
     * @return string|object|null|void
     */
    public function indexAction()
    {
    }

    /**
     * action list
     *
     * @param ReCentGlobe\Rcgprojectdb\Domain\Model\Person
     * @return string|object|null|void
     */
    public function listAction()
    {
        $people = $this->personRepository->findAll();
        $this->view->assign('people', $people);
    }

    /**
     * action show
     *
     * @param ReCentGlobe\Rcgprojectdb\Domain\Model\Person
     * @return string|object|null|void
     */
    public function showAction(\ReCentGlobe\Rcgprojectdb\Domain\Model\Person $person)
    {
        $this->view->assign('person', $person);
    }

    /**
     * @param \ReCentGlobe\Rcgprojectdb\Domain\Repository\PersonRepository $PersonRepository
     */
    public function injectPersonRepository(\ReCentGlobe\Rcgprojectdb\Domain\Repository\PersonRepository $personRepository)
    {
        $this->personRepository = $personRepository;
    }
}
