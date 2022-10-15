<?php

require '../vendor/autoload.php';

use AfricasTalking\SDK\AfricasTalking;

include_once '../util.php';
include_once '../models/db.php';


class Sms
{

    protected $phone;
    protected $AT;

    function __construct($phone)
    {
        $this->phone = $phone;
        $this->AT = new AfricasTalking(Util::$API_USERNAME, Util::$API_KEY);
    }
    public function getPhone()
    {
        return $this->phone;
    }

    public function sendSMS($message, $recipients)
    {


       
        $sms = $this->AT->sms();
      
        $result = $sms->send([
            'to'      => $recipients,
            'message' => $message,
            'from'    => Util::$COMPANY_NAME,
            //'keyword' => Util::$SMS_SHORTCODE_KEYWORD
        ]);
        return $result;
    }
    public function fetchRecipients($disease, $subscriptionPlan)
    {
      
        $db = new DBConnector();
        $pdo = $db->connectToDB();
      
        $stmt = $pdo->prepare('SELECT phone FROM user INNER JOIN healthconditions ON user.uid = healthconditions.uid INNER JOIN subscriptionplans ON subscriptionplans.uid = healthconditions.uid WHERE healthcondition = ? AND planName = ?');
        $stmt->execute([$disease,$subscriptionPlan ]);
        $result = $stmt->fetchAll();
        
        $recipients = array();
        foreach ($result as $row) {
            array_push($recipients, $row['phone']);
        }
        return join(",", $recipients);
    }

    

}
?>