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

class WartosciController extends AbstractActionController
{
    public function indexAction()
    {
        $page = $this->params()->fromRoute('param');
        $view = new ViewModel();
        switch ($page) {
            case 'elastyczni-pracownicy':
                $view->setTemplate('application/wartosci/elastyczni-pracownicy');
            break;
            case 'pasja':
                $view->setTemplate('application/wartosci/pasja');
                break;
            case 'uczciwa-wspolpraca':
                $view->setTemplate('application/wartosci/uczciwa-wspolpraca');
                break;
            case 'innowacyjnosc':
                $view->setTemplate('application/wartosci/innowacyjnosc');
                break;
        }
        return $view;
    }
    
}
