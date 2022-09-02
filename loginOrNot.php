<?php
    session_start();

    if(isset($_SESSION['name']) && $_SESSION['name'] == true){
        $loggedin = true;
        $employer = '';
    }else if(isset($_SESSION['username']) && $_SESSION['username'] == true){
        $employer = true;
        $loggedin = '';
    }else{
        header('location: main.php');
        $employer = false;
    }
    
?>