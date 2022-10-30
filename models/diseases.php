<?php

class Diseases
{
  //Diseases
  protected $disease1; //"Diabetes"

  protected $disease2; // "Hypertension"

  protected $disease3; //"Depression"

  protected $disease4; // "Cancer"

  protected $disease5; //"Stroke"

  //setter and getter

  public function setDisease1($disease1)
  {
    $this->disease1 = $disease1;
  }

  public function getDisease1()
  {
    return $this->disease1;
  }

  public function setDisease2($disease2)
  {
    $this->disease2 = $disease2;
  }

  public function getDisease2()
  {
    return $this->disease2;
  }

  public function setDisease3($disease3)
  {
    $this->disease3 = $disease3;
  }

  public function getDisease3()
  {
    return $this->disease3;
  }

  public function setDisease4($disease4)
  {
    $this->disease4 = $disease4;
  }

  public function getDisease4()
  {
    return $this->disease4;
  }

  public function getDisease5()
  {
    return $this->disease5;
  }

  public function setDisease5($disease5)
  {
    $this->disease5 = $disease5;
  }

  public function readDisease1($pdo, $hid)
  {
    $stmt = $pdo->prepare("SELECT disease FROM diseasename WHERE hid=?");
    $stmt->execute([$hid]);
    $row = $stmt->fetch();
    $this->setDisease1($row["disease"]);
    return $row["disease"];
  }

  public function readDisease2($pdo, $hid)
  {
    $stmt = $pdo->prepare("SELECT disease FROM diseasename WHERE hid=?");
    $stmt->execute([$hid]);
    $row = $stmt->fetch();
    $this->setDisease2($row["disease"]);
    return $row["disease"];
  }

  public function readDisease3($pdo, $hid)
  {
    $stmt = $pdo->prepare("SELECT disease FROM diseasename WHERE hid=?");
    $stmt->execute([$hid]);
    $row = $stmt->fetch();
    $this->setDisease3($row["disease"]);
    return $row["disease"];
  }

  public function readDisease4($pdo, $hid)
  {
    $stmt = $pdo->prepare("SELECT disease FROM diseasename WHERE hid=?");
    $stmt->execute([$hid]);
    $row = $stmt->fetch();
    $this->setDisease4($row["disease"]);
    return $row["disease"];
  }

  public function readDisease5($pdo, $hid)
  {
    $stmt = $pdo->prepare("SELECT disease FROM diseasename WHERE hid=?");
    $stmt->execute([$hid]);
    $row = $stmt->fetch();
    $this->setDisease5($row["disease"]);
    return $row["disease"];
  }
}

?>
