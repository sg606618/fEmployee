<?php 
    require_once("connectDatabase.php");
           
    $op = $_GET['op'];
    $sql = "DELETE FROM `openvacancy` WHERE `S.N.` = '$op'";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        echo "error occur";
    }else{
        $select = "SELECT * FROM `openvacancy` WHERE `S.N.` = '$op'";
        $out = mysqli_query($conn, $select);
        if(!$out){
            die("nothing");
        }
        $num = mysqli_num_rows($out);
        if($num){
            while($row = mysqli_fetch_assoc($num)){
                $mail = $row['Email'];
            }
        }

        $query = "DELETE FROM `application` WHERE email = '$mail'";
        $res = mysqli_query($conn, $query);
        if(!$res){
            echo "error occur";
        }
        ?>
        <script>
            alert('Recorded Deleted!!!');
            history.back();
        </script>
<?php
    }
?>