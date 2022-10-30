<?php

class FAQ
{
  //Questions
  static $Question1 = "Foods with low Cholesterol levels";

  static $Question2 = "Is cancer a communicable disease?";

  static $Question3 = "What is depression? how is it different from stress?";

  static $Question4 = "What are the early stages of hypertension?";

  static $Question5 = "What are the causes of heart attack?";

  //Answers
  static $Answer2 = "No, Cancer is not a communicable disease. Cancer is a genetic disease—that is, it is caused by changes to genes that control the way our cells function, especially how they grow and divide. Thank you! \n";

  static $Answer3 = "Depression (major depressive disorder) is a common and serious medical illness that negatively affects how you feel, the way you think and how you act. Depression is more serious and long-lasting than stress Thank you! \n";

  static $Answer4 = "Early signs of hypertension may include; early morning headaches, nosebleeds, irregular heart rhythms, vision changes, and buzzing in the ears. Severe hypertension can cause fatigue, nausea, vomiting, confusion, anxiety, chest pain, and muscle tremors. Thank you! \n";

  static $Answer5 = "High blood pressure, high blood cholesterol, and smoking are key risk factors for heart disease. Several other medical conditions and lifestyle choices can also put people at a higher risk for heart disease, including: Diabetes. Overweight and obesity. Thank you! \n";

  static $Answer1 = "Oats, beans, fatty fish. Thank you \n";

  //Question Setter and Getters

  public function getQuestion1()
  {
    return $this->Question1;
  }

  public function setQuestion1($Question1)
  {
    $this->Question1 = $Question1;
  }

  public function getQuestion2()
  {
    return $this->Question2;
  }

  public function setQuestion2($Question2)
  {
    $this->Question2 = $Question2;
  }

  public function getQuestion3()
  {
    return $this->Question3;
  }

  public function setQuestion3($Question3)
  {
    $this->Question3 = $Question3;
  }

  public function getQuestion4()
  {
    return $this->Question4;
  }

  public function setQuestion4($Question4)
  {
    $this->Question4 = $Question4;
  }

  public function getQuestion5()
  {
    return $this->Question5;
  }

  public function setQuestion5($Question5)
  {
    $this->Question5 = $Question5;
  }

  //Answer Setter and Getters

  public function getAnswer1()
  {
    return $this->Answer1;
  }

  public function setAnswer1($Answer1)
  {
    $this->Answer1 = $Answer1;
  }

  public function getAnswer2()
  {
    return $this->Answer2;
  }

  public function setAnswer2($Answer2)
  {
    $this->Answer2 = $Answer2;
  }

  public function getAnswer3()
  {
    return $this->Answer3;
  }

  public function setAnswer3($Answer3)
  {
    $this->Answer3 = $Answer3;
  }

  public function getAnswer4()
  {
    return $this->Answer4;
  }

  public function setAnswer4($Answer4)
  {
    $this->Answer4 = $Answer4;
  }

  public function getAnswer5()
  {
    return $this->Answer5;
  }

  public function setAnswer5($Answer5)
  {
    $this->Answer5 = $Answer5;
  }

  public function readQuestion($pdo,$fid)
  {
    $stmt = $pdo->prepare("SELECT question FROM faqs WHERE fid=?");
    $stmt->execute([$fid]);
    $row = $stmt->fetch();
    return $row["question"];
  }

  public function readAnswer($pdo, $fid)
  {
    $stmt = $pdo->prepare("SELECT answer FROM faqs WHERE fid=?");
    $stmt->execute([$fid]);
    $row = $stmt->fetch();
    return $row["answer"];
  }

}

?>
