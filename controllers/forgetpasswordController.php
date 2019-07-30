<?php
require ("utility.php");
$util = new utility();

$url = "../views/forgetpassword_setnewpassword.php";

//Saving the user email
session_start();
$email = $_SESSION['userEmail'];
$_SESSION['userMessageAnswer'] = "";
$connection = new MongoDB\Driver\Manager("mongodb+srv://any-user:12345@cluster0-8ps2y.mongodb.net/test?retryWrites=true&w=majority");
try{
    $user = $util->get_user($connection, $email);
    $user = json_decode($user, true);
    $_SESSION['userForgetPassword'] = $user;
    $_SESSION['userMessageAnswer'] = "";
    
    if($user['answerQuestion'] != $_POST['forgetPasswordAnswer']){
        $url = "../views/forgetpassword.php";
        $_SESSION['userMessageAnswer'] = "Wrong answer.";
    }
}
catch(Exception $e){
    $_SESSION['userMessageAnswer'] = "Critical error";
    $url = "../views/forgetpassword.php";
}
$util->redirect($url);
?>