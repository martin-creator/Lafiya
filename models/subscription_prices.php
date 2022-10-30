<?php 

class Diseases{

    //Prices
    static $dailyPrice;

    static $weeklyPrice;

    static $monthlyPrice;


    //setter and getter

    
    public function getDailyPrice()
    {
      return $this->dailyPrice;
    }
  
    public function setDailyPrice($dailyPrice)
    {
      $this->dailyPrice = $dailyPrice;
    }

    public function getWeeklyPrice()
    {
      return $this->weeklyPrice;
    }
  
    public function setWeeklyPrice($weeklyPrice)
    {
      $this->weeklyPrice = $weeklyPrice;
    }

    public function getMonthlyPrice()
    {
      return $this->monthlyPrice;
    }
  
    public function setMonthlyPrice($monthlyPrice)
    {
      $this->monthlyPrice = $monthlyPrice;
    }

    public function readPrice($pdo, $sid)
  {
    $stmt = $pdo->prepare("SELECT price FROM subprices WHERE sid=?");
    $stmt->execute([$sid]);
    $row = $stmt->fetch();
    return $row["price"];
  }

}




?>