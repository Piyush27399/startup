<?php

    require_once("conn.php");
    session_start();
    session_destroy();
    header("location:https://trgcool.000webhostapp.com/startup/login.php");
?>