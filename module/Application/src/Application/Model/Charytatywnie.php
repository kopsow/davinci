<?php
namespace Application\Model;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Charytatywnie  implements InputFilterAwareInterface {
    public $id;
    public $tytul;
    public $opis;
    public $zdjecie;
    public $www;
    
    protected $inputFilter;
  
    
    public function exchangeArray($data) {
        $this->id               = (isset($data['id']))          ? $data['id']           : null;
        $this->tytul            = (isset($data['tytul']))       ? $data['tytul']        : null;
        $this->opis             = (isset($data['opis']))        ? $data['opis']         : null;
        $this->zdjecie          = (isset($data['zdjecie']))     ? $data['zdjecie']      : null;
        $this->www              = (isset($data['www']))         ? $data['www']          : null;    
        
        }
    
    public function setInputFilter(InputFilterInterface $inputFilter)
     {
         throw new \Exception("Not used");
     }

    public function getInputFilter()
     {
         if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            
            
            
             $this->inputFilter = $inputFilter;
         }

         return $this->inputFilter;
     }
    
}

