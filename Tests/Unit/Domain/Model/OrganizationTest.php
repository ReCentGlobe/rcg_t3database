<?php

declare(strict_types=1);

namespace ReCentGlobe\Rcgprojectdb\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author Florian Förster <florian.foerster@uni-leipzig.de>
 */
class OrganizationTest extends UnitTestCase
{
    /**
     * @var \ReCentGlobe\Rcgprojectdb\Domain\Model\Organization|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \ReCentGlobe\Rcgprojectdb\Domain\Model\Organization::class,
            ['dummy']
        );
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle(): void
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('title'));
    }

    /**
     * @test
     */
    public function getLogoReturnsInitialValueForFileReference(): void
    {
        self::assertEquals(
            null,
            $this->subject->getLogo()
        );
    }

    /**
     * @test
     */
    public function setLogoForFileReferenceSetsLogo(): void
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setLogo($fileReferenceFixture);

        self::assertEquals($fileReferenceFixture, $this->subject->_get('logo'));
    }

    /**
     * @test
     */
    public function getUrlReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getUrl()
        );
    }

    /**
     * @test
     */
    public function setUrlForStringSetsUrl(): void
    {
        $this->subject->setUrl('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('url'));
    }
}
