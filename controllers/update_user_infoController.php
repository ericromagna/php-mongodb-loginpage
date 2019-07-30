<?php
require ("utility.php");
$util = new utility();
$url = "../index.php";

//Set connection using database connection string
$connection = new MongoDB\Driver\Manager("mongodb+srv://any-user:12345@cluster0-8ps2y.mongodb.net/test?retryWrites=true&w=majority");


//Only 4 things that can be changed
$userJSON = json_decode($_COOKIE['userObject'],true);//You only can update if you were a cookie user
$useremail = $userJSON['userEmail'];

$firstName = $_POST['firstNameUpdate'];
$lastName = $_POST['lastNameUpdate'];
$question = $_POST['securityQuestionUpdate'];
$answer = $_POST['securityQuestionAnswerUpdate'];

//In case user needs to change the password, this session is needed
session_start();
$_SESSION['userEmail'] = $useremail;

try{
    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->update(
        ['userEmail' => $useremail],
        ['$set' => ['firstName' => $firstName, 'lastName' => $lastName,
         'securityQuestion' => $question, 'answerQuestion' => $answer ]],
        ['multi' => false, 'upsert' => false]
    );

    $manager = new MongoDB\Driver\Manager('mongodb+srv://any-user:12345@cluster0-8ps2y.mongodb.net/test?retryWrites=true&w=majority');
    $result = $manager->executeBulkWrite('woodpecker.woodpecker', $bulk);

    //Reset cookie with the updated user
    $user = $util->get_user($connection, $useremail);
    setcookie("userObject", $user, time() + (86400 * 30), "/"); //1 day
    
}
catch(Exception $ex){
    $util->redirect($url);
    //echo 'Caught exception: ',  $ex->getMessage(), "\n";
}
$util->redirect($url);



?>