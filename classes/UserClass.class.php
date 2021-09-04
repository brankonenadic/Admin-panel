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
    public function userId($email, $password)
    {
        $this->Connect();

        $result = $this->conn->query("SELECT id FROM users WHERE userEmail = '$email' AND userPassword = '$password'");
        $row = $result->fetch_assoc();
        $id = $row['id'];

        return $id;
    }
    /* Registration new user */
    public function userRegistration($fullname,$email,$password,$token,$datetime) {
        $this->Connect();
        $conn = $this->conn;
  
        $check = $this->conn->prepare("SELECT * FROM users WHERE userEmail=? AND status<>'0'");
        $check->bind_param("s", $email);
        $check->execute();
        $check->store_result();
        $numRow = $check->num_rows;
        $status = '2';
        $check->close();
        if ($numRow >= 1) {
            //header('location: login');
            return false;
        } else {
          
            $sql  = "INSERT INTO users (fullname, userEmail, userPassword, datetime, token, status) VALUES(?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            
            if (!mysqli_stmt_prepare($stmt, $sql)) {
               
                exit();
                //header("location: https://office.dev.lab387.com/v3/error?error=8");
                return false;
                
            } else {
                mysqli_stmt_bind_param($stmt, "ssssss", $fullname, $email, $password, $datetime, $token, $status);
                if (!mysqli_stmt_execute($stmt)) {
                    //echo "Error inserting record: " . mysqli_error($this->conn);
                    exit();
                    return false;
                   //header("location: https://office.dev.lab387.com/v3/error?error=8");
                }
                mysqli_stmt_close($stmt);
            }
        }
        return true;
        mysqli_close($conn);
    }

}


?>