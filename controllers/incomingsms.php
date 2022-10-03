<?php
       include_once './models/db.php';
       include_once './util.php';
       include_once './models/user.php';
       
       //receive data from the gateway 
       $phoneNumber = $_POST['from'];
       $text = $_POST['text']; //name pin; John 1234

       $user = new User($phoneNumber);
       $db = new DBConnector();
       $pdo = $db->connectToDB();

       $text = explode(" ", $text);
       $user->setName($text[0]);

       $user->register($pdo);

      
?>