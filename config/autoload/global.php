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
                    'sass/main.scss',
                ],
                'js/header-scripts.js' => [
                    'js/yepnope-bundle.js',
                    'vendor/modernizr/modernizr.js',
                ],
                'js/frontend-scripts.js' => [
                    'vendor/jquery/jquery.js',
                    'js/bootstrap.js',
                    'js/application.js',
                ],

                // js collections
                'js/yepnope-bundle.js' => [
                    'vendor/yepnope/yepnope.js',
                    'vendor/yepnope/plugins/yepnope.css.js',
                    'vendor/yepnope/prefixes/yepnope.css-prefix.js',
                    'vendor/yepnope/prefixes/yepnope.ie-prefix.js',
                    'vendor/yepnope/prefixes/yepnope.preload.js',
                ],
                'js/bootstrap.js' => [
                    'vendor/yatsatrap/js/bootstrap-transition.js',
                    'vendor/yatsatrap/js/bootstrap-alert.js',
                    'vendor/yatsatrap/js/bootstrap-button.js',
                    'vendor/yatsatrap/js/bootstrap-carousel.js',
                    'vendor/yatsatrap/js/bootstrap-collapse.js',
                    'vendor/yatsatrap/js/bootstrap-dropdown.js',
                    'vendor/yatsatrap/js/bootstrap-modal.js',
                    'vendor/yatsatrap/js/bootstrap-tooltip.js',
                    'vendor/yatsatrap/js/bootstrap-popover.js',
                    'vendor/yatsatrap/js/bootstrap-scrollspy.js',
                    'vendor/yatsatrap/js/bootstrap-tab.js',
                    'vendor/yatsatrap/js/bootstrap-affix.js',
                ],

            ],
            'paths' => [
                'assets',
            ],
        ],
        'filters' => [
            'sass/main.scss' => [
                [ 'service' => 'MyAsseticSassFilter' ],
            ],
        ],
    ],
];
