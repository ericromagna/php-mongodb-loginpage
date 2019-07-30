<?php
require ("utility.php");
$util = new utility();
$url = "../index.php";
removeCookie();
$util->redirect($url);

function removeCookie(){
    if (isset($_COOKIE['userObject'])) {
        unset($_COOKIE['userObject']); 
        setcookie('userObject', null, -1, '/'); 
    }
}

?>