<?php
include 'autoloader.inc.php';


$validation = new Validation;
$check = new UserClass;
if (isset($_POST['checkLoginEmail'])) {
    $chackEmail= $check->checkEmail($_POST['checkLoginEmail']);
    $validateEmail =$validation->emailValidation($_POST['checkLoginEmail']);
    if ($chackEmail != 1) {
    
        $error =["valid"=> false,"msg" => "*Wrong email address !"];
        echo json_encode($error);
        
    } else if ($validateEmail == true) {
        $error =["valid"=> false,"msg" => "*Enter valid email !"];
        echo json_encode($error);
    } else { 
        $error =["valid" => true,"msg" => "*Email success !"];
        echo json_encode($error);
        
    } 
} else if (isset($_POST['checkLoginPassword'])) {
    
    
    $validationPassword = $validation->passwordValidation($_POST['checkLoginPassword']);
    if ($validationPassword == false) {
        $error =["valid" => false,"msg" => "*Enter valid password !"];
        echo json_encode($error);
    
    } else { 
        $error =["valid" => true,"msg" => "*Success password !"];
        echo json_encode($error);
        
    }   
       
} else {

if (isset($_POST['login'])) {
    $loginEmail = $_POST['loginEmail'];
    $loginPassword = $_POST['loginPassword'];
    $checkPassword = $check->checkPassword($loginEmail,$loginPassword);
    if ($checkPassword == false) { 
        $error =["valid" => false,"msg" => "*Wrong password !"];
        echo json_encode($error);
    }else { 
        $error =["valid" => true,"msg" => "*Success password check !"];
        echo json_encode($error);
        
    }
    $error =["valid" => true,"msg" => "*Success login !"];
    echo json_encode($error);
} else {
    $error =["valid" => false,"msg" => "*Error login !"];
    echo json_encode($error);
}

    
}
?>