
<?php
include_once "../models/db.php";
include_once "../models/sms.php";


$db = new DBConnector();
$pdo = $db->connectToDB();

if (
  $_POST["question1"] != "" ||
  $_POST["question2"] != "" ||
  $_POST["question3"] != "" ||
  $_POST["question4"] != "" ||
  $_POST["question5"] != "" ||
  $_POST["answer1"] != "" ||
  $_POST["answer2"] != "" ||
  $_POST["answer3"] != "" ||
  $_POST["answer4"] != "" ||
  $_POST["answer5"] != ""
) {
  try {
    //Questions
    $question1 = $_POST["question1"];

    $question2 = $_POST["question2"];

    $question3 = $_POST["question3"];

    $question4 = $_POST["question4"];

    $question5 = $_POST["question5"];

   //Answers
    $answer1 = $_POST["answer1"];

    $answer2 = $_POST["answer2"];

    $answer3 = $_POST["answer3"];

    $answer4 = $_POST["answer4"];

    $answer5 = $_POST["answer5"];

    // $stmt = $pdo->prepare(
    //   "INSERT INTO faqs(question, answer) VALUES (?,?)"
    // );
    $stmt = $pdo->prepare("UPDATE faqs SET question=?, answer=? WHERE fid=?");
    
    $stmt->execute([ $question1, $answer1, 1]);
    $stmt->execute([ $question2, $answer2, 2]);
    $stmt->execute([ $question3, $answer3, 3]);
    $stmt->execute([ $question4, $answer4, 4]);
    $stmt->execute([ $question5, $answer5, 5]);

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

echo $question1 . " " . $answer1;






?>
