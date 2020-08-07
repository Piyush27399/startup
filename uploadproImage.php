<?php

require_once("includes/conn.php");
session_start();
if(empty($_SESSION))
{
     header("location:login.php");
}
$userID=$_SESSION['userID'];

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
    $name = $_FILES['profileimage']['name'];    
    
    $tmp = $_FILES['profileimage']['tmp_name'];
    $path = "images/userImage/";
    
    $query="UPDATE users SET image='".$name."' WHERE id='".$userID."'";
    $result=mysqli_query($conn,$query);
    
    if($result)
    {
        move_uploaded_file($tmp, $path.$name);        
        echo "<script>window.location.replace('edit_profile.php');</script>";
    }
    else
        echo "<script>alert('Error Uploading Image')</script>";
}

?>