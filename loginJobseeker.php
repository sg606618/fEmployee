<?php 
    session_start();
    require_once('connectDatabase.php');
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        
        $sql = "SELECT * FROM `registration` where Email = '$email'";
        $result = mysqli_query($conn, $sql);
        
        $num = mysqli_num_rows($result);
        if($num){
            while($row = mysqli_fetch_assoc($result)){
                $db_pass = $row['Password'];
                $pass_decode = password_verify($pass, $db_pass);

                if($pass_decode){
                    if(isset($_POST["remember"])) {
                        setcookie ("email",$email,time()+86400);
                        setcookie ("password",$pass,time()+86400);
                        header ("location: index.php");
                    } else {
                        header ("location: index.php");
                    }
                    $_SESSION['name'] = $row['Name'];
                    $_SESSION['gender'] = $row['Gender'];
                    $_SESSION['address'] = $row['Address'];
                    $_SESSION['skill'] = $row['Skill'];
                    $_SESSION['phone'] = $row['Phone'];
                    $_SESSION['exp'] = $row['Experience'];
                    $_SESSION['work'] = $row['Working Hours'];
                    $_SESSION['lang'] = $row['Language'];
                    $_SESSION['desc'] = $row['Description'];
                    $_SESSION['photo'] = $row['Photo'];
                    $_SESSION['email'] = $row['Email'];
                    $_SESSION['cash'] = $row['Cash'];
                    $_SESSION['password'] = $row['Password'];
                    $_SESSION['portfolio'] = $row['Portfolio'];
                    $_SESSION['link'] = $row['Link'];

                }else{
                    echo "<script>alert('Password Incorrect !!!');</script>";
                    ?>
                    <script>history.back();</script>
                    <?php
                }
            }
        }else{
            echo "<script>alert('Invalid Email !!!');</script>";
            ?>
            <script>history.back();</script>
            <?php
        }
    }
?>