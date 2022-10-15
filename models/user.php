<?php

include_once '../models/healthconditions.php';

class User
{
  protected $name;
  protected $age;
  protected $phone;
  protected $substatus=0;

  function __construct($phone)
  {
    $this->phone = $phone;
  }

  //setter and getters
  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setAge($age)
  {
    $this->age = $age;
  }

  public function getAge()
  {
    return $this->age;
  }

  public function setPhone($phone)
  {
    $this->phone = $phone;
  }

  public function getPhone()
  {
    return $this->phone;
  }


  public function register($pdo)
  {
    try {
      
      $stmt = $pdo->prepare(
        "INSERT INTO user (name, age, phone) values(?,?,?)"
      );
      
      $stmt->execute([
        $this->getName(),
        $this->getAge(),
        $this->getPhone(),
      ]);
      echo "You have been successfully  been registered \n";
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  public function isUserRegistered($pdo)
  {
    $stmt = $pdo->prepare("SELECT * FROM user WHERE phone=?");
    $stmt->execute([$this->getPhone()]);
    if (count($stmt->fetchAll()) > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function readUserName($pdo)
  {
    $stmt = $pdo->prepare("SELECT * FROM user WHERE phone=?");
    $stmt->execute([$this->getPhone()]);
    $row = $stmt->fetch();
    return $row["name"];
  }

  public function readUserId($pdo)
  {
    $stmt = $pdo->prepare("SELECT uid  FROM user WHERE phone=?");
    $stmt->execute([$this->getPhone()]);
    $row = $stmt->fetch(); 
    return $row["uid"] ?? "default value";
  }


  public function unSubscribeUser($substatus,$pdo){

    try{
    $stmt = $pdo->prepare("UPDATE subscriptionplans SET substatus=? WHERE  uid=? ");
    $stmt->execute([$substatus, $this->readUserId($pdo)]);

    }catch(PDOException $e){
        echo $e->getMessage();
    }
  
}

public function setUserHealthCondition($name, $age,$pdo, $healthcondition){
      
  $this->setName($name);
  $this->setAge($age);
  $this->register($pdo);
  
  $healthcondition = new HealthCondition($healthcondition);
  $healthcondition->setHealthCondition(
    $healthcondition->getHealthCondition(),
    $this->readUserId($pdo),
    $pdo
  );

}
 
}



?>
