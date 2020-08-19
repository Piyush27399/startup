<?php

  require_once("includes/conn.php");
  session_start();
    $userID=$_SESSION['userID'];
    $id=$_GET['id'];
    $saveID="insert into sList(userID,saveUserID) values('".$userID."','".$id."')";
    if(mysqli_query($conn,$saveID))
        echo "1";
    else
        echo "0";
?>