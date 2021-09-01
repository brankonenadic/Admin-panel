<?php

class UserClass extends Connection {

  private $conn;
  private $parentInstance;

  public function Connect(){ 
    $this->parentInstance = parent::instance();
    $this->conn = $this->parentInstance->connect();
  }

  public function __construct(){
    $this->Connect();
  }
    /* Checking if the email is alreedy in the database */
    public function checkEmail($email) {
        $this->Connect();   
        htmlspecialchars($email,ENT_QUOTES,'UTF-8');
        $info = "SELECT * FROM users WHERE userEmail = '$email' AND status='1'";
        $check = $this->conn->query($info);
        $numRows = $check->num_rows;
          return $numRows;
    }

}


?>