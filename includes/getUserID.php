<?php
    
    $username=$_SESSION['username'];
    $getUserID="";

    if(is_numeric($username))
      $getUserID="SELECT * FROM users WHERE mno='".$username."'";

    else
      $getUserID="SELECT * FROM users WHERE email='".$username."'";

    $getUserIDRes=mysqli_query($conn,$getUserID);

    if(mysqli_num_rows($getUserIDRes)>0)
    {
        $r=mysqli_fetch_assoc($getUserIDRes);
        $_SESSION['userID']=$r['id'];
    }        

?>