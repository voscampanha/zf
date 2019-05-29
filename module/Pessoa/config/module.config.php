<?php

namespace Pessoa;

use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'pessoa' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/pessoa[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+'
                    ],
                    'defaults' => [
                        'controller' => Controller\PessoaController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],
    // 'controllers' => [
    //     'factories' => [
    //         // Controller\PessoaController::class => InvokableFactory::class,
    //     ],
    // ],
    'view_manager' => [
        'template_path_stack' => [
            'pessoa' => __DIR__ . '/../view',
        ],
    ],
    'db' => [
        'driver' => 'Pdo_Mysql',
        'database' => 'localdb',
        'username' => 'azure',
        'password' => '6#vWHD_$',
        'hostname' => '127.0.0.1',
        'port' => '49359',

    ],
];