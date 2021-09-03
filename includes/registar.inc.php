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
} else if (isset($_POST['checkedFullname'])) {
    $validationFullname = $validation->fullnameValidation($_POST['checkedFullname']);
   
    if ($validationFullname == false) {
        $error =["valid" => false,"msg" => "*Enter valid name !"];
        echo json_encode($error);
    } else { 
        $error =["valid" => true,"msg" => "*Success !"];
        echo json_encode($error);
        
    } 
} else if (isset($_POST['checkPassord'])) {
    $validationPassword = $validation->passwordValidation($_POST['checkPassord']);
    if ($validationPassword == false) {
        $error =["valid" => false,"msg" => "*Enter valid password !"];
        echo json_encode($error);
    } else { 
        $error =["valid" => true,"msg" => "*Success !"];
        echo json_encode($error);
        
    }  
} else {
    if (isset($_POST['registar'])) {
        $fullname = $_POST['fullname'];
        $email = $_POST['registarEmail'];
        $password = $_POST['registarPassword'];
        $datetime = date('Y-m-d H:i:s');
        $token = md5($fullname.$password.$datetime);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        $registar = $check->userRegistration($fullname,$email,$hashedPassword,$token,$datetime);
        if ($registar == true) {
            $error =["valid" => true,"msg" => "*Success insert new user!"];
            echo json_encode($error);
        } else {
            $error =["valid" => false,"msg" => "*Error registration new user !"];
            echo json_encode($error);
        }
    } else {
        $error =["valid" => false,"msg" => "*Error registration !"];
        echo json_encode($error);
    }
}

?>