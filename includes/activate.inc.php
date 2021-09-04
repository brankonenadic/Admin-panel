<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();}
include 'autoloader.inc.php';


if(isset($_GET['id']) && isset($_GET['token'])) {

 
   $activate = new UserClass;
  
  if ($activate->activate($_GET['id'], $_GET['token'])) {
    
    session_start();
    $_SESSION['login'] = true;
    $_SESSION['userId'] = $_GET['id'];
    header('location: http://localhost/brankonenadic/github/Admin%20panel/Admin-panel/');

  }else{
    //header('location: http://localhost/brankonenadic/github/Admin%20panel/Admin-panel/');
    $error =["valid" => false,"msg" => "*Activation error'!"];
    echo json_encode($error);
  } 
}
