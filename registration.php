<?php session_start(); ?>

<?php include 'connectDatabase.php';?>
<?php
    if(!(isset($_POST['submit']))){
        die("error");
    }
    else{
        // For image upload
        $file = $_FILES['image'];
        // print_r($file);
        $filename = $file['name'];
        $filepath = $file['tmp_name'];
        $fileerror = $file['error'];

        $fname =  $_POST['fname'];
        $add = $_POST['address'];
        $gen = $_POST['gender'];
        $skill = $_POST['skill'];
        $phone = $_POST['phone'];
        $exp = $_POST['exp'];
        $desc = $_POST['desc'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $repassword = $_POST['repassword'];

            
        if (is_uploaded_file($_FILES['image']['tmp_name'])) {
            // echo "File ". $_FILES['image']['name'] ." uploaded successfully.\n";
            // echo "Displaying contents\n";
            // readfile($_FILES['image']['tmp_name']);
         } else {
            echo "<script>alert('You have to include your profile photo to continue ...');</script>";
            ?>
            <script>
                history.back();
            </script>
            <?php
            // header("location: registration.html");
            // echo "filename '". $_FILES['image']['tmp_name'] . "'.";
         }
        
        // Password verification
        $hash_pass = password_hash($pass, PASSWORD_DEFAULT);
        $verify_pass = password_verify($pass, $hash_pass);
        $hash_repass = password_hash($repassword, PASSWORD_DEFAULT);
        $hash_repass = password_verify($repassword, $hash_repass);

        $query = 'SELECT * FROM registration';
        $res = mysqli_query($conn, $query);
        $num = mysqli_num_rows($res);

        if($num >= 0){
            $sqls = "SELECT * FROM `registration` where Email = '$email'";
            $result = mysqli_query($conn, $sqls);
            $numb = mysqli_num_rows($result);
            if(!$numb){
                if($fileerror == 0){
                    $destfile = 'imagefolder/'. $filename;
                    // echo $destfile;
                    move_uploaded_file($filepath, $destfile);
        
                    if(!($fname == '' || $add == '' || $skill == '' || $exp == '' || $desc == '' || $email == '' || $pass == '' || $phone == '')){
                        if($pass == $repassword){
                            $sql = "INSERT INTO `registration` (`Name`, `Address`, `Gender`, `Skill`, `Phone`, `Experience`, `Description`, `Photo`, `Email`, `Password`) VALUES ('$fname', '$add', '$gen', '$skill', '$phone', '$exp', '$desc', '$destfile', '$email', '$hash_pass')";
                            $result = mysqli_query($conn, $sql);
                            if($result){
                                echo "inserted";
                                $_SESSION['jobseeker'] = 'jobseeker';
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
            echo "";
        }

        }
    mysqli_close($conn);
?>