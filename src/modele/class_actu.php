<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of class_actu
 *
 * @author Thomas-PC
 */
class class_actu {
    
    private $db;
    private $connect;
    private $select;
    
    public function __construct($db){
        $this->db = $db;
        $this->insert = $db->prepare("insert  into  Actualité(id,titre,contenu,) values "."(:id,:titre,:contenu,)");
        
    }
     public function insert($id, $titre, $contenu){ 
        $r = true;
        $this->insert->execute(array(':id'=>$id, ':titre'=>$titre, ':contenu'=>$contenu));
        if ($this->insert->errorCode()!=0){
             print_r($this->insert->errorInfo());  
             $r=false;
        }
        return $r;

   
}
}
