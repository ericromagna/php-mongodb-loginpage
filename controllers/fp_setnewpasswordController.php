<?php
require ("utility.php");
$util = new utility();

session_start();
$email = $_SESSION['userEmail'];
$newPassword = $_POST['forgetPasswordNewPassword'];
$url = "../index.php";

try{
    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->update(
        ['userEmail' => $email],
        ['$set' => ['password' => $newPassword]],
        ['multi' => false, 'upsert' => false]
    );

    $manager = new MongoDB\Driver\Manager('mongodb+srv://any-user:12345@cluster0-8ps2y.mongodb.net/test?retryWrites=true&w=majority');
    $result = $manager->executeBulkWrite('woodpecker.woodpecker', $bulk);
}
catch(Exception $ex){
    //Just a joke, for sure
    $url = "https://stackoverflow.com/search?q=how+to+update+mongodb+using+php";
    $util->redirect($url);
    //echo 'Caught exception: ',  $ex->getMessage(), "\n";
}
$util->redirect($url);

?>