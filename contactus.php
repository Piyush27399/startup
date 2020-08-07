<?php

  require_once("includes/conn.php");
  session_start();
  if(empty($_SESSION))
  {
    header("location:login.php");
  }

  include("includes/checkMem.php");

  $userID=$_SESSION['userID'];
  if(isset($_POST['send']))
  {            
      $subject=$_POST['subject'];
      $msg=$_POST['msg'];

      $insertReason="INSERT INTO contact (userID,subject,msg,status) VALUES('".$userID."','".$subject."','".$msg."','OPEN')";      
        $insertReasonRes=mysqli_query($conn,$insertReason);
        if($insertReasonRes)
        {
            echo "<script>alert('Your Query has been sent. We will connect to you soon.');</script>";                                                
        }
        else
            echo "<script>alert('Error. Try Again');</script>";      
  }
  
?>

<html>

<head>
    <title>Contact Us</title>

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

        <script>
            function validate()
            {
                var reason=document.forms["deleteForm"]["reason"].value; 
                
                if(reason=="Select Reason")
                {
                    document.getElementById("errorst").innerHTML="Select Valid Reason";
                    return false;
                }                                
            }                      
        </script>                

</head>

<body>

        <?php
          include("includes/insideNav.php");
        ?>
        

    <div class="container-fluid" style='padding:20px;'>
        <div class="row">
        <div class="col-sm-4"></div>
            <div class="col-sm-4" style='margin-top:50px;margin-bottom:50px;'>
                <div class="card">
                        <div class="card-header">
                            Contact Us                     
                        </div>
                        <div class="card-body">
                        <form name="deleteForm" method="POST">
                            <div class="row">
                            <div class="col-sm-12">
                                <p style='font-size:15px;'>Write to us and we will be there for you as soon as possible.</p>
                            </div>
                        
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea name="msg" id="msg" class="form-control" rows="5" placeholder="Write Here..." required></textarea>
                                </div>
                                    <br/>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">                                        
                                        <button type="submit" name="send" class="btn btn-success">
                                            Send
                                        </button>
                                    </div>
                                </div>                        
                            </div>
                            </div>
                            </form>
                        </div>
                    </div>
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