<?php

    $userID=$_SESSION['userID'];
    $checkMemeOrNot="SELECT * FROM trans WHERE userID='".$userID."' AND status='SUCCESS'";
    $checkMemeOrNotRes=mysqli_query($conn,$checkMemeOrNot);
    $isMember=0;

    if(mysqli_num_rows($checkMemeOrNotRes)>0)
        $isMember=1;
    else
        $isMember=0;

?>