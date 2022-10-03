<?php
// Read the variables sent via POST from our API
// https://60c6-190-2-138-12.eu.ngrok.io/healthussd/index.php
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

if ($text == "") {
    // This is the first request. Note how we start the response with CON
    $response  = "CON What would you want to check \n";
    $response .= "1. Subscribe \n";
    $response .= "2. Subscription Plan \n";
    $response .= "3. FAQs \n";
    $response .= "4. Unsubscribe \n";
    
    

} else if ($text == "1") {
    // Business logic for first level response
    $response = "CON Fill Your Name \n";
    $response .= "1. Name  \n";


} else if ($text == "2") {
    // Business logic for first level response
    // This is a terminal request. Note how we start the response with CON
    $response = "CON PICK SUBSCRIPTION PLAN \n";
    $response .= "1. Daily-($0.5)  \n";
    $response .= "2. Weekly-($1)  \n";
    $response .= "3. Monthly-($1.50)  \n"; 
  
} else if($text == "1*1") { 
    // This is a terminal request. Note how we start the response with CON
    $response = "CON Fill in Your Age \n";
    $response .= "1. age  \n";
        
} else if($text == "1*1*1") { 
    $response = "CON Select A Health Condition \n";
    $response .= "1. Diabetes  \n";
    $response .= "2. Hypertension  \n";
    $response .= "3. Depression  \n";
    $response .= "4. Cancer  \n";
    $response .= "5. Stroke  \n";

} else if($text == "2*1") {
    $response ="END You have succesfuly subscribed to the daily plan. Thank you!";
    
} else if($text == "2*2") {
    $response ="END You have succesfuly subscribed to the Weekly plan. Thank you!";
    
} else if($text == "2*3") {
    $response ="END You have succesfuly subscribed to the monthly plan. Thank you!";

} else if($text == "3") {
    $response = "CON Choose Message From The Frequently Asked Questions \n";
    $response .= "1. Foods with low Cholesterol levels  \n";
    $response .= "2. Is cancer Communicable?  \n";
    $response .= "3. What is depression? Is it the same as stress?  \n";
    $response .= "4. What are the early stages of hypertension?  \n";
    $response .= "5. What causes heart disease?  \n";

} else if($text == "3*1") {
    $response ="END Oats, beans, fatty fish. Thank you!";
} else if($text == "3*2") {
    $response ="END No, Cancer is not a communicable disease. Cancer is a genetic disease—that is, it is caused by changes to genes that control the way our cells function, especially how they grow and divide. Thank you!";
} else if($text == "3*3") {
    $response ="END Depression (major depressive disorder) is a common and serious medical illness that negatively affects how you feel, the way you think and how you act. Depression is more serious and long-lasting than stress Thank you!";
} else if($text == "3*4") {
    $response ="END Early signs of hypertension may include; early morning headaches, nosebleeds, irregular heart rhythms, vision changes, and buzzing in the ears. Severe hypertension can cause fatigue, nausea, vomiting, confusion, anxiety, chest pain, and muscle tremors. Thank you!";

} else if($text == "3*5") {
    $response ="END High blood pressure, high blood cholesterol, and smoking are key risk factors for heart disease. Several other medical conditions and lifestyle choices can also put people at a higher risk for heart disease, including: Diabetes. Overweight and obesity. Thank you!";

} else if($text == "4") {
    $response ="END You have succesfully unsubscribed from our services. To subscribe, dial *132#. Thank you!";

}
    

// Echo the response back to the API
header('Content-type: text/plain');
echo $response;
?>