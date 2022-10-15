<?php
session_start();

include_once "../models/db.php";

$db = new DBConnector();
$pdo = $db->connectToDB();

if (isset($_POST["login"])) {
  if ($_POST["username"] != "" || $_POST["password"] != "") {
    $username = $_POST["username"];
    
    $password = $_POST["password"];
    $query = $pdo->prepare(
      "SELECT * FROM admins WHERE username=? AND password=?"
    );
    $query->execute([$username, $password]);
    $row = $query->rowCount();
    $fetch = $query->fetch();
    if ($row > 0) {
      $_SESSION["user"] = $fetch["id"];
      header("location: http://localhost/Lafayi/views/form.php");
    } else {
      echo '<script type="text/JavaScript"> 
        window.location.href="http://localhost/Lafayi/views/index.php";
        alert("Invalid username or password");
            </script>';
    }
  } else {
        echo '<script type="text/JavaScript"> 
        window.location.href="http://localhost/Lafayi/views/index.php";
        alert("Please complete the required field!");
            </script>';
  }
}

?>
