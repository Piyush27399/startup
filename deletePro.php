<?php

  require_once("includes/conn.php");
  session_start();
  if(empty($_SESSION))
  {
    header("location:login.php");
  }

  include("includes/checkMem.php");

  $userID=$_SESSION['userID'];
  if(isset($_POST['deletePro']))
  {
      $pass=$_POST['password'];
      $pass=md5($pass);
      $reason=$_POST['reason'];

      $insertReason="INSERT INTO contact (userID,subject,status) VALUES('".$userID."','".$reason."','DELETEP')";
      $checkPass="SELECT password FROM users WHERE id='".$userID."' AND password='".$pass."'";
      
      $checkPassRes=mysqli_query($conn,$checkPass);
      if(mysqli_num_rows($checkPassRes)>0)
      {
        $insertReasonRes=mysqli_query($conn,$insertReason);
        if($insertReasonRes)
        {
            echo "<script>alert('Your Delete Request has been sent. We will delete your account soon and inform you.');</script>";                                                
        }
        else
            echo "<script>alert('Error Deleting Account. Try Again');</script>";
      }
      else
          echo "<script>alert('Invalid Password.');</script>";
  }
  
?>

<html>

<head>
    <title>Delete Profile</title>

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
                            Delete Account                          
                        </div>
                        <div class="card-body">
                        <form onsubmit="return validate()" name="deleteForm" method="POST">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="password" name="password" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <select name="reason" id="reason" class="form-control">
                                        <option default>Select Reason</option>
                                        <option value="Costly Subscription">Costly Subscription</option>                                        
                                        <option value="Privacy Problems">Privacy Problems</option>
                                        <option value="Other Reason">Other Reason</option>
                                    </select>
                                    <br/>
                                </div>
                                <div class="col-sm-12">                                    
                                    <p id="errorst" style='color:red;'></p>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">                                        
                                        <button type="submit" name="deletePro" class="btn btn-danger">
                                            Delete Profile
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