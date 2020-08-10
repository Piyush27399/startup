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
$api = new Instamojo\Instamojo('6fe72150a75ee7d6dce451877dee0179', '50179d2ad22cbe51bf719812164fbb83','https://www.instamojo.com/api/1.1/');
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
        "redirect_url" => "https://shreeswayamwar.in/startup/instamojoThankyou.php"
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