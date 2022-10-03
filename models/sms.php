<?php

    require 'vendor/autoload.php';
    use AfricasTalking\SDK\AfricasTalking;

    include_once './util.php';
    include_once './models/db.php';


class Sms{

protected $phone;
        protected $AT;

        function __construct($phone)
        {
            $this->phone = $phone;
            $this->AT = new AfricasTalking(Util::$API_USERNAME, Util::$API_KEY);
        }  
        public function getPhone(){
            return $this->phone;
        }

        public function sendSMS($message, $recipients){


            //get the sms service
            $sms = $this->AT->sms();
            //use the service 
            $result = $sms->send([
                'to'      => $recipients,
                'message' => $message,
                'from'    => Util::$COMPANY_NAME,
                //'keyword' => Util::$SMS_SHORTCODE_KEYWORD
            ]);
            return $result; 
         
        }
        public function fetchRecipients (){
            //Read all user phone numbers
            $db = new DBConnector();
            $pdo = $db->connectToDB();
            //prepare an sql query 
            $stmt = $pdo->prepare('select phone from user');
            $stmt->execute();
            $result = $stmt->fetchAll();
            //hopinf that there were records to simplify logic
            //result has an array of objects
            $recipients = array();
           foreach($result as $row);
        }
        

}
