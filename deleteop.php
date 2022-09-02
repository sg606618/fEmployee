<?php 
    require_once("connectDatabase.php");
           
    $op = $_GET['op'];
    $sql = "DELETE FROM `openvacancy` WHERE `S.N.` = '$op'";
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