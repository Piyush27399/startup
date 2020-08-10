<?php


$getPlanDetailsRes=360;
$planduration=$getPlanDetailsRes." days";

$curDate=date("Y-m-d");
$edate=date('Y-m-d', strtotime($Date. ' + '.$planduration));

echo $curDate."<br/>";
echo $edate."<br/>";
?>