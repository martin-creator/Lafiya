<?php
include_once '../../models/db.php';

$db = new DBConnector();
$pdo = $db->connectToDB();

$stmt1 = $pdo->prepare("select substatus , count(substatus) as freq from subscriptionplans WHERE  substatus = 'subscribed'");
$stmt2 = $pdo->prepare("select substatus , count(substatus) as freq from subscriptionplans WHERE  substatus = 'unsubscribe'");

$stmt1->execute();
$stmt2->execute();

$result1 = $stmt1->fetchAll();
$result2 = $stmt2->fetchAll();


//loop through the returned data
$data1 = array();
foreach ($result1 as $row) {
  $data1[] = $row;
}

$data2 = array();
foreach ($result2 as $row) {
  $data2[] = $row;
}



$finalData = array_merge($data1, $data2);

$db->closeDB();

print json_encode($finalData);


?>