<?php

  require_once("includes/conn.php");
  session_start();
  if(empty($_SESSION))
  {
    header("location:login.php");
  }

  $userID=$_SESSION['userID'];
  $getPlanID=$_GET['planID'];

  $_SESSION['buyPlanID']=$getPlanID;

  $getUserDetails="select fname,lname,email,mno from users where id='".$userID."'";
  $getUserDetailsRes=mysqli_query($conn,$getUserDetails);
  if(mysqli_num_rows($getUserDetailsRes)>0)
  {
      $getD=mysqli_fetch_assoc($getUserDetailsRes);
      
    $name=$getD['fname']." ".$getD['lname'];
    $email=$getD['email'];
    $mno=$getD['mno'];

    if($name!="" && $email!="" && $mno!="")
    {
        $getPlanDetails="SELECT * FROM plans where planID=".$getPlanID."";
        $getPlanDetailsResult=mysqli_query($conn,$getPlanDetails);
        $getPlanDetailsRes=mysqli_fetch_assoc($getPlanDetailsResult);

        $planType=$getPlanDetailsRes['type'];
        $planamt=$getPlanDetailsRes['amount'];
                        
    }
    else
        echo "<h4>Please Update Your profile to make this payment <a href='edit_profile.php'> Click here to update profile.</a></h4>";

  }
  else 
    {
        echo "<script>alert('Something Went Wrong. Logout and try Again after login');</script>";   
    }
   
?>

<html>

<head>
    <title>Membership</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/index.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

    <style>
        .card {
            margin: 20px;
        }

        select {
            padding: 8px;
            border-radius: 3px;
        }
    </style>

</head>

<body>

        <?php
          include("includes/insideNav.php");
        ?>       

            <h1 class="headFont heading" id="">Membership</h1>
            <div class="container">
                <div class="row">                
                    <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                        <p align="center" style='color:red'>Click Submit to Proceed Payment & buy a Membership
                            Do not Refresh the page while this procedure
                        </p>
                            <form action = "http://localhost/startup/instamojoPay.php" method="POST">                        
                                <input type="hidden" class="form-control" name="prod" value="<?php echo $planType; ?>"> 
                                    
                                <input type="hidden" class="form-control" name="amt" value="<?php echo $planamt; ?>"> 

                                <input type="hidden" class="form-control" name="nm" value="<?php echo $name; ?>">
                                    
                                <input type="hidden" class="form-control" name="phn" value="<?php echo $mno; ?>">
                                    
                                <input type="hidden" class="form-control" name="mail" value="<?php echo $email; ?>">
                                <a href="mships.php" class="btn btn-dark" >Cancel</a>
                                <input type="submit" name="btninstamojo" id="btninstamojo" class="btn btn-success" />
                            </form>                          

                        </div>                                                    
                </div>
            </div>
                
    <?php
            include("includes/footer.php");
        ?>
</body>

</html>


<script>
     if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
     }
</script>