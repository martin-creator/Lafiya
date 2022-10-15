<?php

include_once "../models/menu.php";
include_once "../models/user.php";
include_once "../models/db.php";

$sessionId = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text = $_POST["text"];

$user = new User($phoneNumber);
$db = new DBConnector();
$pdo = $db->connectToDB();

$menu = new Menu();
$text = $menu->middleware($text, $user, $sessionId, $pdo);

if ($text == "" && $user->isUserRegistered($pdo)) {
  $menu->mainSubscribe($user, $pdo);
} elseif ($text == "" && !$user->isUserRegistered($pdo)) {
  $menu->mainUnSubscribed();
} elseif (!$user->isUserRegistered($pdo)) {
  $textArray = explode("*", $text);
  switch ($textArray[0]) {
    case 1:
      $menu->subscribeMenu($textArray, $phoneNumber, $pdo);
      break;
    default:
      "END Invalid choice. Please try again";
  }
} else {
  $textArray = explode("*", $text);
  switch ($textArray[0]) {
    case 1:
      $menu->subscriptionPlan(
        $textArray,
        $sessionId,
        $phoneNumber,
        $user,
        $pdo
      );
      break;
    case 2:
      $menu->viewFAQs($textArray, $user);
      break;
    case 3:
      $menu->unSubscribe($textArray, $user, $pdo);
      break;
    default:
      "END Invalid choice. Please try again";
  }
}

?>
