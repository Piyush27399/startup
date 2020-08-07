<?php

  require_once("includes/conn.php");
  session_start();
  if(empty($_SESSION))
  {
    header("location:login.php");
  }

  $userID=$_SESSION['userID'];

  include("includes/checkMem.php");

?>

<html>

<head>
    <title>Membership</title>

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
        .card {
            margin: 20px;
        }

        select {
            padding: 8px;
            border-radius: 3px;
        }
    </style>

</head>

<body>

        <?php
          include("includes/insideNav.php");
        ?>       

            <h1 class="headFont heading" id="">Membership Plans</h1>
            <div class="container">
              <div class="row">
                <div class="col-sm-2"></div>

                <?php 
                
                  $sel="SELECT * FROM plans";
                  $selRes=mysqli_query($conn,$sel);
                  while($getSel=mysqli_fetch_assoc($selRes))
                  {
                ?>

                  <div class="col-sm-4">
                    <?php 
                      if($getSel['type']=="STANDARD")
                      {
                    ?>
                      <div class="card text-white bg-dark mb-3">
                      <?php }
                      else
                      {?>
                        <div class="card text-white bg-danger mb-3">
                    <?php }
                    ?>


                    <div class="card-body" style='padding:40px;'>
                      <h2 class="card-title headFont" style='text-align:center;'><?php echo $getSel['type']?></h2>
                      <p class="card-text" style='margin-top: 30px;' align="center">                    
                      <?php echo $getSel['des'];?>
                      </p>

                      <?php

                        $src="buyMem?planID=".$getSel['planID'];

                        $dis="";
                        if($isMember==1)
                          $dis="disabled";
                      ?>
                      <center>
                        <button class="buttonWhite" 
                        style='margin-top:20px;margin-bottom: 0;padding-top: 2;padding-bottom: 2;'
                        onclick="window.location.href='<?php echo $src;?>';"
                        <?php echo $dis;?>
                        >
                          Rs <?php echo $getSel['amount']?>/-
                        </button>
                      </center>
                    </div>
                  </div>
                  </div>
                  <?php
                  }?>
                                     
            </div>
            </div>


            <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            Membership Details
                            <br/>
                            <span style='font-size:12'>Row marked in green is current membership</span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive-md">
                            <table class="table">
                                <thead>                                                                      
                                    <?php
                                      if(!$isMember==1)
                                      {
                                        echo "<tr>";
                                          echo "<th scope='col'></th>";
                                          echo "<th scope='col'>Nothing to show</th>";
                                        echo "</tr>";
                                      }
                                      else
                                      { ?>
                                      <tr>
                                        <th scope="col">PlanID</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Duration</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">End Date</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                    <?php                                 
                                    while($res=mysqli_fetch_assoc($checkMemeOrNotRes))
                                    {    
                                      
                                      if($res['status']=="SUCCESS")
                                        echo "<tr class='bg-success'>";
                                      else
                                        echo "<tr>";

                                        echo "<th scope='col'>".$res['planID']."</th>";
                                        echo "<th scope='col'>".$res['type']."</th>";
                                        echo "<th scope='col'>".$res['duration']."</th>";
                                        echo "<th scope='col'>".$res['sdate']."</th>";
                                        echo "<th scope='col'>".$res['edate']."</th>";
                                        echo "<th scope='col'>".$res['status']."</th>";
                                        echo "</tr>";
                                    }
                                      }
                                    ?>

                                    
                                </thead>
                                <tbody>                                    
                                </tbody>
                            </table>
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