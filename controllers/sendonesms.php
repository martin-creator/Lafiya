<?php
include_once "../models/db.php";
include_once "../models/sms.php";

$phoneNumber = $_POST["phoneNumber"];
$message = $_POST["message"];

print $message;

$db = new DBConnector();
$pdo = $db->connectToDB();

$sms = new Sms($phoneNumber);



//echo json_encode($sms->sendSMS($message, $phoneNumber));
echo <script> alert($sms->sendSMS($message, $phoneNumber))</script>;


?>
