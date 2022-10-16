<?php
include_once "../models/sms.php";

$subscriptionPlan = $_POST["subscriptionPlan"];
$disease = $_POST["disease"];
$message = $_POST["message"];

$sms = new Sms("+256754168759");
$recipients = $sms->fetchRecipients($disease, $subscriptionPlan);
$response = $sms->sendSMS($message, $recipients);

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
