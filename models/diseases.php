<?php

class Diseases
{
  //Diseases
  static $disease1; //"Diabetes"

  static $disease2; // "Hypertension"

  static $disease3; //"Depression"

  static $disease4; // "Cancer"

  static $disease5; //"Stroke"

  //setter and getter

  public function getDisease1()
  {
    return $this->disease1;
  }

  public function setDisease1($disease1)
  {
    $this->disease1 = $disease1;
  }

  public function getDisease2()
  {
    return $this->disease2;
  }

  public function setDisease2($disease2)
  {
    $this->disease2 = $disease2;
  }

  public function getDisease3()
  {
    return $this->disease3;
  }

  public function setDisease3($disease3)
  {
    $this->disease3 = $disease3;
  }

  public function getDisease4()
  {
    return $this->disease4;
  }

  public function setDisease4($disease4)
  {
    $this->disease4 = $disease4;
  }

  public function getDisease5()
  {
    return $this->disease5;
  }

  public function setDisease5($disease5)
  {
    $this->disease5 = $disease5;
  }

  public function readDisease1($pdo)
  {
    $stmt = $pdo->prepare("SELECT disease1 FROM diseasename WHERE hid=?");
    $stmt->execute([1]);
    $row = $stmt->fetch();
    return $row["disease1"];
  }

  public function readDisease2($pdo)
  {
    $stmt = $pdo->prepare("SELECT disease2 FROM diseasename WHERE hid=?");
    $stmt->execute([2]);
    $row = $stmt->fetch();
    return $row["disease2"];
  }

  public function readDisease3($pdo)
  {
    $stmt = $pdo->prepare("SELECT disease3 FROM diseasename WHERE hid=?");
    $stmt->execute([3]);
    $row = $stmt->fetch();
    return $row["disease3"];
  }


  public function readDisease4($pdo)
  {
    $stmt = $pdo->prepare("SELECT disease4 FROM diseasename WHERE hid=?");
    $stmt->execute([4]);
    $row = $stmt->fetch();
    return $row["disease4"];
  }

  public function readDisease5($pdo)
  {
    $stmt = $pdo->prepare("SELECT disease5 FROM diseasename WHERE hid=?");
    $stmt->execute([5]);
    $row = $stmt->fetch();
    return $row["disease5"];
  }

}



?>
