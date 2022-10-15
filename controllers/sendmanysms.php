<?php
include_once "../models/sms.php";

$subscriptionPlan = $_POST["subscriptionPlan"];
$age = $_POST["age"];
$disease = $_POST["disease"];
$message = $_POST["message"];


$sms = new Sms("+256754168759");
$recipients = $sms->fetchRecipients($disease, $subscriptionPlan);
$response = $sms->sendSMS($message, $recipients);
echo json_encode($response);

?>
