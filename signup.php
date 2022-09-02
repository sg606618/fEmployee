<?php session_start(); ?>

<?php include 'connectDatabase.php';?>
<?php
    if(isset($_POST['submit'])){
        $username =  $_POST['username'];
        $organization =  $_POST['organization'];
        $address =  $_POST['address'];
        $desc =  $_POST['desc'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $repassword = $_POST['repassword'];
        $hash_pass = password_hash($pass, PASSWORD_DEFAULT);

        $query = 'SELECT * FROM register';
        $res = mysqli_query($conn, $query);
        $num = mysqli_num_rows($res);

        if($num >= 0){
            $sqls = "SELECT * FROM `register` WHERE email = '$email'";
            $result = mysqli_query($conn, $sqls);
            $numb = mysqli_num_rows($result);
            if(!$numb){
                if(!($username == '' || $email == '' || $pass == '' || $address == '' || $desc == '' || $organization == '')){
                    if($pass == $repassword){
                        $sql = "INSERT INTO `register` (`username`, `organization`, `address`, `description`, `email`, `password`) VALUES ('$username', '$organization', '$address', '$desc', '$email', '$hash_pass')";
                        $result = mysqli_query($conn, $sql);
                        if($result){
                            echo "inserted";
                            $_SESSION['employer'] = 'employer';
                            header("location: login.php");
                        }else{
                            echo "Not inserted ";
                        }
                    }else{
                        echo ("<script>alert('Password must match each other...');</script>");
                        ?>
                        <script>
                            history.back();
                        </script>
                        <?php
                    }
                }else{
                    echo("<script>alert('Please fill all the boxes and try again....');</script>");
                    ?>
                    <script>
                        history.back();
                    </script>
                    <?php
                }
            }else{
                echo ("<script>alert('Already exist , Try another email...');</script>");
                ?>
                    <script>
                        history.back();
                    </script>
                <?php
            }
        }else{
            echo 'You have an error to solve ...';
        }
    }else{
        die("error");
    }
    mysqli_close($conn);
?>