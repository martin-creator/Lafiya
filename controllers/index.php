<?php

include_once './models/menu.php';
include_once './models/user.php';
include_once './models/db.php';


$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];


$user = new User($phoneNumber); //$isRegistered = true;
$db = new DBConnector();
$pdo = $db->connectToDB();

$menu = new Menu();
$text = $menu->middleware($text, $user, $sessionId, $pdo);


if ($text == "" && $user->isUserRegistered($pdo)) {
    // user is subscribed. Note how we start the response with CON
    $menu->mainSubscribe($user,$pdo);
}else if( $text == "" &&  !$user->isUserRegistered($pdo)){
  // user has not subscribed and string is empty
  $menu->mainUnSubscribed();   
}else if( !$user->isUserRegistered($pdo)){
// user has not subscribed and string is not empty
    $textArray = explode("*", $text);
    switch($textArray[0]){
        case 1:
            $menu->subscribeMenu($textArray, $phoneNumber, $pdo);
            break;
        default:
            "END Invalid choice. Please try again";
    }
}else{
// user is subscribed and string is not empty
    $textArray = explode("*", $text);
    switch($textArray[0]){
        case 1:
            $menu->subscriptionPlan($textArray, $sessionId, $phoneNumber, $user, $pdo);
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