<?php

  require_once("includes/conn.php");
  session_start();
  if(empty($_SESSION))
  {
    header("location:login.php");
  }

  include("includes/checkMem.php");
  
  $fname="";
    $lname="";
    $gender="";
    $age="";
    $state="";
    $dob="";
    $height="";
    $maritalStatus="";
  
    if(isset($_GET['fname'])) {
        $fname=$_GET['fname'];
    }
    if(isset($_GET['lname'])) {
        $lname=$_GET['lname'];
    }
    if(isset($_GET['gender'])) {
        $gender=$_GET['gender'];
    }
    if(isset($_GET['age'])) {
        $age=$_GET['age'];
    }
    if(isset($_GET['state'])) {
        $state=$_GET['state'];
    }
    if(isset($_GET['dob'])) {
        $dob=$_GET['dob'];
    }
    if(isset($_GET['height'])) {
        $height=$_GET['height'];
    }
    if(isset($_GET['maritalStatus'])) {
        $maritalStatus=$_GET['maritalStatus'];
    }
/*
    $fname=$_GET['fname'];
    $lname=$_GET['lname'];
    $gender=$_GET['gender'];
    $age=$_GET['age'];
    $state=$_GET['state'];
    $dob=$_GET['dob'];
    $height=$_GET['height'];
    $maritalStatus=$_GET['maritalStatus'];*/
    
    
    $isAdded=0;

  
?>

<html>

<head>
    <title>Home</title>

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
        select {
            padding: 8px;
            border-radius: 3px;
        }
        .dashCardBody
        {
            text-align: center;
            font-size: 12px;
        }        
        label
        {
            font-size:15px;
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

            var listdob = [];
            for (var i = 1960; i <= 2100; i++) {
                listdob.push(i);
            }            

            var seldob = document.getElementById('dobList');
            for(var i = 0; i < listdob.length; i++) {
                var optdob = document.createElement('option');
                optdob.innerHTML = listdob[i];
                optdob.value = listdob[i];
                seldob.appendChild(optdob);
            }

        });

    </script>
</head>

<body>

        <?php
          include("includes/insideNav.php");
        ?>



<!-- Filters Modal -->
<div class="modal fade" id="filters" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Search Filters</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

        <div class="modal-body">                    
                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">                                        
                                        <input type="text" class="form-control" id="fname" placeholder="First Name" name="fname" value='<?php echo $fname;?>'>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">                                    
                                        <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" value='<?php echo $lname;?>'>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <select class="form-control" name="age" id="ageList">
                                            <option default>Select Age</option>                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <select class="form-control" name="gender" id="genderList">
                                            <option default>Select Gender</option>
                                            
                                            <option value="MALE">Male</option>
                                            <option value="FEMALE">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <select class="form-control" name="height" id="heightList">
                                            <option default>Select Height</option>
                                            <option value="4">4 ft</option>
                                            <option value="5">5 ft</option>
                                            <option value="6">6 ft</option>
                                            <option value="7">7 ft</option>
                                            <option value="8">8 ft</option>
                                            <option value="9">9 ft</option>
                                            <option value="10">10 ft</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">     
                                <div class="form-group">
                                    <select class="form-control" name="maritalStatus" id="msList">
                                        <option default>Marital Status</option>
                                        <option value="NEVER MARRIED">Never Married</option>
                                        <option value="DIVORCED">Divorced</option>
                                    </select>
                                    </div>
                                </div>                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <select class="form-control" name="dob" id="dobList">
                                            <option default>Select Birth Year</option>
                                        </select>
                                    </div>
                                </div>                                                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <select class="form-control" name="state" id="stateList">                     
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
                            </div>                         

        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>        
        <button type="submit" class="btn btn-primary">Search</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- Filters Modal -->



<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Alert</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        You are Not Subscribed to any of the Membership Plan. Buy a Membership Plan to View this profile<br/>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <a href="mships.php" class="btn btn-success">Buy Memberships</a>
      </div>
    </div>
  </div>
</div>

    <div class="container-fluid" style='padding:20px;'>
        <div class="row">
            <div class="col-sm-8"></div>
            <div class="col-sm-2"> 
                <button class="btn btn-success" data-toggle='modal' data-target="#filters">
                <i class="fa fa-search" aria-hidden="true"></i> Search Filters</button>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-success" href="edit_profile.php" style='color:white'>
                <i class="fa fa-edit" aria-hidden="true"></i> Edit Profile</a>
            </div>
        </div>
    </div> 
    
    <div class="container-fluid" style='padding:30px;background-color:#F5F5F5;'>
        <div class="row">            
            <div class="col-sm-12">
                    <p align="center"  class="btn-danger">
                    <?php
                        if($isMember!=1)
                        {
                    ?>
                        You are Not Subscribed to any of the Membership Plan
                            <br/>Buy a Membership Plan to Enjoy Benefits<br/>
                        
                        <?php
                        }
                    ?>
                    </p>
            </div>
                    <?php
                                                                                                
                        $search="SELECT id,fname,lname,age,gender,education,profession,state,image FROM users";

                        if($fname!="")
                        {
                            if($isAdded==1)
                            {
                                $search.=" AND fname='".$fname."'";
                            }              
                            else
                            {
                                $search.=" WHERE fname='".$fname."'";
                                $isAdded=1;
                            }
                        }
                        if($lname!="")
                        {
                            if($isAdded==1)
                            {
                                $search.=" AND lname='".$lname."'";
                            }              
                            else
                            {
                                $search.=" WHERE lname='".$lname."'";
                                $isAdded=1;
                            }
                        }
                        if($gender!="Select Gender" && $gender!="")
                        {
                            if($isAdded==1)
                            {
                                $search.=" AND gender='".$gender."'";
                            }              
                            else
                            {
                                $search.=" WHERE gender='".$gender."'";
                                $isAdded=1;
                            }
                        }
                        if($age!="Select Age" && $age!="")
                        {
                            if($isAdded==1)
                            {
                                $search.=" AND age='".$age."'";
                            }              
                            else
                            {
                                $search.=" WHERE age='".$age."'";
                                $isAdded=1;
                            }
                        }
                        if($state!="Select State" && $state!="")
                        {
                            if($isAdded==1)
                            {
                                $search.=" AND state='".$state."'";
                            }              
                            else
                            {
                                $search.=" WHERE state='".$state."'";
                                $isAdded=1;
                            }
                        }
                        if($dob!="Select Birth Year" && $dob!="")
                        {
                            if($isAdded==1)
                            {
                                $search.=" AND dob LIKE '".$dob."%'";
                            }              
                            else
                            {
                                $search.=" WHERE dob LIKE '".$dob."%'";
                                $isAdded=1;
                            }
                        }
                        if($height!="Select Height" && $height!="")
                        {
                            if($isAdded==1)
                            {
                                $search.=" AND height LIKE '".$height."%'";
                            }              
                            else
                            {
                                $search.=" WHERE height LIKE '".$height."%'";
                                $isAdded=1;
                            }
                        }
                        if($maritalStatus!="Marital Status" && $maritalStatus!="")
                        {
                            if($isAdded==1)
                            {
                                $search.=" AND maritalStatus='".$maritalStatus."'";
                            }              
                            else
                            {
                                $search.=" WHERE maritalStatus='".$maritalStatus."'";
                                $isAdded=1;
                            }
                        }
                                                
                        $searchResults=mysqli_query($conn,$search);
                        if(mysqli_num_rows($searchResults)>0)
                        {                            
                            while($searchRes=mysqli_fetch_assoc($searchResults))
                            {
                                                           
                    ?>                    

                    <div class="col-sm-2 col-lg-2" style='padding: 5px;'>
                                    <div class="card">
                                        <div class="card-body" style='padding: 0%;'>
                        <p align="center">
                        <?php 
                                $image="images/download.jpeg";
                                if($searchRes['image']!="")
                                    $image="images/userImage/".$searchRes['image'];
                        ?>
                            <img src='<?php echo $image;?>'  width="100" height="100"
                                style='border-radius: 100px;
                                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                                margin-top:25px;'                                
                            >
                            <br/>
                            <h5 style='text-align:center;padding:4px;'><?php echo $searchRes['fname']." ".$searchRes['lname']; ?></h5>
                        </p>                        
                        <p class="dashCardBody">
                            Age : <?php echo $searchRes['age']." yrs"; ?><br/>
                            Education : <?php echo $searchRes['education']; ?><br/>
                            Profession : <?php echo $searchRes['profession']; ?><br/>
                            State : <?php echo $searchRes['state']; ?><br/><br/>

                            <?php $link="profile.php?userID=".$searchRes['id']; 
                            
                                if($isMember!=1)
                                    echo "<a type='button' target='_blank' class='btn' data-toggle='modal' style='color:blue;' data-target='#exampleModalCenter'>View Profile</a>";
                                else
                                    echo "<a href='$link' target='_blank' class='btn btn-default'>View Profile</a>";
                            ?>
                        </p>    
                        </div>
                </div>            
            </div>
            
                        <?php


                            }

                            ?>
                               
                           <!-- <div class="col-sm-12">
                            <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                        </nav>
                        </div>-->
                            <?php
                        }
                        else{
                          echo "No Profiles Found</p>";
                        }
                        ?>                                                                                   

    </div>        
</div>
<!--
<script type="text/javascript">
    $(window).on('load',function(){
        $('#welcome').modal('show');
    });
</script>


<div class="modal fade" id="welcome" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>-->


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