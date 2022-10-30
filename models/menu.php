<?php

include_once '../util.php';
include_once '../models/user.php';
include_once '../models/healthconditions.php';
include_once '../models/subscriptionplan.php';
include_once '../models/faq.php';
include_once '../models/sms.php';
include_once '../models/diseases.php';
include_once '../models/faq.php';
include_once '../models/subscription_prices.php';

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
    $disease = new Diseases();

    if ($level == 1) {
      echo " CON Please enter your full name";
    } elseif ($level == 2) {
      echo " CON Please provide your age";
    } elseif ($level == 3) {
      $response = "CON  Please select your health condition\n";

      $response .= "1. ". $disease->readDisease1($pdo, 1) ."\n";

      $response .= "2. ". $disease->readDisease2($pdo, 2) ."\n";

      $response .= "3. " . $disease->readDisease3($pdo, 3) ."\n";

      $response .= "4. ". $disease->readDisease4($pdo, 4) ."\n";

      $response .= "5. ". $disease->readDisease5($pdo, 5) ."\n";

      echo $response;
      
    } elseif ($level == 4 && $textArray[3] == 1) {
      $name = $textArray[1];
      $age = $textArray[2];
      $healthcondition = "Diabetes";
      $user = new User($phoneNumber);
      $user->setUserHealthCondition($name, $age,$pdo, $healthcondition);
      $disease->readDisease1($pdo, 1) ;

      $response = "CON You have been successfully registered. You  have choosen the topic on ". $disease->getDisease1(). "\n";

      $response .= Util::$GO_TO_MAIN_MENU . " " . "Main Menu\n";

      echo $response;
    } elseif ($level == 4 && $textArray[3] == 2) {
      $name = $textArray[1];
      $age = $textArray[2];
      $healthcondition = "Hypertension";
      $user = new User($phoneNumber);
      $user->setUserHealthCondition($name, $age,$pdo, $healthcondition);
      $disease->readDisease2($pdo, 2) ;

      $response = "CON You have been successfully registered. You  have choosen the topic on ". $disease->getDisease2(). "\n";

      $response .= Util::$GO_TO_MAIN_MENU . " " . "Main Menu\n";

      echo $response;
    } elseif ($level == 4 && $textArray[3] == 3) {
      $name = $textArray[1];
      $age = $textArray[2];
      $healthcondition = "Depression";
      $user = new User($phoneNumber);
      $user->setUserHealthCondition($name, $age,$pdo, $healthcondition);
      $disease->readDisease3($pdo, 3); 
      $response = "CON You have been successfully registered. You  have choosen the topic on ". $disease->getDisease3() ."\n";

      $response .= Util::$GO_TO_MAIN_MENU . " " . "Main Menu\n";

      echo $response;
    } elseif ($level == 4 && $textArray[3] == 4) {
      $name = $textArray[1];
      $age = $textArray[2];
      $healthcondition = "Cancer";
      $user = new User($phoneNumber);
      $user->setUserHealthCondition($name, $age,$pdo, $healthcondition);
      $disease->readDisease4($pdo, 4); 

      $response = "CON You have been successfully registered. You  have choosen the topic on". $disease->getDisease4() ."\n";

      $response .= Util::$GO_TO_MAIN_MENU . " " . "Main Menu\n";

      echo $response;
    } elseif ($level == 4 && $textArray[3] == 5) {
      $name = $textArray[1];
      $age = $textArray[2];
      $healthcondition = "Stroke";
      $user = new User($phoneNumber);
      $user->setUserHealthCondition($name, $age,$pdo, $healthcondition);
      $disease->readDisease5($pdo, 5) ;
      
      $response = "CON You have been successfully registered. You  have choosen the topic on ". $disease->getDisease5() ."\n";

      $response .= Util::$GO_TO_MAIN_MENU . " " . "Main Menu\n";

      echo $response;
    } else {
      
      echo "CON Invalid Menu\n";
    }
  }

  public function subscriptionPlan($textArray, $sessionId, $phoneNumber, $user, $pdo)
  {
    $level = count($textArray);
    $price = new Price();

    if ($level == 1) {
      $response = "CON  Please select your Subscription Plan\n";

      $response .= "1. Daily ". $price->readPrice($pdo, 1)."\n";

      $response .= "2. Weekly ". $price->readPrice($pdo, 2)."\n";

      $response .= "3. Monthly ". $price->readPrice($pdo, 3)."\n";

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

  public function viewFAQs($textArray, $user, $pdo)
  {
    $level = count($textArray);
    $faq = new FAQ();

    if ($level == 1) {
      $response = "CON  Please select your question\n";

      $response .= "1. ". $faq->readQuestion($pdo, 1) ."\n";

      $response .= "2. ". $faq->readQuestion($pdo, 2)."\n";

      $response .= "3. ".$faq->readQuestion($pdo, 3)."\n";

      $response .= "4. ".$faq->readQuestion($pdo, 4)."\n";

      $response .= "5. ".$faq->readQuestion($pdo, 5)."\n";

      $response .= Util::$GO_TO_MAIN_MENU . " " . "Main Menu\n";

      echo $response;
    } elseif ($level == 2 && $textArray[1] == 1) {
      $response = "CON You will receive the answer to your question via SMS shortly\n";
      $msg =  $faq->readAnswer($pdo, 1);
      $sms = new Sms($user->getPhone());
                $result = $sms->sendSMS($msg, $user->getPhone());
      $response .=  Util::$GO_BACK . " " . "GO BACK \n";
      echo $response;

    } elseif ($level == 2 && $textArray[1] == 2) {
      $response = "CON You will receive the answer to your question via SMS shortly\n";
      $msg =  $faq->readAnswer($pdo, 2);
      $sms = new Sms($user->getPhone());
                $result = $sms->sendSMS($msg, $user->getPhone());
      $response .= Util::$GO_BACK . " " . "GO BACK \n";
      echo $response;
    } elseif ($level == 2 && $textArray[1] == 3) {
      $response = "CON You will receive the answer to your question via SMS shortly\n";
      $msg =  $faq->readAnswer($pdo, 3);
      $sms = new Sms($user->getPhone());
                $result = $sms->sendSMS($msg, $user->getPhone());
      $response .= Util::$GO_BACK . " " . "GO BACK \n";
      echo $response;

    } elseif ($level == 2 && $textArray[1] == 4) {
      $response = "CON You will receive the answer to your question via SMS shortly\n";
      $msg =  $faq->readAnswer($pdo, 4);
      $sms = new Sms($user->getPhone());
                $result = $sms->sendSMS($msg, $user->getPhone());
      $response .= Util::$GO_BACK . " " . "GO BACK \n";
      echo $response;

    } elseif ($level == 2 && $textArray[1] == 5) {
      $response = "CON You will receive the answer to your question via SMS shortly\n";
      $msg =  $faq->readAnswer($pdo, 5);
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
      $response = "CON Thank you for using our Service\n";

      $response .= "1. Unsubscribe";

      echo $response;
    } elseif ($level == 2 && $textArray[1] == 1) {
     
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
    
    $explodedText = explode("*", $text);
    while (array_search(Util::$GO_BACK, $explodedText) != false) {
      $firstIndex = array_search(Util::$GO_BACK, $explodedText);
      array_splice($explodedText, $firstIndex - 1, 2);
    }
    return join("*", $explodedText);
  }

  public function goToMainMenu($text)
  {
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
