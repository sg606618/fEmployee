<?php
    session_start();

    echo "logging out !! ... Please wait ....";
    session_unset();
    session_destroy();

    header("location: /College/index.php");
    exit;
?>