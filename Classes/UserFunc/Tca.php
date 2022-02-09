<?php

declare(strict_types=1);

namespace ReCentGlobe\Rcgprojectdb\UserFunc;


/**
 * This file is part of the "ReCentGlobe Database" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Florian Förster <florian.foerster@uni-leipzig.de>, ReCentGlobe
 */

/**
 * Organization
 */
class Tca
{

    public function formatPersonLabel(&$parameters)
    {
        $record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
        $newTitle = $record['firstname'].' '.$record['lastname'];
        $parameters['title'] = $newTitle;
    }

}
