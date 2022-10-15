<?php
session_start();

include_once "../models/db.php";

$db = new DBConnector();
$pdo = $db->connectToDB();

if (isset($_POST["register"])) {
  if (
    $_POST["firstname"] != "" || $_POST["username"] != "" || $_POST["password"] != "") {
    try {
      $username = $_POST["username"];
      $email = $_POST["email"];
    
      $password = $_POST["password"];
      $stmt = $pdo->prepare("INSERT INTO admins(username, email, password) VALUES (?,?,?)");
      $stmt->execute([$username, $email, $password]);

    } catch (PDOException $e) {

      echo $e->getMessage();
    }

   

    echo '<script type="text/JavaScript"> 
    window.location.href="http://localhost/Lafayi/views/form.php";
     alert("You have been succesfully registered!");
     </script>';

  } else {
    echo '<script type="text/JavaScript"> 
  window.location.href="http://localhost/Lafayi/views/registration.php";
   alert("Please fill in all the required fields!");
   </script>';

  }
}
?>
