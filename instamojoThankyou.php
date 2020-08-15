<?php


require_once("includes/conn.php");
  session_start();
  if(empty($_SESSION))
  {
    header("location:login.php");
  }

  $userID=$_SESSION['userID'];
  

include 'Instamojo.php';

$api = new Instamojo\Instamojo('6fe72150a75ee7d6dce451877dee0179', '50179d2ad22cbe51bf719812164fbb83','https://www.instamojo.com/api/1.1/');
$payid = $_GET["payment_request_id"];
try {
$response = $api->paymentRequestStatus($payid);


$payStatus="SUCCESS";
$transID=$response['payments'][0]['payment_id'];
$name=$response['payments'][0]['buyer_name'];
$email=$response['payments'][0]['buyer_email'];
$amount=$response['payments'][0]['amount'];

/*
echo "<h4>Payment ID: " . $response['payments'][0]['payment_id'] . "</h4>" ;
echo "<h4>Payment Name: " . $response['payments'][0]['buyer_name'] . "</h4>" ;
echo "<h4>Payment Email: " . $response['payments'][0]['buyer_email'] . "</h4>" ;*/

$planID=$_SESSION['buyPlanID'];

$getPlanDetails="SELECT * FROM plans where planID=".$planID."";
$getPlanDetailsResult=mysqli_query($conn,$getPlanDetails);
$getPlanDetailsRes=mysqli_fetch_assoc($getPlanDetailsResult);

$planType=$getPlanDetailsRes['type'];
$planduration=$getPlanDetailsRes['duration']." days";

$saveplanduration=$getPlanDetailsRes['duration'];

$curDate=date("Y-m-d");
$edate=date('Y-m-d', strtotime($Date. ' + '.$planduration));

$submitQry="insert into trans(userID,name,email,transID,planID,type,duration,amount,sdate,edate,status) 
values('$userID','$name','$email','$transID','$planID','$planType','$saveplanduration','$amount','$curDate','$edate','$payStatus')";



$insertintotrans=mysqli_query($conn,$submitQry);
if($insertintotrans)
{    
    header("location:https://shreeswayamwar.in/shree/mships.php");        
}

else
{
    echo "<script>alert('Something went wrong contact Owner of this site');</script>";
}

//echo "<pre>";
//print_r($response);
}
catch (Exception $e) {
print('Error: ' . $e->getMessage());
}
?>