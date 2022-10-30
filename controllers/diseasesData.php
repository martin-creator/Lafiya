
<?php

include_once "../models/db.php";
include_once "../models/diseases.php";


$db = new DBConnector();
$pdo = $db->connectToDB();


if (
    $_POST["disease1"] != "" || $_POST["disease2"] != "" || $_POST["disease3"] != "" || $_POST["disease4"] != "" || $_POST["disease5"] != "") {
    try {

        $disease1 =  $_POST["disease1"];

        $disease2 =  $_POST["disease2"];
        
        $disease3 =  $_POST["disease3"];
        
        $disease4 =  $_POST["disease4"]; 
        
        $disease5 =  $_POST["disease5"];

       //$stmt = $pdo->prepare("INSERT INTO diseasename(disease) VALUES (?)");
      $stmt = $pdo->prepare("UPDATE diseasename SET disease=? WHERE hid=?");

      $stmt->execute([$disease1, 1]);
      $stmt->execute([$disease2, 2]);
      $stmt->execute([$disease3, 3]);
      $stmt->execute([$disease4, 4]);
      $stmt->execute([$disease5, 5]);
     

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
