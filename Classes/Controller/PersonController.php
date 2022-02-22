<?php

declare(strict_types=1);

namespace ReCentGlobe\Rcgprojectdb\Controller;


use ReCentGlobe\Rcgprojectdb\Domain\Model\Dto\PersonDemand;
use ReCentGlobe\Rcgprojectdb\Domain\Model\Person;
use ReCentGlobe\Rcgprojectdb\Domain\Repository\CategoryRepository;
use ReCentGlobe\Rcgprojectdb\Domain\Repository\PersonRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;
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
 * PersonController
 */
class PersonController extends ActionController
{

    /**
     * personRepository
     *
     * @var PersonRepository
     */
    protected $personRepository = null;

    /**
     * categoryRepository
     *
     * @var CategoryRepository
     */
    protected $categoryRepository = null;


    /**
     * action list
     * @param PersonDemand|null $filter
     * @return string|object|null|void
     * @throws InvalidQueryException
     */
    public function listAction(PersonDemand $filter = null)
    {
        $catfilter = array_values($this->settings['categories']);
        foreach ($catfilter as $k => $v) {
            $categoryList = $this->categoryRepository->findChildren($v);
            $this->view->assign('cat-' . $v, $categoryList);
        }

        $people = $this->personRepository->findDemanded($filter);

        $assignValues = [
            'people' => $people,
            'filter' => $filter,
        ];

        $this->view->assignMultiple($assignValues);
    }

    /**
     * action show
     *
     * @param Person $person
     * @return string|object|null|void
     */
    public function showAction(Person $person)
    {
        $this->view->assign('person', $person);
    }

    /**
     * @param PersonRepository $PersonRepository
     */
    public function injectPersonRepository(PersonRepository $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    /**
     * Inject categoryRepository
     *
     * @param CategoryRepository $categoryRepository
     */
    public function injectCategoryRepository(CategoryRepository $categoryRepository): void
    {
        $this->categoryRepository = $categoryRepository;
    }
}
