<?php

session_start();
if(empty($_SESSION)){
header('location: login.php');
}

include 'Instamojo.php';



$con=new mysqli("localhost","mayafilm","abhijay@8055","mayafilm_filmfestival");

$api = new Instamojo\Instamojo('21b710b5bb9c590d4ac743602ffacd0c', '54f09f3870775c56036687e83e5b9718','https://www.instamojo.com/api/1.1/');
$payid = $_GET["payment_request_id"];
try {
$response = $api->paymentRequestStatus($payid);


$payStatus="SUCCESS";
$transID=$response['payments'][0]['payment_id'];
$name=$response['payments'][0]['buyer_name'];
$email=$response['payments'][0]['buyer_email'];
$amount=$response['payments'][0]['amount'];


echo "<h4>Payment ID: " . $response['payments'][0]['payment_id'] . "</h4>" ;
echo "<h4>Payment Name: " . $response['payments'][0]['buyer_name'] . "</h4>" ;
echo "<h4>Payment Email: " . $response['payments'][0]['buyer_email'] . "</h4>" ;

$submitQry="insert into trans(txnID,name,email,amount,payStatus) values('$transID','$name','$email',$amount,'$payStatus')";
//$con->query($query);
$insertintotrans=mysqli_query($con,$submitQry);
if($insertintotrans)
{
    $festName=$_SESSION['subfest_name'];
    $festemail=$_SESSION['subemail'];
    $festInsertQuery="INSERT INTO submissions SELECT * FROM tempsub WHERE fest_name='".$festName."' AND email='".$festemail."'";
    
    $festInsertQueryResu=mysqli_query($con,$festInsertQuery);
    if($festInsertQueryResu)
    {
        header("location:submissions.php");
    }
    else
    {
        echo "<script>alert('Error');</script>";
    }
}


//echo "<pre>";
//print_r($response);
}
catch (Exception $e) {
print('Error: ' . $e->getMessage());
}
?>