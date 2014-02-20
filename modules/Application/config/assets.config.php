<?php
/**
 * @author Stefano Torresi (http://stefanotorresi.it)
 * @license See the file LICENSE.txt for copying permission.
 * ************************************************
 */

return [
    'asset_manager' => [
        'resolver_configs' => [
            'collections' => [

                // main output files
                'application/css/main.css' => [
                    'application/sass/frontend.scss',
                ],

                'application/js/header.js' => [
                    'application/js/yepnope-bundle.js',
                    'application/vendor/modernizr/modernizr.js',
                ],

                'application/js/scripts.js' => [
                    'application/js/jquery-bundle.js',
                    'application/js/bootstrap.js',
                    'application/js/application.js',
                ],

                // js collections
                'application/js/jquery-bundle.js' => [
                    'application/vendor/jquery/dist/jquery.js',
                ],
                'application/js/yepnope-bundle.js' => [
                    'application/vendor/yepnope/yepnope.js',
                    'application/vendor/yepnope/plugins/yepnope.css.js',
                    'application/vendor/yepnope/prefixes/yepnope.css-prefix.js',
                    'application/vendor/yepnope/prefixes/yepnope.ie-prefix.js',
                    'application/vendor/yepnope/prefixes/yepnope.preload.js',
                ],
                'application/js/bootstrap.js' => [
                    'application/vendor/yatsatrap/js/bootstrap-transition.js',
                    'application/vendor/yatsatrap/js/bootstrap-alert.js',
                    'application/vendor/yatsatrap/js/bootstrap-button.js',
                    'application/vendor/yatsatrap/js/bootstrap-carousel.js',
                    'application/vendor/yatsatrap/js/bootstrap-collapse.js',
                    'application/vendor/yatsatrap/js/bootstrap-dropdown.js',
                    'application/vendor/yatsatrap/js/bootstrap-modal.js',
                    'application/vendor/yatsatrap/js/bootstrap-tooltip.js',
                    'application/vendor/yatsatrap/js/bootstrap-popover.js',
                    'application/vendor/yatsatrap/js/bootstrap-scrollspy.js',
                    'application/vendor/yatsatrap/js/bootstrap-tab.js',
                    'application/vendor/yatsatrap/js/bootstrap-affix.js',
                ],
            ],

            'paths' => [
                __DIR__ . '/../assets',
            ],
        ],

        'filters' => [
            'application/sass/frontend.scss' => [
                [ 'service' => 'MyAsseticSassFilter' ],
            ],
        ],
    ],
];
