<?php
namespace ReCentGlobe\Rcgprojectdb\Domain\Model;


use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * This file is part of the "ReCentGlobe Database" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Florian Förster <florian.foerster@uni-leipzig.de>, ReCentGlobe
 */

/**
 * Category
 */
class Category extends AbstractEntity
{

    /**
     * @var string
     */
    protected $title = '';

    /**
     * @var Category
     */
    protected $parentCategory;

    /**
     * Get parent category
     *
     * @return Category
     */
    public function getParentCategory(): Category
    {
        return $this->parentCategory;
    }

    /**
     * Set parent category
     *
     * @param Category $category parent category
     *
     * @return void
     */
    public function setParentCategory($category): void
    {
        $this->parentcategory = $category;
    }

    /**
     * Get category title
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set category title
     *
     * @param string $title title
     *
     * @return void
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

}
