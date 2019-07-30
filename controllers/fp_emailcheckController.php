<?php
require ("utility.php");
$util = new utility();

//Set connection using database connection string
$connection = new MongoDB\Driver\Manager("mongodb+srv://any-user:12345@cluster0-8ps2y.mongodb.net/test?retryWrites=true&w=majority");

$email = $_POST['userEmailForgetPassword'];
$url = "forgetpasswordController.php";

//Save email or error message
session_start();
$_SESSION['userMessageForgetPassword'] = "";
$_SESSION['userEmail'] = "";

if($util->check_email($connection, $email)){
    $_SESSION['userEmail'] = $email;
}
else{
    $url = "../views/forgetpassword_emailcheck.php";
    $_SESSION['userMessageForgetPassword'] = "This email does not belong to our database";
}

$util->redirect($url);

?>