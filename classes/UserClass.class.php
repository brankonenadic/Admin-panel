<?php

class User extends Connection {

  private $conn;
  private $parentInstance;

  public function Connect(){ 
    $this->parentInstance = parent::instance();
    $this->conn = $this->parentInstance->connect();
  }

  public function __construct(){
    $this->Connect();
  }



}


?>