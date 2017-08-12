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
use Zend\Session;


class IndexController extends AbstractActionController
{
    
    private $charytatywnieTable;
    
    public function getCharytatywnieTable()
    {
        if (!$this->charytatywnieTable) {
            $sm = $this->getServiceLocator();
            $this->charytatywnieTable = $sm->get('Charytatywnie\Model\CharytatywnieTable');
        }
        return $this->charytatywnieTable;
    }
    public function indexAction()
    {
        $session = new Session\Container('language');
       
        if($this->params()->fromRoute('lang')){
            switch($this->params()->fromRoute('lang')) {
            case 'pl':
                $session->language = 'pl_PL';
                break;
            case 'de':
                $session->language = 'de_DE';
                break;
            case 'cz':
                $session->language = 'cs_CZ';
                break;
            case 'en':
                $session->language = 'en_EN';
                break;
            default :
                $session->language = 'pl_PL';
                break;
        }
        }
        
            
             $this->serviceLocator->get('translator')->setLocale($session->language);
        
        return new ViewModel();
    }
    
    public function charytatywnieAction()
    {
        
        return new ViewModel(array(
            'charytatywnie' =>  $this->getCharytatywnieTable()->fetchAll(),
        ));
        
        
    }
}
