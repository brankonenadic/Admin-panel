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



/* 
if (isset($_POST['forgot_password'])){
    $user_email = $_POST['forgot_password_email'];
    $id = $result->forgot_pw_user_id($user_email);
    $datetime = date('Y-m-d H:i:s');
    $token = md5($id.$user_email.$datetime);
    $_SESSION['new_pw_email'] = $_POST['forgot_password_email'];
    $_SESSION['new_pw_id'] = $id;
    $update_token = $result->forgot_password($id , $token , $datetime);
    if ($update_token == true){
        Include ("sendmail.inc.php");
        $to = "$user_email";
        $coll = new EmailBody();
        $body = $coll->forgotpw_email($id, $token);      
        $subject = "New password";
        if (send_mail($to, $body, $subject)) {
            $error = '*Email is sent';
            echo $error;
        } else{
            $error = '*Email is not sent';
            echo $error;
        } 
    } else {
        $error = '*Error update token';
        echo $error;
    }
*/







    $error =["valid"=> true,"msg" => "*Email is ok !"];
        echo json_encode($error);
  } else {
    $error =["valid"=> false,"msg" => "*Enter valid email !"];
    echo json_encode($error);
  }
}
?>