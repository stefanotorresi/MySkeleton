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
                    'application/js/bootstrap-bundle.js',
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
                'application/js/bootstrap-bundle.js' => [
                    'application/vendor/twbs-bootstrap-sass/vendor/assets/javascripts/bootstrap/transition.js',
                    'application/vendor/twbs-bootstrap-sass/vendor/assets/javascripts/bootstrap/alert.js',
                    'application/vendor/twbs-bootstrap-sass/vendor/assets/javascripts/bootstrap/button.js',
                    'application/vendor/twbs-bootstrap-sass/vendor/assets/javascripts/bootstrap/carousel.js',
                    'application/vendor/twbs-bootstrap-sass/vendor/assets/javascripts/bootstrap/collapse.js',
                    'application/vendor/twbs-bootstrap-sass/vendor/assets/javascripts/bootstrap/dropdown.js',
                    'application/vendor/twbs-bootstrap-sass/vendor/assets/javascripts/bootstrap/modal.js',
                    'application/vendor/twbs-bootstrap-sass/vendor/assets/javascripts/bootstrap/tooltip.js',
                    'application/vendor/twbs-bootstrap-sass/vendor/assets/javascripts/bootstrap/popover.js',
                    'application/vendor/twbs-bootstrap-sass/vendor/assets/javascripts/bootstrap/scrollspy.js',
                    'application/vendor/twbs-bootstrap-sass/vendor/assets/javascripts/bootstrap/tab.js',
                    'application/vendor/twbs-bootstrap-sass/vendor/assets/javascripts/bootstrap/affix.js',
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
