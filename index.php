<?php

  require_once("includes/conn.php");
  session_start();

  if(isset($_POST['send']))
  {    
    $email=$_POST['email'];
    $msg=$_POST['msg'];    
    $userID="0";
    $status="OPEN";
    $subject="000";
        
    $contactQuery="INSERT INTO contact(userID,email,subject,msg,status) VALUES('".$userID."','".$email."','".$subject."','".$msg."','".$status."')";
    
    $contactQueryRes=mysqli_query($conn,$contactQuery);
    if($contactQueryRes)
      echo "<script>alert('Success. We will contact you as soon as possible.');</script>";

    else
      echo "<script>alert('Failed to send.\n Try Again..');</script>";

  }

?>


<html>
    <head>
        <title>Home</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/index.css">
        <link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
        <link rel="stylesheet" href="css/card3.css" />                

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>        
        
        <script type="text/javascript">
          function btnClicked()
          {            
            location.href='https://shreeswayamwar.in/shree/login.php';
          }          
        </script>

        <style>
             html {
  scroll-behavior: smooth;  
}
   
          .memCardTitle
          {
            font-weight: bold;
            text-align: center;
            font-family: headingFont;            
          }
        </style>
      

    </head>    
    <body>
     
            
    
<?php
  include("includes/outsideNav.php");
?>

<!-- Modal -->
<div class="modal fade" id="agreePop" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Notification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        दंडवत प्रणाम.... यह वेबसाईटस सिर्फ महानुभाव पंथीय भोपे पुजारी समाज के लिए है... 🙏🏻🙏🏻🙏🏻<br/><br/>
        Dandwat Pranam.... This website is only for Mahanubhav Pantiy Bhope Pujari Community... 🙏🏻🙏🏻🙏🏻<br/><br/>
        दंडवत प्रणाम.... ही वेबसाइट फक्त महानुभाव पंथीय भोपे पुजारी समाजासाठी आहे...🙏🏻🙏🏻🙏🏻
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="btnClicked()" class="btn btn-success">Agree</button>        
      </div>
    </div>
  </div>
</div>

          <div style='background-image:url("images/biel-morro-kcKiBcDTJt4-unsplash.jpg");width:100%;height:100%'>                      
            <center>
              <img class="img-fluid" src="images/Jai-Krishni-Pantha-started-by-Sarvadnya-Shri-Chakradhar-Swami-in-1267-Five-incarnations-of-God-Namo-Panch-Krishna-Avatar-DandvatPranam.jpg"
               style='padding-top:150px;padding-left: 10px;padding-right: 10px;'>
              <h2 class="text headFont" style='padding-top:15px;'>Matrimony is the union of meanness and martyrdom.</h2>
              <button class="buttonWhite" data-toggle="modal" data-target="#agreePop">Login</button>              
            </center>
          </div>          

          <div class="heading" id="story">
              <h1 class="headFont">Tribute</h1><br/>

          <h5><q>मला चांगले संस्कार आणि आयुष्य दिल्याबद्दल ही वेबसाइट माझ्या आजी आजोबांना समर्पित करत आहे</q>
            <br/>-प्रसाद चोरमारे
          </h5><br/>
              <div class="container" style='margin-top: 30px;'>
              <div class="row">
                <div class="col-sm-3"></div>                
                <div class="col-sm-3">                      
                    <div class="card">
                      <img class="card-img-top" src="images/dadaji.jpg" width="100" height="250">
                      <div class="card-body">
                        <h5 class="card-title">
                          श्री. प्रभाकर कृष्णराव चोरमारे</h5>
                        <p class="card-text"></p>                        
                      </div>
                    </div>                                        
                  </div>  
                  <div class="col-sm-3">                                          
                    <div class="card">
                      <img class="card-img-top" src="images/dadiji.jpg" width="100" height="250">                      
                      <div class="card-body">
                        <h5 class="card-title">स्व. बाळाबाई प्रभाकर चोरमारे</h5>
                        <p class="card-text"></p>                        
                      </div>
                    </div>                    
                  </div>                                       
              </div>                 
            </div>           
          </div>

          <div class="heading" id="features">
              <h1 class="headFont">Features</h1>              
              <div class="container" style='padding:20px;'>
                <div class="row">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-2 col-md-2 col-lg-2">
                    <img src="images/animation_200_kcx7ij0n.gif" width="120" height="120">
                    <p>View Unlimited Profiles</p>
                  </div>                
                  <div class="col-sm-2 col-md-2 col-lg-2">
                  <img src="images/animation_200_kcx7nizs.gif" width="120" height="120" style='padding:40px;'>
                    <p>Genuine Profiles</p>
                  </div>                
                  <div class="col-sm-2 col-md-2 col-lg-2">
                  <img src="images/animation_200_kcymikmd.gif" width="120" height="120">
                    <p>Affordable Membership Plans</p>
                  </div>                  
                  <div class="col-sm-2 col-md-2 col-lg-2">
                  <img src="images/animation_200_kcx7txj2.gif" width="120" height="120" style='padding:20px;'>
                    <p>24/7 Customer Support</p>
                  </div>                  
                </div>                
              </div>
          </div>

          
            <h1 class="headFont heading" id="">Membership Plans</h1>
            <div class="container">
              <div class="row">
                <div class="col-sm-2"></div>
              <div class="col-sm-4">
              <div class="card text-white bg-dark mb-3">
                <div class="card-body" style='padding:40px;'>
                  <h2 class="card-title memCardTitle">Standard</h2>
                  <p class="card-text" style='margin-top: 30px;' align="center">                    
                    View Unlimited Profiles<br/>                    
                          Various Search Filters<br/>                          
                          Customer Support<br/>
                          Duration : 180 Days
                  </p>
                  <center>
                    <button class="buttonWhite" style='margin-top:20px;margin-bottom: 0;padding-top: 2;padding-bottom: 2;' disabled>
                      Rs 149/-
                    </button>
                  </center>
                </div>
              </div>
              </div>              
              
              <div class="col-sm-4">
                <div class="card text-white bg-danger mb-3">
                  <div class="card-body" style='padding:40px;'>
                    <h2 class="card-title memCardTitle">Pro</h2>
                    <p class="card-text" style='margin-top: 30px;' align="center">                      
                          View Unlimited Profiles<br/>                    
                          Various Search Filters<br/>                          
                          Customer Support<br/>
                          Duration : 360 Days             
                    </p>
                    <center><button class="buttonWhite" style='margin-top:20px;margin-bottom: 0;padding-top: 2;padding-bottom: 2;' disabled>
                              Rs 229/-
                            </button>
                    </center>
                  </div>
                </div>
              </div>
              </div>              
            </div>
        
            <h1 class="headFont heading" id="contact">Contact Us</h1>
            <div class="container">
              <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                  <form method="POST">
                    <div class="form-group">                      
                      <input type="email" class="form-control" name="email" placeholder="Enter email" required>                      
                    </div>
                    <div class="form-group">                      
                      <textarea class="form-control" name="msg" rows="5" placeholder="Write to us..." required></textarea>
                    </div>
                    <button type="submit" name="send" class="buttonBlack">Send</button>
                  </form>
                </div>
              </div>
            </div>         
          
       <!--     <div class="container_piyus">
              <div class="container"> 
            <div class="row">
            
              <div class="col-cm-6">
              </div>
              <div class="col-sm-4">
              
                  <section class="card">
                  <div class="card_inner">
                    <div class="card_inner__circle">
                      <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/rocket.png"/>
                    </div>
                    <div class="card_inner__header">
                      <img src="http://www.pixeden.com/media/k2/galleries/343/002-city-vector-background-town-vol2.jpg"/>
                    </div>
                    <div class="card_inner__content">
                      <div class="title">Standard</div>
                      <div class="price">Rs.149</div>
                      <div class="text">
                          <div id=menuli><h1><ul><li>View Unlimited Profiles</li><br>
                                            <li>Various Search Filters</li><br>
                                            <li>Customer Support</li><br>
                                            <li>Duration : 180 Days</li><br>
                                        </ul></h1>
                          </div>
                        </div>
                    </div>
                    <div class="card_inner__cta">
                      <button>
                        <span>Buy now</span>
                      </button>
                    </div>
                  </div>
                </section>
              </div>

            <div class="col-sm-4">
            <section class="card">
          <div class="card_inner">
            <div class="card_inner__circle">
              <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/paperplane.png"/>
            </div>
            <div class="card_inner__header">
              <img src="http://7428.net/wp-content/uploads/2013/06/Forest-Creek.jpg"/>
            </div>
            <div class="card_inner__content">
              <div class="title">Pro</div>
              <div class="price">Rs.249</div>
              <div class="text">
                  <div id=menuli>
                      <h1>
                          <ul>                          
                              <li>View Unlimited Profiles</li><br>
                                <li>Various Search Filters</li><br>
                              <li>Customer Support</li><br>
                              <li>Duration : 365 Days</li><br>
                          </ul>
                      </h1>
                 </div>
               </div>
              </div>
            </div>
            <div class="card_inner__cta">
              <button>
                <span>Buy now</span>
              </button>
            </div>
          </div>
 </section>
            </div>
            </div>
          
          </div></div>-->


            <h1 class="headFont heading" id="about">About Us</h1>
            <div class="container">
              <div class="row">      

              
              <div class="col-sm-4"></div>
              <div class="col-sm-4">
                <div class="card text-white bg-dark mb-3" > 
                  <div class="card-body" style='padding:0px;'>                    
                    <img src="images/prasad.JPG" alt="Avatar" style="width:100%">
                    <p class="card-text" style='margin-top: 30px;' align="center">                                                
                          Prasad Digambar Chormare</br>
                          B.E. CSE</br>
                          8788126366</br>
                          Buldhana Maharashtra, 443001
                      </br>

                    </p>
                  </br>                    
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