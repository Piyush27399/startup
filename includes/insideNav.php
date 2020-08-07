<nav class="navbar navbar-expand-lg sticky-top  navbar-dark back1">
<a class="navbar-brand" >
    <img src="images/logo.png" width="50" height="50">
</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link"  href="dashboard.php">Dashboard <span class="sr-only">(current)</span></a>
        </li>                  
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          My Account
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style='background-color: white;'>          
          <a class="dropdown-item" href="edit_profile.php">
            <i class="fa fa-user-circle" aria-hidden="true" style='color:black;'></i>
            <font color="#000000">Profile</font>
          </a>
          <a class="dropdown-item" href="mships.php">
            <i class="fa fa-dollar" aria-hidden="true" style='color:black;'></i>
            <font color="#000000">Membership</font>
          </a>

          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="includes/logout.php">
            <i class="fa fa-sign-out" aria-hidden="true" style='color:black;'></i>
            <font color="#000000">Logout</font>
          </a>
        </div>
      </li>                   
    </ul>
</div>
</nav>