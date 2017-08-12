<?php

namespace Application\Form;

use Zend\Form\Form;


class ContactForm extends Form {
    
   public function __construct() {
             parent::__construct(); 
        
       $this->setAttributes(array(
            'action' => '/kontakt',
            'method' => 'post',
            'name'  => 'form-wycena'
        ));
                
        $this->add(array(
                'type'      =>  'text',
                'name'      =>  'nazwa_firmy',
                'options'     =>  array(
                    'label' =>  'Nazwa Firmy'
                ),
                'required' => true,
                'attributes'=>  array(
                    'class'         =>  'form-control',
                    'placeholder'   =>  'Nazwa firmy'
                    
                ),
                
        ));
        $this->add(array(
                'type'      =>  'text',
                'name'      =>  'imie_nazwisko',
                'options'     =>  array(
                    'label' =>  'Imię i nazwisko'
                ),
                'required' => true,
                'attributes'=>  array(
                    'class'         =>  'form-control',  
                    'placeholder'   =>  'Imię i nazwisko'
                ),                
        ));
        
        $this->add(array(
                'type'      =>  'email',
                'name'      =>  'email',
                'options'     =>  array(
                    'label' =>  'Adres email'
                ),
                'required' => true,
                'attributes'=>  array(
                    'class'         =>  'form-control', 
                    'placeholder'   =>  'Adres email'
                ),
                
        ));
        
        $this->add(array(
                'type'      =>  'text',
                'name'      =>  'phone',
                'options'     =>  array(
                    'label' =>  'Telefon'
                ),
                'required' => true,
                'attributes'=>  array(
                    'class'         =>  'form-control', 
                    'placeholder'   =>  'Telefon'
                ),
                
        ));
        
        $this->add(array(
                'type'      =>  'textarea',
                'name'      =>  'message',
                'options'     =>  array(
                    'label' =>  'Wiadomość'
                ),
                'required' => true,
                'attributes'=>  array(
                    'class'         =>  'form-control', 
                    'placeholder'   =>  'Treść wiadomości',
                    'cols'        =>  '50',
                    'rows'        =>  '5'
                ),
                
        ));
       
        
        $this->add(array(
            'type'  =>  'submit',
            'name'  =>  'submit',
            'attributes' => array(
                 'class'    =>  'btn btn-success btn-block',
                 'value'    =>  'Wyślij'
             )
         ));
        
        
        
       
    }
    

}