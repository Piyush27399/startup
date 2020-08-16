<?php

  require_once("includes/conn.php");
  session_start();
  if(!empty($_SESSION))
  {
    header("location:dashboard.php");
  }

  if(isset($_POST['register']))
  {
    	$fname=$_POST['fname'];
      $lname=$_POST['lname'];
      $age=$_POST['age'];
      $gender=$_POST['gender'];
      $height=$_POST['height'];
      $maritalStatus=$_POST['maritalStatus'];
      $expectations=$_POST['expectations'];
	  $dob=$_POST['dob'];
	  $address=$_POST['address'];
      $city=$_POST['city'];
      $state=$_POST['state'];
	  $pincode=$_POST['pincode'];
	  $fatherName=$_POST['fatherName'];
	  $motherName=$_POST['motherName']; 
	  $education=$_POST['education'];

	  $email=$_POST['email'];
	  $mno=$_POST['mno'];

		$profession=$_POST['profession'];   	  	
		$rsurname=$_POST['rsurname'];
		$fcontact=$_POST['fcontact'];  	  
	$pass=$_POST['pass'];
	$pass=md5($pass);
	    
    $registerQuery="INSERT INTO users(fname,lname,email,password,mno,education,profession,height,age,dob,gender,maritalStatus,fatherName,motherName,address,city,state,pincode,expectations,relativeSurname,fcontact) VALUES('".$fname."','".$lname."','".$email."','".$pass."','".$mno."','".$education."','".$profession."','".$height."','".$age."','".$dob."','".$gender."','".$maritalStatus."','".$fatherName."','".$motherName."','".$address."','".$city."','".$state."','".$pincode."','".$expectations."','".$rsurname."','".$fcontact."')";
	       
    $checkQuery="SELECT * FROM users WHERE mno='".$mno."'";    
	$checkResult=mysqli_query($conn,$checkQuery);
	

    if(mysqli_num_rows($checkResult)>0)
    {
        echo "<script>alert('User Already Registered');</script>";
    }        

    else
    {			
		if(mysqli_query($conn,$registerQuery))
		{
            $_SESSION['username']=$mno;
            include("includes/getUserID.php");						

			// Image Upload after Register

			$name = $_FILES['profileImage']['name'];
    
			$tmp = $_FILES['profileImage']['tmp_name'];
			$path = "images/userImage/";


			$userID=$_SESSION['userID'];
			$query="UPDATE users SET image='".$name."' WHERE id='".$userID."'";
			$result=mysqli_query($conn,$query);
			
			if($result)
			{
				move_uploaded_file($tmp, $path.$name);
				header("location:dashboard.php");
				//echo "<script>window.location.replace('edit_profile.php');</script>";
			}
			else
				echo "<script>alert('Error Uploading Image. Now goto Login Page and login to your account')</script>";
		
			// end

        }
        else
            echo "<script>alert('Error Register');</script>";

    }    
  }

?>


<html>
<head>
	<meta charset="utf-8">
	<title>Register</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
	 integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" 
	 integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<!-- Main Style Css -->
	<link rel="stylesheet" href="css/re.css"/>
	<link rel="stylesheet" href="css/index.css"/>

	<script>

function verifyDetails()
{	
	var pass=document.forms["registerForm"]["pass"].value;
	var cpass=document.forms["registerForm"]["cpass"].value;
	var mno=document.forms["registerForm"]["mno"].value;    
	var gender=document.forms["registerForm"]["gender"].value;    
	var state=document.forms["registerForm"]["state"].value;                          
	var pincode=document.forms["registerForm"]["pincode"].value;
	var status=document.forms["registerForm"]["maritalStatus"].value;
	var fcontact=document.forms["registerForm"]["fcontact"].value;

	var isNum=/^\d+$/.test(mno);
	var isNumf=/^\d+$/.test(fcontact);

	if(!isNum)
	{
		document.getElementById("errorst").innerHTML = "Enter a valid Mobile Number";
		return false;
	}
	if(!isNumf)
	{
		document.getElementById("errorst").innerHTML = "Enter a valid Mobile Number in Family Contact";
		return false;
	}

	if(mno.length<10 || mno.length>10)
	{
		document.getElementById("errorst").innerHTML = "Enter a valid Mobile Number";
		return false;
	}
	if(pincode.length<6 || pincode.length>6)
	{
		document.getElementById("errorst").innerHTML = "Enter a valid Pincode";
		return false;
	}
	if(fcontact.length<10 || fcontact.length>10)
	{
		document.getElementById("errorst").innerHTML = "Enter a valid Family Mobile Number";
		return false;
	}

	if (pass != cpass) {
		document.getElementById("errorst").innerHTML = "Password Not Match";
		return false;
	}
	if (state=="Select State") {
		document.getElementById("errorst").innerHTML = "Select State Properly";
		return false;
	}
	if (gender=="Select Gender") {
		document.getElementById("errorst").innerHTML = "Select Gender Properly";
		return false;
	}
	if (status=="Select Marital Status") {
		document.getElementById("errorst").innerHTML = "Select Marital Status Properly";
		return false;
	}

}
</script>

</head>
<body class="form-v007">
	<nav class="navbar navbar-expand-lg sticky-top  navbar-dark back1">
		<a class="navbar-brand" href="index.php" >
			<img src="images/logo.png" width="50" height="50">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
			<li class="nav-item active">
				<a class="nav-link"  href="index.php">Home <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#features">Features</a>
			</li>                
			<li class="nav-item">
				<a class="nav-link" href="#contact">Contact Us</a>
				</li>
				<li class="nav-item">
				<a class="nav-link" href="#about">About</a>
				</li>                
			</ul>
		</div>
		</nav>
	<div class="page-contenttells">
		<div class="form-v007-content6tyg">
			<form class="form-detail007" method="POST" onsubmit="return verifyDetails()" name="registerForm" enctype="multipart/form-data">
				<div class="form-left">
					<h2>Personal Information</h2>
					
					<div class="form-group">
						<div class="form-row">
							Select Profile Image
							<input type="file"  id="profileImage" name="profileImage" required>
						</div>
					</div>

					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="fname" id="fname" class="input-text" placeholder="First Name" required>
						</div>
						<div class="form-row form-row-1">
							<input type="text" name="lname" id="lname" class="input-text" placeholder="Last Name" required>
						</div>
					</div>
															
					<div class="form-group">
						<div class="form-row form-row-3">
							<input type="number" name="age" class="age" id="age" placeholder="Age" min="18" required>							
						</div>
						<div class="form-row form-row-2">
							<input type="number" name="height" class="height" id="height" step="any" min="0.1" placeholder="Height" required>							
						</div>
												
					</div>
					<div class="form-group">												
						<div class="form-row form-row-1">
							<select name="maritalStatus" id="maritalStatus">
							    <option default>Select Marital Status</option>
							    <option value="NEVER MARRIED">NEVER MARRIED</option>
							    <option value="DIVORCED">DIVORCED</option>
							    
							</select>														
						</div>
					</div>

					<div class="form-group">
						<div class="form-row form-row-1">
							<label class="bmd-label-floating">Date of Birth</label>
                        <input type="date" class="form-control" name="dob" required>
						</div>
						<div class="form-row form-row-1">
							<select name="gender" id="gender">
							    <option default>Select Gender</option>
							    <option value="MALE">Male</option>
							    <option value="FEMALE">Female</option>
							    
							</select>
							
							<span class="select-btn">
							  	<i class="zmdi zmdi-chevron-down"></i>
							</span>
						</div>
						
					</div>					
					<div class="form-group">
						<div class="form-row form-row-1">
							<label class="bmd-label-floating">Date of Birth</label>
                        <input type="date" class="form-control" name="dob" required>
						</div>
						<div class="form-row form-row-1">
							<select name="gender" id="gender">
							    <option default>Select Gender</option>
							    <option value="MALE">Male</option>
							    <option value="FEMALE">Female</option>
							    
							</select>
							
							<span class="select-btn">
							  	<i class="zmdi zmdi-chevron-down"></i>
							</span>
						</div>
						
					</div>
					<div class="form-group" style='margin-left:30px;margin-right:30px;'>
						<textarea  type="text" name="expectations" rows="5"  class="form-control" id="expectations" placeholder="Expectations" required></textarea>						
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<label for="pass">Qualification</label>
							<input type="text" id="education" name="education" required>
						</div>

						<div class="form-row form-row-1">
							<label for="pass">Profession</label>
							<input type="text" id="profession" name="profession" required>
						</div>
					</div>	
					<div class="form-group">
						<div class="form-row form-row-1">
							<label for="pass">Password (8 length)</label>
							<input type="password" id="pass" name="pass" minlength="8" required>
						</div>

						<div class="form-row form-row-1">
							<label for="pass">Confirm Password</label>
							<input type="password" id="cpass" name="cpass" minlength="8" required>
						</div>
					</div>					
				</div>				
				<div class="form-right">
					<h2>Contact Details</h2>
					
					<div class="form-group">
						
						<div class="form-row form-row-1">
							<input type="text" name="mno" class="phone" id="mno" placeholder="Phone Number" required>
						</div>
						<div class="form-row">
						<input type="email" name="email" id="email" class="input-text" placeholder="Email" profileImage>
					</div>
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<textarea type="text" name="address" rows="5"  class="form-control" id="address" placeholder="Address" required></textarea>
						</div>
						<div class="form-row form-row-1">
							<input type="text" id="pincode" class="Zip_Code" placeholder="Pincode" name="pincode" required>							
						</div>
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
					
					<div class="form-group">	
					<div class="form-row form-row-1">
							<input type="text" name="city" id="city" class="taluka" placeholder="City" required>
						</div>					
						<div class="form-row form-row-1">
							<select name="state" id="state">

								<?php
								
								echo "<option default>Select State</option>";
									$msdstate=$getUserDataRes['state'];                                        
																			
									for($l=0;$l<count($statesList);$l++)										
										echo "<option value='".$statesList[$l]."'>".$statesList[$l]."</option>";
								?>                                        
								</select>
						</div>						
					</div>

					<hr>
					<h2>Family Information</h2>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="fatherName" id="fatherName" class="input-text" placeholder="Father Name" required>
						</div>
						
						<div class="form-row form-row-1">
							<input type="text" name="motherName" id="motherName" class="input-text" placeholder="Mother Name" required>
						</div>
					</div>					
					
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="rsurname" id="rsurname" class="input-text" placeholder="Relative Surname" required>
						</div>
						
						<div class="form-row form-row-1">
							<input type="text" name="fcontact" id="fcontact" class="input-text" placeholder="Family Contacts" min="111111111" required>
						</div>
					</div>

					<div class="form-checkbox007s">
						<label class="container"><p>I accept to the <a href="#" class="text">Terms and Conditions</a> of your site.</p>
						  	<input type="checkbox" name="checkbox">
						  	<span class="checkmark"></span>
						</label>
					</div>
					<div class="form-row">														
						<div id="errorst" style='color:white;font-weight:bold'></div>
					</div>										
					<div class="form-row">														
						<button type="submit" name="register" class="register">Register</button>
					</div>					
					<div class="form-row">
						<div  style='color:white;font-weight:bold'>Already Registered 
						<a href="login.php" style='color:white;'> Login Here</a>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	

	<footer>
		<div class="container-fluid">
			<div class="row back" style='padding:20px;'>
				<div class="col-sm-12">
					<div class="footer-text" style='float:left;' >Get connected with us on social networks!</div>
					<div class="footer-text" style='float:right;'>
						<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
						<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
						<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
						<a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
					</div>
				</div>                    
			</div>
			<div class="row back1" style='padding:10px;'>
				<div class="col-sm-3">                 
					<div class="card" style=" background-color:transparent;border-color: transparent;">
					<div class="card-body">
						<h5 class="card-title footer-heading">
						<a href="https://shreeswayamwar.in/">
							ShreeSwayamwar.in
						</a>
							</h5>
						<p class="footer-text">
							Here you can use
							rows and columns to organize your footer content. 
							Lorem ipsum dolor sit amet, consectetur adipisicing elit.
						</p>                        
					</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="card" style="background-color:transparent;border-color: transparent;">
						<div class="card-body">
						  <h5 class="card-title footer-heading">USEFUL LINKS</h5>
						  <ul class="footer-text">
							  <li>
								  <a href="login.php" >Your Account</a>                                    
							  </li>                                  
							  <li>
								 <a href="#" >Help</a>                                    
								</li>
								<li>
								 <a href="tc.php" >Terms  & Conditions</a>
								</li>
						  </ul>
						</div>
					  </div>  
				</div>                 
				<div class="col-sm-5">
					<div class="card" style="background-color:transparent;border-color: transparent;">
						<div class="card-body">
						  <h5 class="card-title footer-heading">CONTACT</h5>                              
						  <i class="fa fa-map-marker" aria-hidden="true"> Buldhana, Maharashtra, 443001</i>
							<br/><br/>
							<i class="fa fa-envelope" aria-hidden="true"> <a href="mailto:">example@example.com</a></i>
							<br/><br/>                        
							<i class="fa fa-phone" aria-hidden="true"> 
							<a href="tel:8788126366">8788126366</a> | 
							<a href="tel:7000885494">7000885494</a>
							</i>
						</div>
					</div>                                                
				</div>
			</div>
			<div class="row back2" >
				<div class="col-sm-12">
					<div class="card-body">                            
						<p class="footer-text" align="center">
							© 2020 Copyright: <a href="https://shreeswayamwar.in/">ShreeSwayamwar.in</a>
						</p>                        
					</div>
				</div>
			</div>
		</div>
	</footer>

</body>
</html>


<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>