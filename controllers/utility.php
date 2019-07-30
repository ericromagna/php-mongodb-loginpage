<?php

class utility{
    function check_email($connection, $email){
        $filter = ['userEmail' => $email];
        $options = [];
        $emailDatabase = null;

        $query = new \MongoDB\Driver\Query($filter, $options);
        $rows   = $connection->executeQuery('woodpecker.woodpecker', $query); 

        foreach ($rows as $document) {
            $document = json_decode(json_encode($document),true);
            $emailDatabase =  $document['userEmail'];
        }

        if($emailDatabase ==  $email) {
            return true;
        }
        else{
            return false;
        }
    }

    //Check if the password matches if the email provided
    function check_password($connection, $email, $password){
        $filter = ['userEmail' => $email];
        $options = [];
        $passwordDatabase = null;
        $user = null;
        
        $query = new \MongoDB\Driver\Query($filter, $options);
        $rows   = $connection->executeQuery('woodpecker.woodpecker', $query); 

        foreach ($rows as $document) {
            $user = json_encode($document);
            $document = json_decode(json_encode($document),true);
            $passwordDatabase =  $document['password'];
        }

        if($document['password'] == $password)
        {
            return $user;
        }
        else{
            return null;
        }
    }

    function get_user($connection, $email){
        $filter = ['userEmail' => $email];
        $options = [];
        $user = null;
        
        $query = new \MongoDB\Driver\Query($filter, $options);
        $rows   = $connection->executeQuery('woodpecker.woodpecker', $query); 

        foreach ($rows as $document) {
            $user = json_encode($document);
            $document = json_decode(json_encode($document),true);
        }
        return $user;
    }

    //Redirect Method
    function redirect($url) {
        ob_start();
        header('Location: '.$url);
        ob_end_flush();
        die();
    }
}
?>