<?php
/**
 * @author Stefano Torresi (http://stefanotorresi.it)
 * @license See the file LICENSE.txt for copying permission.
 * ************************************************
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $this->layout()->content = '
            <div class="container">
                <div style="display: none" class="visible-lg visible-md visible-sm visible-xs">
                    <h1 class="text-center alert alert-success">
                        <span class="glyphicon glyphicon-ok-sign"></span>
                        It works!
                    </h1>
                </div>
                <div class="hidden">
                    <h1>CSS assets loading falied :(</h1>
                </div>
            </div>
        ';

        return false;
    }
}
