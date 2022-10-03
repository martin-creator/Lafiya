<?php 

class HealthCondition {

protected $healthcondition;

        function __construct($healthcondition)
        {
            $this->healthcondition = $healthcondition;

        }

        public function getHealthCondition(){
            return $this->healthcondition;
        }


        public function setHealthCondition($healthcondition, $uid ,$pdo){

            try{
            $stmt = $pdo->prepare("INSERT INTO healthconditions (healthcondition, uid) values(?, ?)");
            $stmt->execute([$this->getHealthCondition(), $uid]);

            }catch(PDOException $e){
                echo $e->getMessage();
            }
            
        }

}

?>