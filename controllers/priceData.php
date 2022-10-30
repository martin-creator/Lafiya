<?php

include_once "../models/db.php";
include_once "../models/sms.php";




$db = new DBConnector();
$pdo = $db->connectToDB();


if (
    $_POST["dailyPrice"] != "" || $_POST["weeklyPrice"] != "" ||  $_POST["monthlyPrice"] != "") {
    try {

        $dailyPrice =  $_POST["dailyPrice"];
        $weeklyPrice =  $_POST["weeklyPrice"];
        $monthlyPrice =  $_POST["monthlyPrice"];


      //$stmt = $pdo->prepare("INSERT INTO subprices (planName, price) VALUES (?,?)");
      $stmt = $pdo->prepare("UPDATE subprices SET price=? WHERE sid=?");
     
      $stmt->execute([$dailyPrice, 1]);
      $stmt->execute([$weeklyPrice, 2]);
      $stmt->execute([$monthlyPrice, 3]);

    } catch (PDOException $e) {

      echo $e->getMessage();
    }

   

    echo '<script type="text/JavaScript"> 
    window.location.href="http://localhost/Lafayi/views/form.php";
     alert("You have been succesfully saved your changes!");
     </script>';

  } else {
    echo '<script type="text/JavaScript"> 
  window.location.href="http://localhost/Lafayi/views/registration.php";
   alert(" We could not save your chnages. Please try again!");
   </script>';

  }




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