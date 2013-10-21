<?php
/**
 * @author Stefano Torresi (http://stefanotorresi.it)
 * @license See the file LICENSE.txt for copying permission.
 * ************************************************
 */

namespace Application;

return [
    'console' => [
        'router' => [
            'routes' => [
                'development-mode' => [
                    'options' => [
                        'route' => 'development (enable|disable):action',
                        'defaults' => [
                            'controller' => __NAMESPACE__ . '\Controller\DevelopmentMode',
                        ],
                    ],
                ],
            ],
        ],
    ],
];
