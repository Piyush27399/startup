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
        $gender=$_POST['gender'];
        $email=$_POST['email'];
        $mno=$_POST['mno'];
        $zodiac=$_POST['zodiac'];
        $dob=$_POST['dob'];
        $bPlace=$_POST['birthPlace'];
                     
        $pAddress=$_POST['pAddress'];        
        $pstate=$_POST['pstate'];
        $ppincode=$_POST['ppincode'];

        $cAddress=$_POST['cAddress'];
        $cstate=$_POST['cstate'];
        $cpincode=$_POST['cpincode'];
        $cAdd=$cAddress." ".$cpincode." ".$cstate;

        $age=$_POST['age'];
        $height=$_POST['height'];
        $maritalStatus=$_POST['maritalStatus']; 
        $education=$_POST['education'];
        $profession=$_POST['profession'];
        $income=$_POST['income'];  
        
        $pass=$_POST['pass'];
        $pass=md5($pass);

        $fatherName=$_POST['fatherName'];
        $motherName=$_POST['motherName'];
        $nos=$_POST['nos'];
        $mamaSurname=$_POST['mamaSurname'];         
        $mamaAddress=$_POST['mamaAddress'];                
                
        $expage=$_POST['expage'];
        $expedu=$_POST['expedu'];
        $expincome=$_POST['expincome'];
        $expdesc=$_POST['expdesc'];                        
        
	    
    $registerQuery="INSERT INTO users(fname,lname,email,password,mno,education,profession,height,age,dob,gender,
    maritalStatus,fatherName,motherName,address,state,pincode,mamaSurname,bplace,lAddress,income,horoscope,
    totalSiblings,mamaAddress,expAgeDiff,expEdu,expInc,expDesc) 
    VALUES('".$fname."','".$lname."','".$email."','".$pass."','".$mno."','".$education."','".$profession."','".$height."',
    '".$age."','".$dob."','".$gender."','".$maritalStatus."','".$fatherName."','".$motherName."','".$paddress."',
    '".$pstate."','".$ppincode."','".$mamaSurname."','".$bplace."','".$cAdd."','".$income."','".$zodiac."',
    '".$nos."','".$mamaAddress."','".$expage."','".$expedu."','".$expincome."','".$expdesc."')";
	       
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
			
			$userID=$_SESSION['userID'];

			// Image Upload after Register

			$name = $_FILES['profileImage']['name'];    
			$tmp = $_FILES['profileImage']['tmp_name'];
            $path = "images/userImage/";
            
            $gname = $_FILES['gid']['name'];    
			$gtmp = $_FILES['gid']['tmp_name'];
			$gpath = "images/gid/";
                        
			$query="UPDATE users SET image='".$name."', govtID='".$gname."' WHERE id='".$userID."'";
			$result=mysqli_query($conn,$query);
			
			if($result)
			{
                move_uploaded_file($tmp, $path.$name);
            	move_uploaded_file($gtmp, $gpath.$gname);
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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	
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
    var pstate=document.forms["registerForm"]["pstate"].value;          
    var cstate=document.forms["registerForm"]["cstate"].value;                          
    var ppincode=document.forms["registerForm"]["ppincode"].value;
    var cpincode=document.forms["registerForm"]["cpincode"].value;
	var status=document.forms["registerForm"]["maritalStatus"].value;
    var zodiac=document.forms["registerForm"]["zodiac"].value;

	var isNum=/^\d+$/.test(mno);     

	if(!isNum)
	{
		document.getElementById("errorst").innerHTML = "Enter a valid Mobile Number";
		return false;
	}	

	if(mno.length<10 || mno.length>10)
	{
		document.getElementById("errorst").innerHTML = "Enter a valid Mobile Number";
		return false;
	}
	if(ppincode.length<6 || ppincode.length>6)
	{
		document.getElementById("errorst").innerHTML = "Enter a valid Pincode in permanent Address";
		return false;
	}
        
	if(cpincode.length<6 || cpincode.length>6)
	{
		document.getElementById("errorst").innerHTML = "Enter a valid Pincode in correspondance Address";
		return false;
	}

	if (pass != cpass) {
		document.getElementById("errorst").innerHTML = "Password Not Match";
		return false;
	}
	if (pstate=="Select State") {
		document.getElementById("errorst").innerHTML = "Select Permanent Address State Properly";
		return false;
    }
    if (cstate=="Select State") {
		document.getElementById("errorst").innerHTML = "Select Correspondance Address State Properly";
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
    if (zodiac=="Select Zodiac Sign") {
		document.getElementById("errorst").innerHTML = "Select Zodiac Sign Properly";
		return false;
	}

}
</script>

</head>
<body class="form-v007">

<?php 

    include("includes/outsideNav.php")
?>

	
	<div class="page-contenttells">
		<div class="form-v007-content6tyg">
			<form class="form-detail007" method="POST" name="registerForm"  onsubmit="return verifyDetails()" enctype="multipart/form-data">
				<div class="form-left">
					<h2>Personal Information</h2>
					
					<div class="form-group">
						<div class="form-row">
							Select Profile Image
							<input type="file"  id="PROFILEIMAGE" name="profileImage" required>
						</div>
					</div>
                  
			    <div class="form-group">
								<div class="form-row form-row-1">
									<input type="text" name="fname" id="fname" class="input-text" placeholder="First Name" required>
								</div>
								<div class="form-row form-row-2">
									<input type="text" name="lname" id="lname" class="input-text" placeholder="Last Name" required>
								</div>
							</div>
							<div class="form-group">
								<div class="form-row form-row-1">
									<select name="gender" id="gender" required>
										<option default>Select Gender</option>
										<option value="male">Male</option>
										<option value="female">Female</option>
										
									</select>
								</div>
									<div class="form-row form-row-2">
										<input type="email" name="email" id="email" class="input-text" placeholder="Your Email" required>
									</div>
							</div>
							<div class="form-group">
								
								<div class="form-row form-row-1">
									<input type="text" name="mno" class="phone" id="mno" placeholder="Phone Number" required>
								</div>
								<div class="form-row form-row-2">
									<select name="zodiac" id="zodiac">
										<option default>Select Zodiac Sign</option>
										<option value="Mesha"> Mesha (Aries)(&#x2648;)</option>
										<option value="Vrushabha">Vrushabha (Taurus)(&#x2649;)</option>
										<option value="Mithuna">Mithuna (Gemini)(&#x264A;)</option>
										<option value="Karkat">Karkat (Cancer)(&#x264B;)</option>
										<option value="Simha">Simha (Leo)(&#x264C;)</option>
										<option value="Kanya">Kanya (Virgo)(&#x264D;)</option>
										<option value="Vrushchika">Vrushchika (Scorpio)(&#x264F;)</option>
										<option value="Dhanu">Dhanu (Sagittarius)(&#x2650;)</option>
										<option value="Kumbha">Kumbha (Aquarius)(&#x2652;)</option>
										<option value="Meena">Meena (Pieces)(&#x2653;)</option>
										<option value="Tula">Tula (Libra)(&#x2648;)</option>
										<option value="Makar">Makar (Capricorn)(&#x2651;)</option>										
									</select>
									</div>
							</div>
							
							
							
							<div class="form-group">
								
								<div class="form-row form-row-1">
									<label class="bmd-label-floating"> Date of Birth</label>
								<input type="date" class="form-control" name="dob" id="dob" required>
								</div>
								<div class="form-row form-row-2">
									<input type="text" name="birthPlace" class="Birth_place" id="birthPlace" placeholder="Birth Place" required>
								</div>
							</div>
						<hr>
							
					<div class="form-group">
						<div class="form-row form-row-3 ">	
								<textarea class="form-control z-depth-1" id="pAddress" name="pAddress" rows="4"   placeholder="Write Permanent Address here..."required></textarea>
						
						</div>
						</div>

						<div class="form-group">
							<div class="form-row form-row-1">
								<input type="text" name="ppincode" id="ppincode" class="Pin_Code" placeholder="Pin Code" required>
							</div>
							<div class="form-row form-row-2">
								
									<select name="pstate" id="pstate">
									<option default>Select State</option>
									<option value="Andhra Pradesh">Andhra Pradesh</option>
									<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
									<option value="Arunachal Pradesh">Arunachal Pradesh</option>
									<option value="Assam">Assam</option>
									<option value="Bihar">Bihar</option>
									<option value="Chandigarh">Chandigarh</option>
									<option value="Chhattisgarh">Chhattisgarh</option>
									<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
									<option value="Daman and Diu">Daman and Diu</option>
									<option value="Delhi">Delhi</option>
									<option value="Lakshadweep">Lakshadweep</option>
									<option value="Puducherry">Puducherry</option>
									<option value="Goa">Goa</option>
									<option value="Gujarat">Gujarat</option>
									<option value="Haryana">Haryana</option>
									<option value="Himachal Pradesh">Himachal Pradesh</option>
									<option value="Jammu and Kashmir">Jammu and Kashmir</option>
									<option value="Jharkhand">Jharkhand</option>
									<option value="Karnataka">Karnataka</option>
									<option value="Kerala">Kerala</option>
									<option value="Madhya Pradesh">Madhya Pradesh</option>
									<option value="Maharashtra">Maharashtra</option>
									<option value="Manipur">Manipur</option>
									<option value="Meghalaya">Meghalaya</option>
									<option value="Mizoram">Mizoram</option>
									<option value="Nagaland">Nagaland</option>
									<option value="Odisha">Odisha</option>
									<option value="Punjab">Punjab</option>
									<option value="Rajasthan">Rajasthan</option>
									<option value="Sikkim">Sikkim</option>
									<option value="Tamil Nadu">Tamil Nadu</option>
									<option value="Telangana">Telangana</option>
									<option value="Tripura">Tripura</option>
									<option value="Uttar Pradesh">Uttar Pradesh</option>
									<option value="Uttarakhand">Uttarakhand</option>
									<option value="West Bengal">West Bengal</option>
									</select>
							</div>
						</div>
						<!--
						  <div class="form-group">
							<div class="form-row form-row-3">
								<div class="form-checkbox007ee">
									<label class="container"><p>I do accept the  of your site.</p>
										  <input type="checkbox" id="myCheck" name="checkbox">
										  <span class="checkmark"></span>
									</label>
								</div>
						</div>
						</div>
						-->                        
						<div class="form-group">
							<div class="form-row form-row-1">
								<label class="container">Same as Permanent 
									<input type="checkbox" id="pcheck">
									<span class="checkmark"></span>
								  </label>
							</div>
						</div>
					<div class="form-group">
						<div class="form-row form-row-3">

								<textarea class="form-control z-depth-1" id="cAddress" name="cAddress" rows="4" placeholder="Correspondence Address"></textarea>
							 
					</div>
					</div>
					
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="cpincode" id="cpincode" class="Pin_Code" placeholder="Pin Code" required>
						</div>
						<div class="form-row form-row-2">
							
								<select name="cstate" id="cstate" required>
								<option default>Select State</option>
								<option value="Andhra Pradesh">Andhra Pradesh</option>
								<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
								<option value="Arunachal Pradesh">Arunachal Pradesh</option>
								<option value="Assam">Assam</option>
								<option value="Bihar">Bihar</option>
								<option value="Chandigarh">Chandigarh</option>
								<option value="Chhattisgarh">Chhattisgarh</option>
								<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
								<option value="Daman and Diu">Daman and Diu</option>
								<option value="Delhi">Delhi</option>
								<option value="Lakshadweep">Lakshadweep</option>
								<option value="Puducherry">Puducherry</option>
								<option value="Goa">Goa</option>
								<option value="Gujarat">Gujarat</option>
								<option value="Haryana">Haryana</option>
								<option value="Himachal Pradesh">Himachal Pradesh</option>
								<option value="Jammu and Kashmir">Jammu and Kashmir</option>
								<option value="Jharkhand">Jharkhand</option>
								<option value="Karnataka">Karnataka</option>
								<option value="Kerala">Kerala</option>
								<option value="Madhya Pradesh">Madhya Pradesh</option>
								<option value="Maharashtra">Maharashtra</option>
								<option value="Manipur">Manipur</option>
								<option value="Meghalaya">Meghalaya</option>
								<option value="Mizoram">Mizoram</option>
								<option value="Nagaland">Nagaland</option>
								<option value="Odisha">Odisha</option>
								<option value="Punjab">Punjab</option>
								<option value="Rajasthan">Rajasthan</option>
								<option value="Sikkim">Sikkim</option>
								<option value="Tamil Nadu">Tamil Nadu</option>
								<option value="Telangana">Telangana</option>
								<option value="Tripura">Tripura</option>
								<option value="Uttar Pradesh">Uttar Pradesh</option>
								<option value="Uttarakhand">Uttarakhand</option>
								<option value="West Bengal">West Bengal</option>
								</select>
						</div>
					</div>
					<hr>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="number" name="age" class="age" id="age" placeholder="Age" min="18" required>
						</div>
						<div class="form-row form-row-2">
							<input type="number" name="height" class="height" id="height" step="any" min="0.1" placeholder="Height" required>
						</div>
					</div>
				
					
				
					<div class="form-group">						
						<div class="form-row form-row-1">							
							<select name="maritalStatus" id="maritalStatus" required>
								<option default>Select Marital Status</option>
								<option value="NEVER MARRIED">NEVER MARRIED</option>
								<option value="DIVORCED">DIVORCED</option>
								
							</select>
							
							<span class="select-btn">
							  	<i class="zmdi zmdi-chevron-down"></i>
							</span>
						</div>
						<div class="form-row form-row-2">
							<input type="text" name="education" id="education" class="input-text" placeholder="Qualification" required>
						</div>
					</div>

					<div class="form-group">
						
						<div class="form-row form-row-1">
							<input type="text" name="profession" id="profession" class="input-text" placeholder="Profession" required>
						</div>
						<div class="form-row form-row-2">
							<input type="number" name="income" id="income" min="0" class="input-text" placeholder="Income" required>
						</div>
					</div>
					<hr>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="password" id="pass" name="pass" minlength="2" placeholder="Password" required>
						</div>

						<div class="form-row form-row-2">
							<input type="password" id="cpass" name="cpass" minlength="2" placeholder="Confirm Password" required>
						</div>
						
					</div>
					

						</div>
						<div class="form-right">
							<h2>Family Information</h2>
							<div class="form-group">
								<div class="form-row form-row-1">
									<input type="text" name="fatherName" id="fatherName" class="input-text" placeholder="Father Name" required>
								</div>
								
								<div class="form-row form-row-3">
									<input type="text" name="motherName" id="motherName" class="input-text" placeholder="Mother Name" required>
							</div>
						</div>											
						<div class="form-group">					
                            <div class="form-row form-row-1">
                                <input type="number" name="nos" class="Sister_M" id="nos" placeholder="No of Siblings"  required>
                            </div>
                            <div class="form-row form-row-3">
							<input type="text" name="mamaSurname" id="mamaSurname" class="input-text" placeholder="Mama Surname" >
						</div>
						</div>

						<div class="form-group">
					
						
						<div class="form-row">														
							<textarea class="form-control z-depth-1" id="mamaAddress" name="mamaAddress" rows="3" placeholder="Mama Address"></textarea>							
						</div>
					  </div>
    
							<div class="form-right">
								<h2>Expectations</h2>
								<div class="form-group">
									<div class="form-row form-row-1">
										<input type="number" name="expage" class="Age_difference" id="expage" placeholder="Age Difference"  >
									</div>	
                                    <div class="form-row form-row-1">
									<input type="text" name="expedu" id="expedu" class="input-text" placeholder="Education" >
								</div>								
								</div>
							</div>
							<div class="form-group">																
								<div class="form-row form-row-3">
									<input type="text" name="expincome" id="expincome" class="input-text" placeholder="Income" >
								</div>
                                <div class="form-row form-row-2">
                                <textarea class="form-control z-depth-1" id="expdesc" name="expdesc" rows="4" placeholder="Describe Expectations"></textarea>
								</div>                                
						
							</div>																														
					 		<div class="form-group">
								<div class="form-row">
									<span class="label other">Upload Verified government ID (Aadhar Card, Voter ID)</span>
									<input type="file"  id="GID" name="gid" required>
									<p style="font-family:georgia,garamond,serif;font-size:16px;color:white;">
                                        Do Not Upload Fake Document, Else your profile will be discarded.
                                    </p>
								</div>
							</div>
							<div class="form-checkbox007s">
								<label class="container"><p>I do accept the <a href="tc.php" target="_blank" class="text">Terms and Conditions</a> of your site.</p>
									<input type="checkbox" id="agree" name="agree">
									<span class="checkmark"></span>
								</label>
							</div>
                            <div class="form-group">
								<div class="form-row">
                                <div id="errorst" style='color:white;font-weight:bold;'></div>
								</div>
							</div>                            
							<div class="form-row-last007pops">
								<button type="submit" name="register" class="register">Register</button><br/>
								<label style="font-family:georgia,garamond,serif;font-size:19px;font-style:bord;color:rgb(252, 250, 250);">Already Register</label>
								<a type="button" href="login.php" class="btn btn-secondary">Log in</a>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

			<?php include("includes/footer.php"); ?>

	
</body>
</html>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>