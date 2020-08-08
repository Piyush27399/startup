<?php
     define('DB_SERVER','localhost');
     define('DB_USER','shreeswa_shreeswa');
     define('DB_PASS' ,'Databaseforshree@2020');
     define('DB_NAME', 'shreeswa_shreeswa');
     
     $conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
     // Check connection
     if (mysqli_connect_errno())
     {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
     }
?>