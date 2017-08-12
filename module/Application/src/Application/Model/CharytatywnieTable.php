<?php

namespace Application\Model;

use Zend\Db\TableGateway\TableGateway;

class CharytatywnieTable {
    
    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }
    
    public function fetchAll()    {
        
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }
    
    public function getCharytatywnie($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }
    /**
     * Pobiera pacjenta po numerz user_id
     * @param type $id
     * @return type
     * @throws \Exception
     */
    public function getCharytatywnieId($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }
    
    

    public function addCharytatywnie(Charytatywnie $charytatywnie)
    {
        
        $data = array(            
            'id'           => $charytatywnie->id,
            'tytul'        => $charytatywnie->tytul,
            'opis'         => $charytatywnie->opis,
            'zdjecie'      => $charytatywnie->zdjecie,
            'www'          => $charytatywnie->www,
            
        );
        $this->tableGateway->insert($data);
    }
    public function deleteCharytatywnie($id)
    {
        $this->tableGateway->delete(array('id' => $id));
    }
    
    public function lastInsertId() {
        return $this->tableGateway->lastInsertValue;
    }
    
    
}

