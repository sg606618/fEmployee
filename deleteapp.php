<?php 
    require_once("connectDatabase.php");
           
    $sn = $_GET['sn'];
    $sql = "DELETE FROM `application` WHERE `id` = '$sn'";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        echo "error occur";
    }else{
        ?>
        <script>
            alert('Recorded Deleted!!!');
            history.back();
        </script>
<?php
    }
?>