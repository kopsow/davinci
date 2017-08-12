<?php

namespace Application\Form;

use Zend\Form\Form;
use Zend\Form\Element;

class WycenaForm extends Form {
    
   public function __construct() {
        parent::__construct('login');       
        
       $this->setAttributes(array(
            'action' => '/strefa-klienta/formularz-wyceny',
            'method' => 'post',
            'name'  => 'form-wycena'
        ));
                
        
        $this->add(array(
                'type'      =>  'Zend\Form\Element\Date',
                'name'      =>  'data_zaladunku',
                'options'     =>  array(
                    'label' =>  'Data załadunku',
                    'format' => 'Y-m-d',
                ),
                'required' => true,                
                'attributes'=>  array(
                    'class'         =>  'form-control',
                    'placeholder'   =>  'Podaj datę załadunku',
                    'min'    => date('Y-m-d'),
                    'value'  => date('Y-m-d'),
                ),
                
        ));
        
        $this->add(array(
                'type'      =>  'text',
                'name'      =>  'kod_pocztowy_zaladunku',
                'options'     =>  array(
                    'label' =>  'Kod pocztowy załadunku'
                ),
                'required' => true,
                'attributes'=>  array(
                    'class'         =>  'form-control',
                    
                ),
                
        ));
        $this->add(array(
                'type'      =>  'text',
                'name'      =>  'miejscowosc_zaladunku',
                'options'     =>  array(
                    'label' =>  'Miejscowość załadunku'
                ),
                'required' => true,
                'attributes'=>  array(
                    'class'         =>  'form-control',  
                    'placeholder'   =>  'Miejscowość załadunku'
                ),                
        ));
        $this->add(array(
                'type'      =>  'text',
                'name'      =>  'kraj_zaladunku',
                'options'     =>  array(
                    'label' =>  'Kraj załadunku'
                ),
                'required' => true,
                'attributes'=>  array(
                    'class'         =>  'form-control', 
                    'placeholder'   =>  'Kraj załadunku'
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
        
        //DANE ROZŁADUNKU
        
        $this->add(array(
                'type'      =>  'Zend\Form\Element\Date',
                'name'      =>  'data_rozladunku',
                'options'     =>  array(
                    'label' =>  'Data rozładunku'
                ),
                'required' => true,
                'attributes'=>  array(
                    'class'         =>  'form-control',
                    'value'         =>  date('Y-m-d'),
                    
                ),
               
        ));
        
        $this->add(array(
                'type'      =>  'text',
                'name'      =>  'kod_pocztowy_rozladunku',
                'options'     =>  array(
                    'label' =>  'Kod pocztowy rozładunku',
                    'format' => 'Y-m-d',
                ),
                'required' => true,
                'attributes'=>  array(
                    'class'         =>  'form-control',
                    
                    
                ),
                
        ));
        $this->add(array(
                'type'      =>  'text',
                'name'      =>  'miejscowosc_rozladunku',
                'options'     =>  array(
                    'label' =>  'Miejscowość rozładunku'
                ),
                'required' => true,
                'attributes'=>  array(
                    'class'         =>  'form-control',                    
                    'placeholder'   =>  'Miejscowość rozładunku'
                ),                
        ));
        $this->add(array(
                'type'      =>  'text',
                'name'      =>  'kraj_rozladunku',
                'options'     =>  array(
                    'label' =>  'Kraj rozładunku'
                ),
                'required' => true,
                'attributes'=>  array(
                    'class'         =>  'form-control',    
                    'placeholder'   =>  'Kraj rozładunku'
                ),                
        ));
        $this->add(array(
                'type'      =>  'text',
                'name'      =>  'waga',
                'options'     =>  array(
                    'label' =>  'Waga'
                ),
                'required' => true,
                'attributes'=>  array(
                    'class'         =>  'form-control', 
                    'placeholder'   =>  'Waga brutto ładunku'
                ),                
        ));
        $this->add(array(
                'type'      =>  'text',
                'name'      =>  'wymiary',
                'options'     =>  array(
                    'label' =>  'Wymiary'
                ),
                'required' => true,
                'attributes'=>  array(
                    'class'         =>  'form-control', 
                    'placeholder'   =>  'Wymiary ładunku'
                ),                
        ));
        $zaladunek = new Element\Select('sposob_zaladunku');
        $zaladunek->setLabel('Sposób załadunku');
        $zaladunek->setAttribute('class','form-control');
        $zaladunek->setValueOptions(array(
                '0' => 'Góra',
                '1' => 'Bok',
                '2' => 'Tył',

        ));
        $this->add($zaladunek);
        
        $pakowanie = new Element\Select('sposob_pakowania');
        $pakowanie->setLabel('Sposób pakowania');
        $pakowanie->setAttribute('class','form-control');
        $pakowanie->setValueOptions(array(
                '0' =>  'Spaletyzowany',
                '1' =>  'Niestandardowy',
                '2' =>  'Luzem',
                '3' =>  'Ciekły'
                ));
        $this->add($pakowanie);
        
        $tabor  =    new Element\Select('tabor');
        $tabor->setLabel('Preferowany rodzaj taboru');
        $tabor->setAttribute('class','form-control');
        $tabor->setValueOptions(array(
            '0' =>  'solo',
            '1' =>  'express bus',
            '2' =>  'plandeka',
            '3' =>  'firana',
            '4' =>  'walking floor',
            '5' =>  'wywrotka 50m3',
            '6' =>  'wywrotka 60m3',
            '7' =>  'chłodnia',
            '8' =>  'izoterma',
            '9' =>  'platforma',
            '10' =>  'nieskopodwoziowy',
            '11' =>  'specjalistyczny',
            '12' =>  'cysterna',
            '13' =>  'inny',
        ));
        $this->add($tabor);
        
        $odpad = new Element\Select('odpad');
        $odpad->setLabel('Odpad?');
        $odpad->setValue('1');
        $odpad->setAttribute('class', 'form-control');
        $odpad->setValueOptions(array(
            '0' =>  'Tak',
            '1' =>  'Nie',
        ));
        $this->add($odpad);
        
        $this->add(array(
                'type'      =>  'text',
                'name'      =>  'kod_odpadu',
                'options'     =>  array(
                    'label'     =>  'Kod odpadu',
                    
                    'label_attributes'  =>  array(
                        'class' =>  'hidden',
                        'id'    =>  'kod_odpadu',
                    )
                    
                ),
                'required' => false,
                'attributes'=>  array(
                    'class'         =>  'form-control',                     
                    'placeholder'   =>  'Wpisz kod odpadu',
                    
                    
                ),                
        ));
        
        $adr = new Element\Select('adr');
        $adr->setLabel('ADR?');
        $adr->setValue('1');
        $adr->setAttribute('class', 'form-control');
        $adr->setValueOptions(array(
            '0' =>  'Tak',
            '1' =>  'Nie',
        ));
        $this->add($adr);
        
        $this->add(array(
                'type'      =>  'text',
                'name'      =>  'klasyfikacja_adr',
                'options'     =>  array(
                    'label'     =>  'Klasyfikacja ADR',
                    'label_attributes'  =>  array(
                        'class' =>  'hidden',
                        'id'    =>  'adr',
                    )
                    
                ),
                'required' => false,
                'attributes'=>  array(
                    'class'         =>  'form-control', 
                    'placeholder'   =>  'Klasyfikacja',
                    
                ),                
        ));
        $wymogi = new Element\Textarea('wymogi_specjalistyczne');
        $wymogi->setLabel('Wymogi specjalistyczne');
        
        $this->add($wymogi);
        
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