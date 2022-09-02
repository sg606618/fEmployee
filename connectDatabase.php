<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'fEmployee';

    $conn = mysqli_connect($servername, $username, $password, $db);

    if(!$conn){
        die ("Connection failed !!!");
    }
    else{
        // echo "Connection Successful!!!";
    }

    $del = "DELETE FROM openvacancy WHERE `Expiry Date`< (NOW() - INTERVAL 1 MINUTE)";
    $out = mysqli_query($conn, $del);
    if(!$out){
        echo "";
    }
?>