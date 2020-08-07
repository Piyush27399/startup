<?php
     define('DB_SERVER','localhost');
     define('DB_USER','id14162520_root');
     define('DB_PASS' ,'Lolipp@12355d');
     define('DB_NAME', 'id14162520_mydb');
     
     $conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
     // Check connection
     if (mysqli_connect_errno())
     {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
     }
?>