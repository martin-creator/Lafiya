
<?php

include_once "../models/db.php";
include_once "../models/sms.php";



$disease1 =  $_POST["disease1"];

$disease2 =  $_POST["disease2"];

$disease3 =  $_POST["disease3"];

$disease4 =  $_POST["disease4"]; 

$disease5 =  $_POST["disease5"];


echo $disease1

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
