<?php

  require_once("includes/conn.php");
  session_start();
  if(!empty($_SESSION))
  {
    header("location:dashboard.php");
  }

  if(isset($_POST['submit']))
  {
    $username=$_POST['usernm'];
    $pass=$_POST['password'];
    $loginQuery="";

    if(is_numeric($username))
      $loginQuery="SELECT password FROM users WHERE mno='".$username."'";

    else
      $loginQuery="SELECT password FROM users WHERE email='".$username."'";

    $loginResult=mysqli_query($conn,$loginQuery);
    if(mysqli_num_rows($loginResult)>0)
    {
      $res=mysqli_fetch_assoc($loginResult);
      if(md5($pass)==$res['password'])
      {
        $_SESSION['username']=$username;
        include("includes/getUserID.php");
        header("location:dashboard.php");
      }              
      else
        echo "<script>alert('Invalid Details. Try Again');</script>";

    }
    else
      echo "<script>alert('User not Exist');</script>";
        
  }
  
?>

<html>
    <head>
        <title>Login</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/index.css">

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>

    </head>    
    <body>

      <?php
        include("includes/outsideNav.php");
      ?>
          
        <div style='padding:20px;'>
            <div class="heading">
                <h1 class="headFont">Login</h1>
                <h6 class="headFont">to your account</h6>
            </div>
            <div class="container">
                <div class="row">
                  <div class="col-sm-4"></div>
                  <div class="col-sm-4">
                    <form method="POST">
                      <div class="form-group">                      
                        <input type="text" class="form-control" name="usernm" id="usernm" placeholder="Mobile Number or Email" required>                        
                      </div>
                      <div class="form-group">                      
                        <input type="password" class="form-control"  id="password" name="password" placeholder="Password" required>
                      </div> 
                      <div class="errorstat" style='text-align:center;color:red;font-weight'>                        
                      </div>                                          
                      <button type="submit" name="submit" class="buttonBlack">Login</button>
                      <p style='font-size: 15px;'><a href="forgot.php">Forgot Detail?</a><br/>
                      <a href="register.php">Don't Have an account? Sign Up</a></p>
                    </form>
                  </div>
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