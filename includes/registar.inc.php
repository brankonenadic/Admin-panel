<?php
include 'autoloader.inc.php';

$validation = new Validation;
$check = new UserClass;
if (isset($_POST['checkEmail'])) {
    $chackEmail= $check->checkEmail($_POST['checkEmail']);
   
    if ($chackEmail > 0) {
    
        $error =["valid"=> false,"msg" => "*Email is alredy registered !"];
        echo json_encode($error);
        
    } else { 
        $error =["valid" => true,"msg" => "*Email available !"];
        echo json_encode($error);
        
    } 
}
if (isset($_POST['checkedFullname'])) {
    $validationFullname = $validation->fullnameValidation($_POST['checkedFullname']);
   
    if ($validationFullname == false) {
        $error =["valid" => false,"msg" => "*Enter valid name !"];
        echo json_encode($error);
    } else { 
        $error =["valid" => true,"msg" => "*Success !"];
        echo json_encode($error);
        
    } 
}
if (isset($_POST['checkPassord'])) {
    $validationPassword = $validation->passwordValidation($_POST['checkPassord']);
    if ($validationPassword == false) {
        $error =["valid" => false,"msg" => "*Enter valid password !"];
        echo json_encode($error);
    } else { 
        $error =["valid" => true,"msg" => "*Success !"];
        echo json_encode($error);
        
    }  
}
if (isset($_POST['registar'])) {
  /*   $fullname = $_POST['fullname'];
    $email = $_POST['registarEmail'];
    $password = $_POST['registarPassword'];
    $validationFullname = $validation->fullnameValidation($fullname);
    $validationEmail = $validation->emailValidation($email);
    $validationPassword = $validation->passwordValidation($password);

    if ($validationFullname == false) {
        $error =["valid" => false,"msg" => "*Enter valid name !"];
        echo json_encode($error);
    } */
    $error =["valid" => true,"msg" => "*Success !"];
        echo json_encode($error);
    
    
}
?>