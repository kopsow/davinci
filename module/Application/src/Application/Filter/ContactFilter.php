<?php

namespace Application\Filter;

use Zend\Form\Form;
use Zend\InputFilter\InputFilter;

class ContactFilter extends Form {
     protected $inputFilter;
     
     public function __construct() {
        parent::__construct('contact');    
        
        
     }
     
     public function getInputFilter()
     {
         if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            
            $inputFilter->add(array(
                'name'     => 'nazwa_firmy',
                'required' => true,
                'validators' => array(
                    array(
                      'name' =>'NotEmpty', 
                        'options' => array(
                            'messages' => array(
                                \Zend\Validator\NotEmpty::IS_EMPTY => 'Proszę podać nazwę firmy' ,
                                
                            ),
                        ),
                    ),
                )                
            ));
            
            $inputFilter->add(array(
                'name'     => 'imie_nazwisko',
                'required' => true,
                'validators' => array(
                    array(
                      'name' =>'NotEmpty', 
                        'options' => array(
                            'messages' => array(
                                \Zend\Validator\NotEmpty::IS_EMPTY => 'Proszę podać swoje imię i nazwisko' ,
                                
                            ),
                        ),
                    ),
                )                
            ));
            
            $inputFilter->add(array(
                'name'     => 'phone',
                'required' => true,
                'validators' => array(
                    array(
                      'name' =>'StringLength', 
                        'options' => array(
                            'messages' => array(
                               \Zend\Validator\StringLength::INVALID => 'Nieprawidłowy numer telefonu' ,
                                
                            ),
                        ),
                    ),
                    array(
                      'name' =>'NotEmpty', 
                        'options' => array(
                            'messages' => array(
                                \Zend\Validator\NotEmpty::IS_EMPTY => 'Pole telefon nie może być puste' ,
                                
                            ),
                        ),
                    ),
                )                
            ));
            
            
            $this->inputFilter = $inputFilter;
         }
         
         return $inputFilter;
     }
}
