<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return [

    'asset_manager' => [
        'resolver_configs' => [
            'collections' => [

                // main output files
                'css/styles.css' => [
                    'css/static-css-bundle.css',
                    'css/compiled-css-bundle.css',
                ],
                'js/header-scripts.js' => [
                    'js/yepnope-bundle.js',
                    'js/modernizr.js',
                ],
                'js/frontend-scripts.js' => [
                    'js/jquery-bundle.js',
                    'js/bootstrap.js',
                    'js/application.js',
                ],

                // css collections
                'css/compiled-css-bundle.css' => [
                    'sass/main.scss',
                ],
                'css/static-css-bundle.css' => [
                ],

                // js collections
                'js/jquery-bundle.js' => [
                    'js/jquery.js',
                ],
                'js/yepnope-bundle.js' => [
                    'js/yepnope.js',
                    'js/yepnope.css.js',
                    'js/yepnope.css-prefix.js',
                    'js/yepnope.ie-prefix.js',
                    'js/yepnope.preload.js',
                ],
                'js/bootstrap.js' => [
                    'js/bootstrap-transition.js',
                    'js/bootstrap-alert.js',
                    'js/bootstrap-button.js',
                    'js/bootstrap-carousel.js',
                    'js/bootstrap-collapse.js',
                    'js/bootstrap-dropdown.js',
                    'js/bootstrap-modal.js',
                    'js/bootstrap-tooltip.js',
                    'js/bootstrap-popover.js',
                    'js/bootstrap-scrollspy.js',
                    'js/bootstrap-tab.js',
                    'js/bootstrap-affix.js',
                ],

            ],
            'map' => [
                'sass/main.scss'            => 'assets/sass/main.scss',
                'js/application.js'         => 'assets/js/application.js',
                'js/jquery.js'              => 'assets/vendor/jquery/jquery.js',
                'js/modernizr.js'           => 'assets/vendor/modernizr/modernizr.js',
                'js/yepnope.js'             => 'assets/vendor/yepnope/yepnope.js',
                'js/yepnope.css.js'         => 'assets/vendor/yepnope/plugins/yepnope.css.js',
                'js/yepnope.css-prefix.js'  => 'assets/vendor/yepnope/prefixes/yepnope.css-prefix.js',
                'js/yepnope.ie-prefix.js'   => 'assets/vendor/yepnope/prefixes/yepnope.ie-prefix.js',
                'js/yepnope.preload.js'     => 'assets/vendor/yepnope/prefixes/yepnope.preload.js',
            ],
            'paths' => [
                'assets/vendor/yatsatrap'
            ],
        ],
        'filters' => [
            'sass/main.scss' => [
                [ 'service' => 'MyAsseticSassFilter' ],
            ],
        ],
    ],
];
