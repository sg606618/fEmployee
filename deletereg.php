<?php 
    require_once("connectDatabase.php");
           
	$var = $_GET['var'];
    $sql = "DELETE FROM `registration` WHERE `S.N.` = '$var'";
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