<?php
 session_start();
?>

<?php
    require("connectDatabase.php");
    $pass = $_POST['password2'];
    $repass = $_POST['password1'];
    $hash_pass = password_hash($pass, PASSWORD_DEFAULT);
    $mail = $_SESSION['email'];
    $sql = "select * from `registration` where `Email` = '$mail'";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        die("error");
    }
    $num = mysqli_num_rows($result);
    if($num){
        while($row = mysqli_fetch_assoc($result)){
            if($pass == $repass){
                $change = "UPDATE `registration` SET `Password` = '$hash_pass' WHERE `Email` = '$mail'";
                $check = mysqli_query($conn, $change);
                if($check){
                    echo "update successfully";
                    header("location: login.php");
                }
            }else{
                echo "Password does not match each other...";
            }
        }
    }
?>