<?php 
    require_once("connectDatabase.php");
           
    $sn = $_GET['sn'];
    $sql = "DELETE FROM `register` WHERE sn = '$sn'";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        echo "error occur";
    }else{
        ?>
        <script>
            alert('Recorded Deleted!!!');
            location.replace("admin.php");
        </script>
<?php
    }
?>