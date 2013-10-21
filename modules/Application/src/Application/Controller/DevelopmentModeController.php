<?php
/**
 * Code borrowed from zend apigility skeleton app
 *
 * @link      http://github.com/zfcampus/zf-apigility-skeleton
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2013 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace Application\Controller;

use MyBase\Controller\AbstractConsoleController;

class DevelopmentModeController extends AbstractConsoleController
{
    public function enableAction()
    {
        if (file_exists('config/development.config.php')) {
            return "Already in development mode!\n";
        }
        copy('config/development.config.php.dist', 'config/development.config.php');

        return "You are now in development mode.\n";
    }

    public function disableAction()
    {
        if (!file_exists('config/development.config.php')) {
            return "Development mode was already disabled.\n";
        }
        unlink('config/development.config.php');

        return "Development mode is now disabled.\n";
    }
}
