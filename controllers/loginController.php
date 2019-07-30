<?php
require ("utility.php");
$util = new utility();

//Set connection using database connection string
$connection = new MongoDB\Driver\Manager("mongodb+srv://any-user:12345@cluster0-8ps2y.mongodb.net/test?retryWrites=true&w=majority");

$formEmail = $_POST['userEmail'];
$formPassword = $_POST['userPassword'];

//Session start for error messages
session_start();
$userMessage = "";
$url = "../index.php";

//User object
$cookie_name = "userObject";

//Checks if email belongs to any database client

//Checking if email exists
$emailIsValid = $util->check_email($connection, $formEmail);

//If exists, checking if the password matches
//The password could've be fetch usuing check_email method, but in order to maintain a clean set of decision,
//I have decided to created a method for password only
if($emailIsValid){
    $user = $util->check_password($connection, $formEmail, $formPassword);
    if($user != null){
        setcookie($cookie_name, $user, time() + (86400 * 30), "/"); //1 day
    }
    else{
        $userMessage = "Email or password is wrong";
    }
}
else{
    $userMessage = "Email or password is wrong";
}

//Returns a error message to login page
$_SESSION['userMessage'] = $userMessage;
$util->redirect($url);
?>