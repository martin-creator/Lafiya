<?php 

class SubscriptionPlan {

protected $planName;
protected $price;
protected $substatus;

        function __construct($planName, $price, $substatus)
        {
            $this->planName = $planName;
            $this->price = $price;
            $this->substatus = $substatus;

        }


        public function getPlan(){
            return $this->planName;
        }

        public function getPrice(){
            return $this->price;
        }

        public function getStatus(){
            return $this->substatus;
        }


        public function setSubcription($planName, $price, $substatus, $uid ,$pdo){

            try{
            $stmt = $pdo->prepare("INSERT INTO subscriptionplans (planName,price,substatus,uid) values(?, ?, ?, ?)");
            $stmt->execute([$this->getPlan(),$this->getPrice(), $this->getStatus(), $uid]);

            }catch(PDOException $e){
                echo $e->getMessage();
            }
            
        }



}

?>