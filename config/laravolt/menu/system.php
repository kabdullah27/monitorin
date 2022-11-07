<?php

return [
    'System' => [
        'order' => 99,
        'menu' => [
            'Users' => [
                'route' => 'users.index',
                'active' => 'users/*',
                'icon' => 'user-friends',
                'permissions' => [\Laravolt\Platform\Enums\Permission::MANAGE_USER],
            ],
            'Roles' => [
                'route' => 'epicentrum::roles.index',
                'config' => 'epicentrum/roles/*',
                'icon' => 'user-astronaut',
                'permissions' => [\Laravolt\Platform\Enums\Permission::MANAGE_ROLE],
            ],
            'Permissions' => [
                'route' => 'epicentrum::permissions.edit',
                'active' => 'epicentrum/permissions/*',
                'icon' => 'shield-check',
                'permissions' => [\Laravolt\Platform\Enums\Permission::MANAGE_PERMISSION],
            ],
            'Settings' => [
                'route' => 'platform::settings.edit',
                'active' => 'platform/settings/*',
                'icon' => 'sliders-v',
                'permissions' => [\Laravolt\Platform\Enums\Permission::MANAGE_SETTINGS],
            ],
        ],
    ],
];
