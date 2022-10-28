<?php

include_once "../models/db.php";
include_once "../models/sms.php";



$dailyPrice =  $_POST["dailyPrice"];

$weeklyPrice =  $_POST["weeklyPrice"];

$monthlyPrice =  $_POST["monthlyPrice"];





echo $dailyPrice . " " . $monthlyPrice . " ".$weeklyPrice

// $db = new DBConnector();
// $pdo = $db->connectToDB();

// $sms = new Sms($phoneNumber);

// $response = $sms->sendSMS($message, $phoneNumber);

// if ($response["status"] == "success") {
//   echo '<script type="text/JavaScript"> 
//     window.location.href="http:/Lafayi/views/form.html";
//      alert("Your message was delivered successfully");
//      </script>';
// } else {
//   echo '<script type="text/JavaScript"> 
//     window.location.href="http:/Lafayi/views/form.html";
//      alert("Your message delivery failed!");
//      </script>';
// }

?>