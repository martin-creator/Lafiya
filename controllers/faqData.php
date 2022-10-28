
<?php

include_once "../models/db.php";
include_once "../models/sms.php";



$question1 =  $_POST["question1"];

$question2 =  $_POST["question2"];

$question3 =  $_POST["question3"];

$question4 =  $_POST["question4"]; 

$question5 =  $_POST["question5"];


$answer1 =  $_POST["answer1"];

$answer2 =  $_POST["answer2"];

$answer3 =  $_POST["answer3"];

$answer4 =  $_POST["answer4"]; 

$answer5 =  $_POST["answer5"];


echo $question1 . " " . $answer1

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
