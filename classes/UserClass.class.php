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
   /* Check password */
   public function checkPassword($email, $password) {
       $this->Connect();
   
       $sql = $this->conn->query("SELECT * FROM users WHERE userEmail='$email'  LIMIT 1");
       $numRow = $sql->num_rows;
       $row = $sql->fetch_assoc();
 
      if ($numRow == 1) {          
           if (password_verify($password, $row['userPassword'])) {
               return true;
           } else {
                //echo mysqli_error($this->conn);
              return false;
           }
       } else {
           //echo mysqli_error($this->conn);
           return false;
       } 
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
    /* Activate new user */
    public function activate($id, $token) {
      $this->Connect();
      $sql = ("SELECT * FROM users WHERE id='$id' AND token = '$token'");
      $activate = $this->conn->query($sql);
      $numRows = $activate->num_rows;
      $row = $activate->fetch_assoc();
    
      $timeSet = strtotime($row['datetime']);
      $timeNow = strtotime(date('Y-m-d H:i:s'));
    
    $sql = $timeNow - $timeSet;
      $hours =$sql / ( 60 * 60 );
    
      if ($numRows > 0) {
        if ($hours < 1) {
          
          if($update = $this->conn->query("UPDATE users SET status='1' WHERE id='$id'") == true) {
            return true;
          } else {
            echo "Error: " . mysqli_error($this->conn);
            return false;
          }
        } else {
          //header('location: ../error_activation');
          return false;
        }
      } else {
        //header('location: ../error_activation');
        return false;
      }
    }
 /* Login */
 public function login($email, $password)
 {
     $this->Connect();
 
     $sql = "SELECT * FROM users WHERE userEmail=? AND status<>'0' LIMIT 1";
     $stmt = mysqli_stmt_init($this->conn);
     if (!mysqli_stmt_prepare($stmt, $sql)) { 
         exit();
         //header("location: ");
         return false;
     } else {
         mysqli_stmt_bind_param($stmt, "s", $email);
         mysqli_stmt_execute($stmt);

         if (!$result = mysqli_stmt_get_result($stmt)) {
           echo "Error updating record: " . mysqli_error($this->conn);
             //header("location: ");
         }
     }
     $count_row = $result->num_rows;
     $row = mysqli_fetch_assoc($result);

     if ($count_row == 1) {
         if (password_verify($password, $row['userPassword'])) {
             if ($row['status'] == 1) {
                 if (session_status() == PHP_SESSION_NONE) {
                     session_start();
                 }
         

                 $_SESSION['login'] = true;

                 $_SESSION['userId'] =  $row['id'];

                 $_SESSION['userType'] =  $row['userType'];

                 return true;
             } else {
                 return false;
                 //header("location: ");
             }
         } else {
             return false;
             //header("location: ");
         }
     } else {
         return false;
         //header("location: ");

         //  header ('location: register_page');
     }
 }

/* UserClass end */
}


?>