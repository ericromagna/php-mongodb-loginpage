<?php
//Controller of signup view. The validations are handle by javascript at ls/validations.js
require ("utility.php");
$util = new utility();

$url = "../views/sucess.php";
$errorMessage = "";

try{
    $bulk = new MongoDB\Driver\BulkWrite;
    //Instatiate new DB manager control
    $manager = new MongoDB\Driver\Manager("mongodb+srv://any-user:12345@cluster0-8ps2y.mongodb.net/test?retryWrites=true&w=majority");
    
    $newUser = ['userEmail'=> Trim( $_POST['userEmailSignUp']),
        'password'=>Trim( $_POST['userPasswordSignUp']),
        'firstName'=>Trim( $_POST['firstNameSignUp']), 
        'lastName'=>Trim( $_POST['lastNameSignUp']),
        'dob'=>$_POST['dobSignUp'],
        'securityQuestion'=>Trim( $_POST['securityQuestionSignUp']),
        'answerQuestion'=>Trim( $_POST['securityQuestionAnswerSignUp'])];

    //If we dont have duplicate emails, save it, otherwise return to signup view
    if(!$util->check_email($manager, $_POST['userEmailSignUp'])){  
        $bulk->insert($newUser);
        $result = $manager->executeBulkWrite('woodpecker.woodpecker', $bulk);
        //Cleaning the error message
        session_start();
        $_SESSION['userMessageSignUp'] = $userMessage;
    }
    else{
        $url = "../views/signup.php";
        $userMessage = "This email is already used. Try to sign in or click in Forget Password";
        session_start();
        $_SESSION['userMessageSignUp'] = $userMessage;
        echo "hola";
    }
    $util->redirect($url);
}
catch(Exception $e)
{
    $url = "../views/signup.php";
    $userMessage = 'Caught exception: '.  $e->getMessage();
    session_start();
    $_SESSION['userMessageSignUp'] = $userMessage;
    echo "ex";
    $util->redirect($url);
}

?>