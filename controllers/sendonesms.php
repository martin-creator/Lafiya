<?php
    include_once 'db.php';
    include_once 'sms.php';

   
    $phoneNumber = $_POST['phoneNumber'];
    $message = $_POST['message'];

    //print($message);

   //echo $phoneNumber;

    
   

     $db = new DBConnector();
     $pdo = $db->connectToDB();

    $sms = new Sms($phoneNumber);

    echo json_encode( $sms->sendSMS($message, $phoneNumber));

    

?>