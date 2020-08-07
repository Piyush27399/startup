<?php

  require_once("includes/conn.php");
  session_start();
  if(!empty($_SESSION))
  {
    header("location:dashboard.php");
  }

  if(isset($_POST['submit']))
  {
    $fname=strtoupper($_POST['fname']);
    $lname=strtoupper($_POST['lname']);
    $mno=$_POST['mno'];
    $pass=md5($_POST['pass']);
    
    $registerQuery="INSERT INTO users(fname,lname,password,mno) VALUES('".$fname."','".$lname."','".$pass."','".$mno."')";
            
    $checkQuery="SELECT * FROM users WHERE mno='".$mno."'";    
    $checkResult=mysqli_query($conn,$checkQuery);
    if(mysqli_num_rows($checkResult)>0)
    {
        echo "<script>alert('User Already Registration');</script>";
    }        

    else
    {
        $registerResult=mysqli_query($conn,$registerQuery);
        if($registerResult)
        {
            $_SESSION['username']=$mno;
            include("includes/getUserID.php");
            header("location:dashboard.php");
        }
        else
            echo "<script>alert('Registration Failed');</script>";

    }    
  }

?>


<html>
    <head>
        <title>Signup</title>

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
       
        <script>

            function verifyDetails()
            {
                var fname=document.forms["registerForm"]["fname"].value;
                var lname=document.forms["registerForm"]["lname"].value;
                var pass=document.forms["registerForm"]["pass"].value;
                var cpass=document.forms["registerForm"]["cpass"].value;
                var mno=document.forms["registerForm"]["mno"].value;                          
          
                var isNum=/^\d+$/.test(mno);

                if(!isNum)
                {
                    document.getElementById("errorst").innerHTML = "Enter a valid Mobile Number";
                    return false;
                }

                if(mno.length<10)
                {
                    document.getElementById("errorst").innerHTML = "Enter a valid Mobile Number";
                    return false;
                }

                if (pass != cpass) {
                    document.getElementById("errorst").innerHTML = "Password Not Match";
                    return false;
                }

            }
        </script>
    </head>    
    <body>

       <?php
        include("includes/outsideNav.php");
       ?>
          </nav>
          
        <div style='padding:20px;'>
            <div class="heading">
                <h1 class="headFont">Sign Up</h1>    
                <h6 class="headFont">get connected with us.</h6>            
            </div>
            <div class="container">
                <div class="row">
                  <div class="col-sm-4"></div>
                  <div class="col-sm-4">
                    <form method="POST" name="registerForm" onsubmit="return verifyDetails()">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">                      
                                    <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" required>                                    
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">                                                          
                                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">                      
                                    <input type="text" class="form-control" id="mno" name="mno" aria-describedby="emailHelp" placeholder="Mobile Number" required>                                    
                                    <small id="emailHelp" class="form-text text-muted">You will recieve otp on above given number.</small>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">                      
                                    <input type="password" class="form-control" id="password" name="pass" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="form-group">                      
                                    <input type="password" class="form-control" id="cpassword" name="cpass" placeholder="Confirm Password" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div id="errorst" style="color:red;text-align:center;">
                                </div>
                            </div>                            
                            <div class="col-sm-12">
                                <button type="submit" name="submit" class="buttonBlack">Signup</button>                      
                                <p style='font-size: 15px;'><a href="login.php">Already Registered! Login Here</a></p>
                            </div>                            
                        </div>
                    </div>
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