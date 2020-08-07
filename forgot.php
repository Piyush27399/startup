<html>
    <head>
        <title>Forgot Details</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/index.css">

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
            

    </head>    
    <body>

       <?php
        include("includes/outsideNav.php");
       ?>
          </nav>
          
        <div style='padding:20px;'>
            <div class="heading">
                <h1 class="headFont">Forgot Details</h1>    
                <h6 class="headFont">Don't worry we are there for you.</h6>            
            </div>
            <div class="container">
                <div class="row">
                  <div class="col-sm-4"></div>
                  <div class="col-sm-4">
                    <form method="POST">
                    <div class="container">
                        <div class="row">                            
                            <div class="col-sm-12">
                                <div class="form-group">                      
                                    <input type="text" class="form-control" id="mno" aria-describedby="emailHelp" placeholder="Registered Mobile Number" required>                                    
                                    <small id="emailHelp" class="form-text text-muted">You will recieve otp on above given number.</small>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">                      
                                    <input type="password" class="form-control" id="password" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="form-group">                      
                                    <input type="password" class="form-control" id="cpassword" placeholder="Confirm Password" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="buttonBlack">Proceed</button>                      
                                <p style='font-size: 15px;'><a href="login.php">Remember Detail's! Login Here</a></p>
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