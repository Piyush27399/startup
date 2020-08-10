<?php 
// $product_name = $_POST['fest'];
// $price = $_POST['txtamt'];
// $name = $_POST['txtFilmMakerName'];
// $phone = $_POST['subm'];
// $email = $_POST['sube'];

$product_name = $_POST["prod"];
$price = $_POST["amt"];
$name = $_POST["nm"];
$phone = $_POST["phn"];
$email = $_POST["mail"];




include 'Instamojo.php';      
$api = new Instamojo\Instamojo('7a4ca2b260c62d6a2533124e525cf7a4', '2135bdc27b4e363e4435df46c19ef9bf','https://www.instamojo.com/api/1.1/');
try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => $product_name,
        "amount" => $price,
        "buyer_name" => $name, 
        "phone" => $phone, 
        "send_email" => true,  
        "send_sms" => true, 
        "email" => $email, 
        'allow_repeated_payments' => false, 
        "redirect_url" => "https://filmfestival.company/users/instamojoThankyou.php"
        //"webhook" => "http://YOUR_WEBSITE.COM/webhook.php" 
        )); 
    //print_r($response);    
    $pay_url = $response['longurl'];
    header("Location: $pay_url");
    exit();
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}     
?>