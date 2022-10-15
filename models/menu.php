<?php

include_once '../util.php';
include_once '../models/user.php';
include_once '../models/healthconditions.php';
include_once '../models/subscriptionplan.php';
include_once '../models/faq.php';
include_once '../models/sms.php';

class Menu
{
  protected $text;

  protected $sessionId;

  function __construct()
  {
  }

  public function mainSubscribe($user,$pdo)
  {
    $response = "CON Welcome ".$user->readUserName($pdo)." Reply with \n";

    $response .= "1. Subscription plan\n";

    $response .= "2. FAQS\n";

    $response .= "3. Unsubscribe\n";

    echo $response;
  }

  public function mainUnSubscribed()
  {
    $response =
      "CON Welcome! Your health matters to us hence we are here to help you live a healthy life. Please register and select the health conditions you're interested in and you will receive SMS based on that. Reply with \n";

    $response .= "1. Subscribe\n";

    echo $response;
  }

  public function subscribeMenu($textArray, $phoneNumber, $pdo)
  {
    $level = count($textArray); // This counts number of items in array


    if ($level == 1) {
      echo " CON Please enter your full name";
    } elseif ($level == 2) {
      echo " CON Please provide your age";
    } elseif ($level == 3) {
      $response = "CON  Please select your health condition\n";

      $response .= "1. Diabetes\n";

      $response .= "2. Hypertension\n";

      $response .= "3. Depression\n";

      $response .= "4. Cancer\n";

      $response .= "5. Stroke\n";

      echo $response;
    } elseif ($level == 4 && $textArray[3] == 1) {
      $name = $textArray[1];
      $age = $textArray[2];
      $healthcondition = "Diabetes";
      $user = new User($phoneNumber);
      $user->setUserHealthCondition($name, $age,$pdo, $healthcondition);

      $response = "CON You  have choosen the topic on diabetes \n";

      $response .= Util::$GO_TO_MAIN_MENU . " " . "Main Menu\n";

      echo $response;
    } elseif ($level == 4 && $textArray[3] == 2) {
      $name = $textArray[1];
      $age = $textArray[2];
      $healthcondition = "Hypertension";
      $user = new User($phoneNumber);
      $user->setUserHealthCondition($name, $age,$pdo, $healthcondition);

      $response = "CON You  have choosen the topic on hypertension\n";

      $response .= Util::$GO_TO_MAIN_MENU . " " . "Main Menu\n";

      echo $response;
    } elseif ($level == 4 && $textArray[3] == 3) {
      $name = $textArray[1];
      $age = $textArray[2];
      $healthcondition = "Depression";
      $user = new User($phoneNumber);
      $user->setUserHealthCondition($name, $age,$pdo, $healthcondition);
      $response = "CON You  have choosen the topic on depression\n";

      $response .= Util::$GO_TO_MAIN_MENU . " " . "Main Menu\n";

      echo $response;
    } elseif ($level == 4 && $textArray[3] == 4) {
      $name = $textArray[1];
      $age = $textArray[2];
      $healthcondition = "Cancer";
      $user = new User($phoneNumber);
      $user->setUserHealthCondition($name, $age,$pdo, $healthcondition);

      $response = "CON You  have choosen the topic on cancer\n";

      $response .= Util::$GO_TO_MAIN_MENU . " " . "Main Menu\n";

      echo $response;
    } elseif ($level == 4 && $textArray[3] == 5) {
      $name = $textArray[1];
      $age = $textArray[2];
      $healthcondition = "Stroke";
      $user = new User($phoneNumber);
      $user->setUserHealthCondition($name, $age,$pdo, $healthcondition);
      
      $response = "CON You  have choosen the topic on stroke\n";

      $response .= Util::$GO_TO_MAIN_MENU . " " . "Main Menu\n";

      echo $response;
    } else {
      
      echo "CON Invalid Menu\n";
    }
  }

  public function subscriptionPlan($textArray, $sessionId, $phoneNumber, $user, $pdo)
  {
    $level = count($textArray);

    if ($level == 1) {
      $response = "CON  Please select your Subscription Plan\n";

      $response .= "1. Daily (10)\n";

      $response .= "2. Weekly (15)\n";

      $response .= "3. Monthly(30)\n";

      echo $response;
    } elseif ($level == 2 && $textArray[1] == 1) {
      $subscription = new SubscriptionPlan("Daily", 10, "subscribed");
      $subscription->setSubcription($subscription->getPlan(), $subscription->getPrice(), $subscription->getStatus(), $user->readUserId($pdo), $pdo);
      $msg = "You have subscribed to the daily plan at $".$subscription->getPrice(). "  Thank you for using this service";
      $sms = new Sms($user->getPhone());
                $result = $sms->sendSMS($msg, $user->getPhone());

      $response = "CON  You will receive a confirmation message shortly \n";

      $response .= Util::$GO_TO_MAIN_MENU . " " . "Main Menu\n";

      echo $response;
    } elseif ($level == 2 && $textArray[1] == 2) {
      $subscription = new SubscriptionPlan("Weekly", 15, "subscribed");
      $subscription->setSubcription($subscription->getPlan(), $subscription->getPrice(), $subscription->getStatus(), $user->readUserId($pdo), $pdo);
      $msg = "You have subscribed to the weekly plan at $".$subscription->getPrice(). "  Thank you for using this service";
      $sms = new Sms($user->getPhone());
                $result = $sms->sendSMS($msg, $user->getPhone());

      $response = "CON  You will receive a confirmation message shortly \n";

      $response .= Util::$GO_TO_MAIN_MENU . " " . "Main Menu\n";

      echo $response;
    } elseif ($level == 2 && $textArray[1] == 3) {
      $subscription = new SubscriptionPlan("Monthly", 30, "subscribed");
      $subscription->setSubcription($subscription->getPlan(), $subscription->getPrice(), $subscription->getStatus(), $user->readUserId($pdo), $pdo);
      $msg = "You have subscribed to the monthly plan at $".$subscription->getPrice(). "  Thank you for using this service";
      $sms = new Sms($user->getPhone());
                $result = $sms->sendSMS($msg, $user->getPhone());

      $response = "CON You will receive a confirmation message shortly\n";


      $response .= Util::$GO_TO_MAIN_MENU . " " . "Main Menu\n";

      echo $response;
    } else {
      $ussdLevel = count($textArray) - 1;
      $this->persistInvalidEntry($sessionId, $user, $ussdLevel, $pdo);
      echo "CON Invalid Menu\n". $this->subscriptionPlan($textArray, $sessionId, $phoneNumber, $user, $pdo);
    }
  }

  public function viewFAQs($textArray, $user)
  {
    $level = count($textArray);

    if ($level == 1) {
      $response = "CON  Please select your question\n";

      $response .= "1. Foods with low Cholesterol levels \n";

      $response .= "2. Is cancer a communicable disease? \n";

      $response .= "3. What is depression? how is it different from stress?\n";

      $response .= "4. What are the early stages of hypertension?\n";

      $response .= "5. What are the causes of heart attack\n";

      $response .= Util::$GO_TO_MAIN_MENU . " " . "Main Menu\n";

      echo $response;
    } elseif ($level == 2 && $textArray[1] == 1) {
      $response = "CON You will receive the answer to your question via SMS shortly\n";
      $msg =  FAQ::$Question1;
      $sms = new Sms($user->getPhone());
                $result = $sms->sendSMS($msg, $user->getPhone());
      $response .=  Util::$GO_BACK . " " . "GO BACK \n";
      echo $response;
    } elseif ($level == 2 && $textArray[1] == 2) {
      $response = "CON You will receive the answer to your question via SMS shortly\n";
      $msg =  FAQ::$Question2;
      $sms = new Sms($user->getPhone());
                $result = $sms->sendSMS($msg, $user->getPhone());
      $response .= Util::$GO_BACK . " " . "GO BACK \n";
      echo $response;
    } elseif ($level == 2 && $textArray[1] == 3) {
      $response = "CON You will receive the answer to your question via SMS shortly\n";
      $msg =  FAQ::$Question3;
      $sms = new Sms($user->getPhone());
                $result = $sms->sendSMS($msg, $user->getPhone());
      $response .= Util::$GO_BACK . " " . "GO BACK \n";
      echo $response;
    } elseif ($level == 2 && $textArray[1] == 4) {
      $response = "CON You will receive the answer to your question via SMS shortly\n";
      $msg =  FAQ::$Question4;
      $sms = new Sms($user->getPhone());
                $result = $sms->sendSMS($msg, $user->getPhone());
      $response .= Util::$GO_BACK . " " . "GO BACK \n";
      echo $response;
    } elseif ($level == 2 && $textArray[1] == 5) {
      $response = "CON You will receive the answer to your question via SMS shortly\n";
      $msg =  FAQ::$Question5;
      $sms = new Sms($user->getPhone());
                $result = $sms->sendSMS($msg, $user->getPhone());
      $response .= Util::$GO_BACK . " " . "GO BACK \n";
      echo $response;
    } else {
      echo "End Invalid Menu";
    }
  }

  public function unSubscribe($textArray, $user, $pdo)
  {
    $level = count($textArray);

    if ($level == 1) {
      $response = "CON Thannk you for using our Service\n";

      $response .= "1. Unsubscribe";

      echo $response;
    } elseif ($level == 2 && $textArray[1] == 1) {
      //replace with subscriprion status
      $user->unSubscribeUser("unsubscribed", $pdo);
      echo "END You have successfully unsubscribed from our service. You will still access the menu but you will not receive any messages from Us!";
    } else {
      echo "END Invalid entry";
    }
  }

  public function middleware($text, $user, $sessionId, $pdo)
  {
    //remove entries for going back and going to the main menu
    return $this->invalidEntry($this->goBack($this->goToMainMenu($text)), $user, $sessionId, $pdo);
  }

  public function goBack($text)
  {
    //1*4*5*1*98*2*1234
    $explodedText = explode("*", $text);
    while (array_search(Util::$GO_BACK, $explodedText) != false) {
      $firstIndex = array_search(Util::$GO_BACK, $explodedText);
      array_splice($explodedText, $firstIndex - 1, 2);
    }
    return join("*", $explodedText);
  }

  public function goToMainMenu($text)
  {
    //1*4*5*1*99*2*1234*99
    $explodedText = explode("*", $text);
    while (array_search(Util::$GO_TO_MAIN_MENU, $explodedText) != false) {
      $firstIndex = array_search(Util::$GO_TO_MAIN_MENU, $explodedText);
      $explodedText = array_slice($explodedText, $firstIndex + 1);
    }
    return join("*", $explodedText);
  }


  public function persistInvalidEntry($sessionId, $user, $ussdLevel, $pdo)
  {
    $stmt = $pdo->prepare("insert into ussdsession (sessionId,ussdLevel, uid) values (?,?,?)");
    $stmt->execute([$sessionId, $ussdLevel, $user->readUserId($pdo)]);
    $stmt = null;
  }

  public function invalidEntry($ussdStr, $user, $sessionId, $pdo)
  {
    $stmt = $pdo->prepare("select ussdLevel from ussdsession where sessionId=?");
    $stmt->execute([$sessionId]);
    $result = $stmt->fetchAll();

    if (count($result) == 0) {
      return $ussdStr;
    }

    $strArray = explode("*", $ussdStr);

    foreach ($result as $value) {
      unset($strArray[$value['ussdLevel']]);
    }

    $strArray = array_values($strArray);

    return join("*", $strArray);
  }
}
