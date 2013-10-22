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
    'MyBase' => array(
        'AsseticSassFilter' => array(
            'sass_path' => '/usr/local/bin/sass',
        ),
    ),

    'asset_manager' => [
        'resolver_configs' => [
            'collections' => [

                // main output files
                'css/styles.css' => [
                    'css/static-css-bundle.css',
                    'css/compiled-css-bundle.css',
                ],
                'js/scripts.js' => [
                    'js/modernizr.js',
                    'js/yepnope-bundle.js',
                    'js/jquery-bundle.js',
                    'js/bootstrap.js',
                    'js/application-bundle.js',
                ],

                // css collections
                'css/compiled-css-bundle.css' => [
                    'css/main.css',
                ],
                'css/static-css-bundle.css' => [
                    'css/bootstrap.css',
                ],

                // js collections
                'js/application-bundle.js' => [
                    'js/application.js',
                ],
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

            ],
            'map' => [
                'css/main.css'              => 'assets/sass/main.scss',
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
                'assets/vendor/bootstrap/dist'
            ],
        ],
        'filters' => [
            'css/main.css' => [
                [ 'service' => 'MyAsseticSassFilter' ],
            ],
        ],
    ],
];
