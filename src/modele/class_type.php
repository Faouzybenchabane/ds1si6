<?php

class Type{
    
    private $db;
    private $insert; 
    private $connect;
    private $select;
    
    public function __construct($db){
        $this->db = $db;
        $this->insert = $db->prepare("insert  into  type(libelle) values "."(:libelle)");  
        $this->connect = $db->prepare("select libelle from type");
        $this->select  =  $db->prepare("select libelle from type order by id");
    }
    
    public function insert($libelle){
          $r = true;
        $this->insert->execute(array(':libelle'=>$libelle));
        if ($this->insert->errorCode()!=0){
             print_r($this->insert->errorInfo());  
             $r=false;
        }
        return $r;
    }

    public function select(){
        $listeT=  $this->select->execute();
        if ($this->select->errorCode()!=0){
            print_r($this->select->errorInfo());  
        }
        return $this->select->fetchAll();
    }
    
}

