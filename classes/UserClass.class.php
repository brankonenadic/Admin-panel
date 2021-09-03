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
        $info = "SELECT * FROM users WHERE userEmail = '$email' AND status<>'0'";
        $check = $this->conn->query($info);
        $numRows = $check->num_rows;
          return $numRows;
    }
    /* Registration new user */
    public function userRegistration($fullname,$email,$password,$token,$datetime) {
        $this->Connect();
      
        $insert = $this->conn->query("INSERT INTO users (fullname, userEmail, userPassword, token, datetime, status) VALUES ('$fullname', '$email', '$password', '$token', '$datetime', '2')");
        if ($insert == true) {
          return true;
         
        }else {
          return false;
        
        }
    }

}


?>