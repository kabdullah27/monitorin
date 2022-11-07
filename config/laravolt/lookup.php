<?php

return [
    'routes' => [
        'enabled' => false,
        'middleware' => config('laravolt.platform.middleware'),
        'prefix' => '',
    ],
    'view' => [
        'layout' => 'laravolt::layouts.app',
    ],
    'menu' => [
        'enabled' => false,
    ],
    'permission' => \Laravolt\Platform\Enums\Permission::MANAGE_LOOKUP,
    'collections' => [
        // Sample lookup collections
        'pekerjaan' => [
            'label' => 'Pekerjaan',
        ],
    ],
];
