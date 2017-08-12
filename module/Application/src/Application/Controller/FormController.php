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

class FormController extends AbstractActionController
{
    public function indexAction()
    {
       return new ViewModel();
    }
    
    public function wycenaAction()
    {
        $formularzWyceny = new \Application\Form\WycenaForm();
        $formularzKontaktu   = new \Application\Form\ContactForm();
        $filterKontakt = new \Application\Filter\ContactFilter();
        $request = $this->getRequest();
        if ($request->isPost())
        {
            
           $formularzWyceny->setData($request->getPost());
           $formularzKontaktu->setData($request->getPost());
           $formularzKontaktu->setInputFilter($filterKontakt->getInputFilter()->remove('Regex'));
           $formularzKontaktu->isValid();
        }
        
        
        return new ViewModel(array(
            'form'  =>  $formularzWyceny,
            'form_contact' => $formularzKontaktu
            
        ));
    }
    
    
    
}
