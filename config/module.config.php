<?php

namespace Breeze\Auth;

use Breeze\Auth\Context\CreateToken;
use Breeze\Auth\Context\Factory\CreateToken as CreateTokenFactory;

return [
    'service_manager' => [
        'factories' => [
            CreateToken::class => CreateTokenFactory::class,
        ],
    ],

    'schema' => [
        'mutations' => [
            [
                'name'    => Mutation\Login::class,
                'context' => Context\CreateToken::class
            ]
        ],
    ],

    'authentication' => [
        'secretKey'  => '',
        'serverName' => '',
    ]
];
