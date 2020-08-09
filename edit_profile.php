<?php

  require_once("includes/conn.php");
  session_start();
  if(empty($_SESSION))
  {
    header("location:login.php");
  }

  $userID=$_SESSION['userID'];

  $getUserData="SELECT fname,lname,email,mno,education,profession,height,age,dob,gender,maritalStatus,
    fatherName,motherName,address,city,state,pincode,expectations,image
    FROM users WHERE id='".$userID."'";
    
  $getUserDataResult=mysqli_query($conn,$getUserData);
  $getUserDataRes=mysqli_fetch_assoc($getUserDataResult);
  if(!mysqli_num_rows($getUserDataResult)>0)
    echo "<script>alert('Error. Try Refreshing The page');</script>";
 

    if(isset($_POST['submitEdu']))
  {      
        $education=$_POST['education'];
        $profession=$_POST['profession'];      

      $updateQry="UPDATE users SET education='".$education."',profession='".$profession."' WHERE id='".$userID."'";
  
    $updateQryRes=mysqli_query($conn,$updateQry);
    if($updateQryRes)
        header('location:edit_profile.php');
    else
        echo "<script>alert('Failed');</script>";
}

    if(isset($_POST['submitFamily']))
  {      
        $fatherName=$_POST['fatherName'];
      $motherName=$_POST['motherName'];      

      $updateQry="UPDATE users SET fatherName='".$fatherName."',motherName='".$motherName."' WHERE id='".$userID."'";
  
    $updateQryRes=mysqli_query($conn,$updateQry);
    if($updateQryRes)
        header('location:edit_profile.php');
    else
        echo "<script>alert('Failed');</script>";
}


if(isset($_POST['changePass']))
{
    $curpass=md5($_POST['curpass']);
    $pass=md5($_POST['newpass']);

    $checkCurPass="SELECT password FROM users WHERE id='".$userID."' AND password='".$curpass."'";
    $checkCurPassRes=mysqli_query($conn,$checkCurPass);
    if(mysqli_num_rows($checkCurPassRes)>0)
    {
        $updateNew="UPDATE users SET password='".$pass."' WHERE id='".$userID."'";
        $updateNewRes=mysqli_query($conn,$updateNew);
        if($updateNewRes)
            echo "<script>alert('Password Change Success');</script>";
        else
            echo "<script>alert('Error. Try Again');</script>";
    }
    else{
        echo "<script>alert('Invalid Current Password');</script>";
    }
}


  if(isset($_POST['submitPersonal']))
  {      
      $fname=$_POST['fname'];
      $lname=$_POST['lname'];
      $age=$_POST['age'];
      $gender=$_POST['gender'];
      $height=$_POST['height'];
      $maritalStatus=$_POST['maritalStatus'];
      $expectations=$_POST['expectations'];
      $dob=$_POST['dob'];

      $updateQry="UPDATE users SET fname='".$fname."',lname='".$lname."', age='".$age."', gender='".$gender."',
            height='".$height."', maritalStatus='".$maritalStatus."', expectations='".$expectations."', dob='".$dob."' WHERE id='".$userID."'";
  
    $updateQryRes=mysqli_query($conn,$updateQry);
    if($updateQryRes)
        header('location:edit_profile.php');
    else
        echo "<script>alert('Failed');</script>";
    }

    if(isset($_POST['submitContact']))
  {      
      $address=$_POST['address'];
      $city=$_POST['city'];
      $state=$_POST['state'];
      $pincode=$_POST['pincode'];

      $updateQry="UPDATE users SET city='".$city."',address='".$address."', state='".$state."', pincode='".$pincode."' WHERE id='".$userID."'";
  
    $updateQryRes=mysqli_query($conn,$updateQry);
    if($updateQryRes)
        header('location:edit_profile.php');
    else
        echo "<script>alert('Failed');</script>";
    }

?>

<html>

<head>
    <title>Edit Profile</title>

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
    label
    {
        font-size:15px;
    }     
        select {
            padding: 8px;
            border-radius: 3px;
        }

        .profileCard
        {            
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);    
            border: none;
        }
        .profileCardHeader
        {
            padding: 60px;;
            border:none;
            background-image: url("images/chainimage-beautiful-background-patterns-vector-free-vector-4vector.jpg") ;
        }
               
        .whiteFont
        {
            color: white;    
            font-weight: bold;                    
        }
        .bodyHead
        {
            font-weight: bold;
        }
        .spa
        {
            padding-top:10px;
        }

    </style>

        <script>

            $(window).on("load", function () {               
            var list = [];
            for (var i = 18; i <= 55; i++) {
                list.push(i);
            }            

            var sel = document.getElementById('ageList');
            for(var i = 0; i < list.length; i++) {
                var opt = document.createElement('option');
                opt.innerHTML = list[i];
                opt.value = list[i];
                sel.appendChild(opt);
            }
            
            }

        });
        </script>

        <script>
        
            function checkBoxP()
            {
                var form = document.getElementById("formp");
                var forc = document.getElementById("formc");
                var forf = document.getElementById("formf");
                var forme = document.getElementById("forme");

                var submitp = document.getElementById("submitp");
                var submitc = document.getElementById("submitc");
                var submitf = document.getElementById("submitf");
                var submite = document.getElementById("submite");

                var ms = document.getElementById("maritalStatus");
                var gender = document.getElementById("gender");
                var state = document.getElementById("state");

                var elements = form.elements;
                var elementsc = formc.elements;
                var elementse = forme.elements;
                var elementsf = formf.elements;

                for (var i = 0, len = elements.length; i < len; ++i) {
                    if ($(elements[i]).prop('readonly')) {
                        elements[i].readOnly = false;
                    }
                    else
                        elements[i].readOnly = true;
                }

                for (var i = 0, len = elementsc.length; i < len; ++i) {
                    if ($(elementsc[i]).prop('readonly')) {
                        elementsc[i].readOnly = false;
                    }
                    else
                        elementsc[i].readOnly = true;
                }

                for (var i = 0, len = elementse.length; i < len; ++i) {
                    if ($(elementse[i]).prop('readonly')) {
                        elementse[i].readOnly = false;
                    }
                    else
                        elementse[i].readOnly = true;
                }

                for (var i = 0, len = elementsf.length; i < len; ++i) {
                    if ($(elementsf[i]).prop('readonly')) {
                        elementsf[i].readOnly = false;
                    }
                    else
                        elementsf[i].readOnly = true;
                }

                if (!$(ms).prop('disabled') && !$(gender).prop('disabled') && !$(state).prop('disabled') ) {
                        ms.disabled = true;
                        gender.disabled = true;
                        state.disabled = true;
                        submite.disabled = true;
                        submitf.disabled = true;
                        submitc.disabled = true;
                        submitp.disabled = true;
                    }
                    else{
                        ms.disabled = false;
                        gender.disabled = false;
                        state.disabled = false;
                        submite.disabled = false;
                        submitf.disabled = false;
                        submitc.disabled = false;
                        submitp.disabled = false;
                    }                        
            
            }
        </script>
</head>

<body>

        <?php
          include("includes/insideNav.php");
        ?>

<!-- Modal password change-->
<div class="modal fade" id="changePass" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>


      <script>
          function validatePass()
          {
              var newpass=document.forms["changePassForm"]["newpass"].value;
              var newcpass=document.forms["changePassForm"]["newcpass"].value;

              if(newpass!=newcpass)
              {
                  document.getElementById('error').innerHTML="New Password not Match!";                    
                  return false;
              }
          }
      </script>

      <div class="modal-body">
        <form method="POST" onsubmit="return validatePass()" name="changePassForm">
            <div class="row">
                <div class="col-sm-12">                    
                    <input type="password" class="form-control" id="curpass" name="curpass" placeholder="Enter Current Password" required>
                </div>                
                <div class="col-sm-6" style='margin-top:20px;'>                    
                    <input type="password" class="form-control" id="newpass" name="newpass" placeholder="Enter New Password" required>
                </div>                
                <div class="col-sm-6" style='margin-top:20px;'>                    
                    <input type="password" class="form-control" id="newcpass" name="newcpass" placeholder="Confirm New Password" required>
                </div>               
                <div class="col-sm-6" style='margin-top:20px;'>
                    <p id="error" style='color:red'></p>
                </div>
            </div>
        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="changePass" class="btn btn-primary">Update Password</button>
      </div>
    </form>
    </div>
  </div>
</div>




    <div class="container-fluid" style='padding:20px;'>
        <div class="row">
            <div class="col-sm-3" style='padding-bottom:20px;'>
                <div class="card" >
                    <div class="card-header">
                    <i class="fa fa-cog" aria-hidden="true" style='color:black;'></i>
                        Settings
                    </div>
                    <div class="card-body">                        
                        <a href="profile.php?userID=1" target="_blank" class="btn btn-success">View Your Profile</a><br/>
                        <br/>
                        <a href="">Change Email / Mobile Number</a><br/>
                        <a href="" data-toggle="modal" data-target="#changePass">Change Password</a><br/>
                        <a href="contactus.php">Contact Us</a><br/>                        
                        <a href="mships.php">Memberships</a><br/>  
                        <a href="deletePro.php">Delete Account</a><br/>   
                        
                        <br/>
                        <br/>
                        <a >More Changes Coming Soon..</a><br/>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">                
                <form action="uploadproImage.php" id="upload_form" method="post" enctype="multipart/form-data">
                <?php $image="images/userImage/".$getUserDataRes['image']; ?>
                <p align="center"><img src='<?php echo $image; ?>' style='border-radius:100px;margin: 10px;;' width="100" height="100">
                    <br/>
                    <input type="file" name="profileimage" id="profileimage">
                </p>
            </form>
                 
            <script type="text/javascript">
            document.getElementById("upload_form").onchange = function() {
                // submitting the form
                document.getElementById("upload_form").submit();
            };
            </script>
                

            <div class="col-sm-12">
                    <input type="checkbox" onchange="checkBoxP()">
                    Click Here to Edit Details
                </div>                

            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#pinfo" aria-expanded="true" aria-controls="collapseOne">
                        Personal Information
                        </button>
                    </h2>
                    </div>

                    <div id="pinfo" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <form method="POST" id="formp">
                            <div class="row">                            
                                <div class="col-sm-2 spa">           
                                    <label for="inputEmail4">First Name</label>
                                    <input type="text"   name="fname" class="form-control" value='<?php echo $getUserDataRes['fname']; ?>' readonly>
                                </div>
                                <div class="col-sm-2 spa">
                                <label for="inputEmail4">Last Name</label>
                                    <input type="text" name="lname" class="form-control" value='<?php echo $getUserDataRes['lname']; ?>' readonly>
                                </div>
                                <div class="col-sm-2 spa">
                                <label for="inputEmail4">Height</label>
                                    <input type="number" name="height" class="form-control" value='<?php echo $getUserDataRes['height']; ?>' step="any" min="0.1" readonly>
                                </div>
                                <div class="col-sm-2 spa">
                                <label for="inputEmail4">Age</label>
                                    <input type="number" name="age" class="form-control" value='<?php echo $getUserDataRes['age']; ?>' min="18" readonly>
                                </div>
                                <div class="col-sm-2 spa">
                                <label for="inputEmail4">Gender</label>
                                    <select class="form-control" name="gender" id="gender" disabled>
                                                                            
                                        <?php                                    
                                            echo "<option default>Gender</option>";
                                            $msd=$getUserDataRes['gender'];                                        
                                            
                                            $ms=array("MALE","FEMALE");
                                            for($l=0;$l<count($ms);$l++)
                                            {                                        
                                                if($msd==$ms[$l])
                                                    echo "<option value=".$ms[$l]." selected>".$ms[$l]."</option>";

                                                else                                        
                                                    echo "<option value=".$ms[$l].">".$ms[$l]."</option>";
                                            }                                        
                                        ?>                                                                                  
                                    </select>
                                </div>
                                <div class="col-sm-3 spa">
                                <label for="inputEmail4">Marital Status</label>                                
                                    <select class="form-control" id="maritalStatus" name="maritalStatus" disabled>
                                    
                                    <?php                                    
                                        echo "<option default>Marital Status</option>";
                                        $msd=$getUserDataRes['maritalStatus'];                                        
                                        
                                        $ms=array("NEVER MARRIED","DIVORCED");
                                        for($l=0;$l<count($ms);$l++)
                                        {                                        
                                            if($msd==$ms[$l])
                                                echo "<option value=".$ms[$l]." selected>".$ms[$l]."</option>";

                                            else                                        
                                                echo "<option value=".$ms[$l].">".$ms[$l]."</option>";
                                        }                                        
                                    ?>                                                          
                                    </select>
                                </div>                                
                                <div class="col-sm-3 spa" >
                                <label for="inputEmail4">Date of Birth</label>
                                    <input type="Date" name="dob" value='<?php echo $getUserDataRes['dob']; ?>' class="form-control" readonly>
                                </div>
                                <div class="col-sm-4 spa">
                                <label for="inputEmail4">Expectation</label>
                                    <textarea type="text" name="expectations" rows=3 class="form-control" readonly><?php echo $getUserDataRes['expectations']; ?></textarea>
                                </div>
                                <div class="col-sm-3 spa">
                                    <button type="submit" id="submitp" name="submitPersonal" class="btn btn-primary" disabled>Save</button>
                                </div>
                            </div>                            
                        </form>
                    </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">                        
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#contactInfo" aria-expanded="false" aria-controls="collapseTwo">                            
                            Contact Details
                        </button>
                    </h2>
                    </div>
                    <div id="contactInfo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        <form method="POST" id="formc">
                            <div class="row">                                
                                <div class="col-sm-3 spa">
                                <label for="inputEmail4">Address</label>
                                    <textarea type="text" rows=3 class="form-control" name="address" readonly><?php echo $getUserDataRes['address']; ?></textarea>
                                </div>
                                <div class="col-sm-3 spa">
                                <label for="inputEmail4">City</label>
                                    <input type="text" class="form-control" name="city" value='<?php echo $getUserDataRes['city']; ?>' readonly>
                                </div>


                                <?php  
                                
                                        $statesList=array(
                                            "Andhra Pradesh",
                                            "Andaman and Nicobar Islands",
                                            "Arunachal Pradesh",
                                            "Assam",
                                            "Bihar",
                                            "Chandigarh",
                                            "Chhattisgarh",
                                            "Dadar and Nagar Haveli",
                                            "Daman and Diu",
                                            "Delhi",
                                            "Lakshadweep",
                                            "Puducherry",
                                            "Goa",
                                            "Gujarat",
                                            "Haryana",
                                            "Himachal Pradesh",
                                            "Jammu and Kashmir",
                                            "Jharkhand",
                                            "Karnataka",
                                            "Kerala",
                                            "Madhya Pradesh",
                                            "Maharashtra",
                                            "Manipur",
                                            "Meghalaya",
                                            "Mizoram",
                                            "Nagaland",
                                            "Odisha",
                                            "Punjab",
                                            "Rajasthan",
                                            "Sikkim",
                                            "Tamil Nadu",
                                            "Telangana",
                                            "Tripura",
                                            "Uttar Pradesh",
                                            "Uttarakhand",
                                            "West Bengal"
                                        );
                                ?>

                                <div class="col-sm-4 spa">
                                <label for="inputEmail4">State</label>
                                    <select class="form-control" name="state" id="state" disabled>

                                    <?php
                                    
                                    echo "<option default>Select State</option>";
                                        $msdstate=$getUserDataRes['state'];                                        
                                                                                
                                        for($l=0;$l<count($statesList);$l++)
                                        {                                        
                                            if($msdstate==$statesList[$l])
                                                echo "<option value='".$statesList[$l]."' selected>".$statesList[$l]."</option>";

                                            else                                        
                                                echo "<option value='".$statesList[$l]."'>".$statesList[$l]."</option>";
                                        }      
                                    ?>                                        
                                    </select>
                                </div>
                                <div class="col-sm-2 spa">
                                <label for="inputEmail4">Pincode</label>
                                    <input type="number" class="form-control" name="pincode" value='<?php echo $getUserDataRes['pincode']; ?>' min="111111" readonly>
                                </div>
                                <div class="col-sm-3 spa">
                                    <button type="submit" id="submitc" name="submitContact" class="btn btn-primary" disabled>Save</button>
                                </div>
                            </div>                            
                        </form>                      
                    </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#familyInfo" aria-expanded="false" aria-controls="collapseThree">
                        Family Info
                        </button>
                    </h2>
                    </div>
                    <div id="familyInfo" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">                        
                        <form method="POST" id="formf">
                            <div class="row">
                                <div class="col-sm-4 spa">     
                                <label for="inputEmail4">Father Name</label>                               
                                    <input type="text" class="form-control" name="fatherName" value='<?php echo $getUserDataRes['fatherName']; ?>' readonly>
                                </div>
                                <div class="col-sm-3 spa">
                                <label for="inputEmail4">Mother Name</label>
                                    <input type="text" class="form-control" name="motherName" value='<?php echo $getUserDataRes['motherName']; ?>' readonly>                                
                                </div>
                                
                                <div class="col-sm-12 spa">                                                                
                                                              
                                    <button type="submit" id="submitf" name="submitFamily" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#eduInfo" aria-expanded="false" aria-controls="collapseThree">
                        Education & Profession Info
                        </button>
                    </h2>
                    </div>
                    <div id="eduInfo" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <form method="POST" id="forme">
                            <div class="row">
                                <div class="col-sm-4 spa">
                                <label for="inputEmail4">Education</label>
                                    <input type="text" class="form-control" name="education" value='<?php echo $getUserDataRes['education']; ?>' readonly>
                                </div>
                                <div class="col-sm-3 spa">
                                <label for="inputEmail4">Profession</label>
                                    <input type="text" class="form-control" name="profession" value='<?php echo $getUserDataRes['profession']; ?>' readonly>
                                </div>
                                
                                <div class="col-sm-12 spa">
                                    <button type="submit" id="submite" name="submitEdu" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
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