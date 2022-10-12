<?php
include_once 'sms.php';



$subscriptionPlan = $_POST['subscriptionPlan'];
$age = $_POST['age'];
$disease = $_POST['disease'];
$message = $_POST['message'];

echo $disease;

$sms = new Sms('+3444444'); 
$recipients =  $sms->fetchRecipients($disease, $subscriptionPlan);
$response = $sms->sendSMS($message, $recipients);
echo json_encode($response);


//$db = new DBConnector();
//$pdo = $db->connectToDB();

// $sms = new Sms('+3444444');
// $recipients =  $sms->fetchRecipients($disease);
// echo json_encode($recipients);
//$response = $sms->sendSMS($message, $recipients);
//echo json_encode($response);


// $sms = new Sms($phoneNumber);

// $sms->sendSMS($message, $phoneNumber);

    //echo json_encode($sms->subscribeUserWithToken($shortcode,$keyword,$phoneNumber));
