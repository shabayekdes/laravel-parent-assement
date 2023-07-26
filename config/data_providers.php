<?php


use App\Dto\DtoUserX;
use App\Dto\DtoUserY;

return [
    'providers' => [
        DtoUserX::class => database_path('DataProviderX.json'),
        DtoUserY::class => database_path('DataProviderY.json')
        // Add more data providers here as needed
    ],
];
