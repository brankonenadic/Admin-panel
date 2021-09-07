<?php
include 'autoloader.inc.php';

$validation = new Validation;
$check = new UserClass;

if (isset($_POST['checkForgotPasswordEmail'])) {
    $chackEmail= $check->checkEmail($_POST['checkForgotPasswordEmail']);
    $validateEmail =$validation->emailValidation($_POST['checkForgotPasswordEmail']);
    if ($chackEmail != 1) {
    
        $error =["valid"=> false,"msg" => "*Email is not registrated !"];
        echo json_encode($error);
        
    } else if ($validateEmail == true) {
        $error =["valid"=> false,"msg" => "*Enter valid email !"];
        echo json_encode($error);
    } else { 
        $error =["valid"=> true,"msg" => "*Email is ok !"];
        echo json_encode($error);
        
    }

   
} else {
  if (isset($_POST['forgotPassword'])) {
    $error =["valid"=> true,"msg" => "*Email is ok !"];
        echo json_encode($error);
  } else {
    $error =["valid"=> false,"msg" => "*Enter valid email !"];
    echo json_encode($error);
  }
}
?>