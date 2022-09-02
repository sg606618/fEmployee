<?php 
    session_start();
    require_once('connectDatabase.php');
    if(isset($_POST['ok'])){
        $email = $_POST['mail'];
        $pass = $_POST['passo'];
        
        $sql = "SELECT * FROM `register` where email = '$email'";
        $result = mysqli_query($conn, $sql);
        
        $num = mysqli_num_rows($result);
        if($num >= 0){
            while($row = mysqli_fetch_assoc($result)){
                $db_pass = $row['password'];
                $pass_decode = password_verify($pass, $db_pass);

                if($pass_decode){
                    if(isset($_POST["rem"])) {
                        setcookie ("mail",$email,time()+86400);
                        setcookie ("passw",$pass,time()+86400);
                        header ("location: index.php");
                    } else {
                        header ("location: index.php");
                    }
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['password'] = $row['password'];

                }else{
                    echo "<script>alert('Password Incorrect !!!');</script>";
                    ?>
                    <script>history.back();</script>
                    <?php
                }
            }
        }
    }
?>