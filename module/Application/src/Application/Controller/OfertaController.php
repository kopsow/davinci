<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class OfertaController extends AbstractActionController
{
    public function indexAction()
    {
        $page = $this->params()->fromRoute('param');
        $view = new ViewModel();
        switch ($page) {
            case 'spedycja-drogowa':
                $view->setTemplate('application/transport/spedycja');
            break;
            case 'calopojazdowy':
                $view->setTemplate('application/transport/calopojazdowy');
                break;
            case 'czesciowy-i-drobnicowy':
                $view->setTemplate('application/transport/czesciowy');
                break;
        }
        return $view;
    }
    
}
