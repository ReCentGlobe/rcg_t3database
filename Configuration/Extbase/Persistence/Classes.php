<?php
declare(strict_types=1);

use ReCentGlobe\Rcgprojectdb\Domain\Model\Category;

return [
    Category::class => [
        'tableName' => 'sys_category',
        'properties' => [
            'parentCategory' => [
                'fieldName' => 'parent'
            ],
        ],
    ],
];