<?php

  require_once("includes/conn.php");
  session_start();
  if(empty($_SESSION))
  {
    header("location:login.php");
  }

  include("includes/checkMem.php");

  
  $userID=$_GET['userID'];
  $curUserID=$_SESSION['userID'];
  if($userID==$curUserID)
  {}
  
  else if($isMember!=1)
      header("location:dashboard.php");
      
  else if($userID=="" || $userID==0)
    header("location:dashboard.php");    

$getUserData="SELECT fname,lname,education,profession,height,age,dob,gender,
  maritalStatus,fatherName,motherName,address,state,pincode,mamaSurname,image,
  bplace,lAddress,income,horoscope,totalSiblings,mamaAddress,expAgeDiff,expEdu,expInc,expDesc
    FROM users WHERE id='".$userID."'";

  $getUserDataResult=mysqli_query($conn,$getUserData);
  if(!mysqli_num_rows($getUserDataResult)>0)
    echo "<script>alert('Error. Try Again..');</script>";
  

?>

<html>

<head>
    <title>Profile</title>

    <meta charset="utf-8">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
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

    </style>

</head>

<body>

        <?php
          include("includes/insideNav.php");
        ?>


    <div class="container-fluid" style='padding:20px;user-select: none;'>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="card profileCard">
                    <div class="card-header profileCardHeader img-fluid">
                    <?php
                        $res=mysqli_fetch_assoc($getUserDataResult);
                        $image="images/download.jpeg";
                        if($res['image']!="")
                            $image="images/userImage/".$res['image'];
                    ?>
                        <p align="center">                        
                            <img src=<?php echo "'".$image."'";?> alt="" class="img-fluid" width="130" height="130"
                                style='border-radius: 100px;
                                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);   '
                            >
                            <br/>                                                        
                        </p>
                        <h3>
                            <p align="center" class="whiteFont">
                                <?php echo $res['fname']." ".$res['lname'];?>
                            </p>
                        </h3>

                        <div class="row">
                            <div class="col-sm-12">

                            </div>
                        </div>

                    </div>
                    <div class="card-body" style='padding: 40px;background-color: 	#e19d45;'>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-4" style='margin-top: 10px;'>
                                    <h5 class="bodyHead">Personal Details</h5>
                                    Name: <?php echo $res['fname']." ".$res['lname']."<br/>";
                                        echo "Age: ".$res['age']." yrs<br/>";
                                        echo "Height: ".$res['height']." ft<br/>";
                                        echo "Gender: ".$res['gender']."<br/>";
                                        echo "Birth Date: ".$res['dob']."<br/>";
                                    ?>
                                </div>                                
                                <div class="col-sm-4" style='margin-top: 10px;'>
                                    <h5 class="bodyHead">Education & Profession</h5>
                                    <?php
                                        echo "Education: ".$res['education']."<br/>";
                                        echo "Profession: ".$res['profession']."<br/>";  
                                        echo "Income: ".$res['income']."<br/>";                                        
                                    ?>                                    
                                </div>
                                <div class="col-sm-4" style='margin-top: 10px;'>
                                    <h5 class="bodyHead">Family</h5>
                                    <?php 
                                        echo "Father: ".$res['fatherName']."<br/>";
                                        echo "Mother: ".$res['motherName']."<br/>";
                                        echo "Mama Surname: ".$res['mamaSurname']."<br/>";
                                        echo "Mama Address: ".$res['mamaAddress']."<br/>";                                                                
                                        
                                    ?>
                                </div>
                                <div class="col-sm-4" style='margin-top: 10px;'>
                                    <h5 class="bodyHead">Contact Details</h5>
                                    <?php echo $res['email']."<br/>";
                                        echo "Mobile : ".$res['mno']."<br/><br/>";
                                        echo "Permanent Address: ".$res['address']." ".$res['state']." ".$res['pincode']."<br/><br/>";
                                        echo "Local Address: ".$res['lAddress']."<br/>";
                                        
                                    ?>
                                </div>
                                <div class="col-sm-8" style='margin-top: 10px;'>
                                    <h5 class="bodyHead">Expectations</h5>
                                    <p align="justify">
                                    <?php
                                        echo "Age Difference: ".$res['expAgeDiff']."<br/>";
                                        echo "Income: ".$res['expInc']."<br/>";
                                        echo "Education: ".$res['expEdu']."<br/>";
                                        echo "Description: ".$res['expDesc']."<br/>";
                                    ?>
                                    </p>
                                </div>
                                <div class="col-sm-12" style='margin-top: 100px;'>
                                    <p align="center">
                                        <img src="images/footerborderup.png" width="450" ><br/>
                                        <a href="index.php" target="_blank">
                                            ShreeSwayamwar.in
                                        </a><br/>
                                        <img src="images/footerborderdown.png" width="300">
                                    </p>
                                </div>
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