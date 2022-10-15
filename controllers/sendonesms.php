<?php

include_once "../models/db.php";
include_once "../models/sms.php";

$phoneNumber = $_POST["phoneNumber"];
$message = $_POST["message"];

$db = new DBConnector();
$pdo = $db->connectToDB();

$sms = new Sms($phoneNumber);

$response = $sms->sendSMS($message, $phoneNumber);

if ($response["status"] == "success") {
  echo '<script type="text/JavaScript"> 
    window.location.href="https://bfeb-154-225-250-117.in.ngrok.io/Lafayi/views/form.html";
     alert("Your message was delivered successfully");
     </script>';
} else {
  echo '<script type="text/JavaScript"> 
    window.location.href="https://bfeb-154-225-250-117.in.ngrok.io/Lafayi/views/form.html";
     alert("Your message delivery failed!");
     </script>';
}

?>
