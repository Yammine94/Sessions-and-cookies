<?php

    session_start();

    if($_SESSION){
        echo "You are logged in as ".$_SESSION['email']."!";
    } else {
        header("Location: http://yammine94webdev-com.stackstaging.com/MySQL/index.php");
    }



?>