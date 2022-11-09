<?php

return [
    'label' => 'Monitoring',
    'model' => \App\Models\MtWebsite::class,
    // 'table' => \App\Http\Livewire\Table\LocationTable::class,

    'schema' => [
        [
            'name' => 'website_domain_name',
            'type' => \Laravolt\Fields\Field::TEXT,
            'label' => 'Domain / IP',
        ],
        [
            'name' => 'website_name',
            'type' => \Laravolt\Fields\Field::TEXT,
            'label' => 'Nama Server',
        ],
        [
            'name' => 'is_active',
            'type' => \Laravolt\Fields\Field::DROPDOWN,
            'label' => 'Status',
            'options' => [1 => 'Aktif', 0 => 'Tidak Aktif'],
        ]
    ],
];