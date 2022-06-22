<?php
    session_start();

    if(isset($_SESSION['email']) && $_SESSION['email'] == true){
        $loggedin = true;
    }else{
        $loggedin = false;
    }
    
?>

<?php include_once "connectDatabase.php" ?>

<?php
    if(!isset($_POST['submit'])){
        echo "";
    }else{
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $desc = $_POST['desc'];
        if(!$name == '' || !$phone == '' || !$email == '' || !$desc == ''){
            $sql = "INSERT INTO contact(`Name`, `Mobile`, `Email`, `Description`) VALUES ('$name', '$phone', '$email', '$desc')";
            $res = mysqli_query($conn, $sql);
            if(!$res){
                echo "Error occur!!!";
            }
        }
    }
    // mysqli-close($conn);


    if(!isset($_POST['go'])){
        echo "";
    }else{
        $name = $_POST['username'];
        $pass = $_POST['password'];
        $sql = "select * from admin where `username` = '$name' and `password` = '$pass'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num){
            header("location: feedback.php");
        }else{
            echo "";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style><?php include "contact.css" ?></style>
    <style><?php include "terms.css" ?></style>
    <style><?php include "style.css" ?></style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <abbr title="Admin Login Only !!!"><img src="images/message.png" id="contact_info" alt=""></abbr>
    <div class="form" id="form">
        <h2>Admin Login</h2>
        <form method="post" class="contactForm">
            <p>Admin only</p>
            <input type="text" name="username" id="username" placeholder="Username / Email">
            <input type="password" name="password" id="password" placeholder="Password">
            <input type="submit" value="Go" name="go">
        </form>
    </div>
    <header>
        <h2 id="logo">fEmployee</h2>
        <ul>
            <?php
            if($loggedin){
                echo '<a href="logout.php">
                <li id="startLogin" style="margin-left: -50%;">Logout</li>
                </a>
                <a href="userProfile.php">
                <img src="' . $_SESSION["photo"] . '" style="border-radius: 50%;" id="profile2" alt="">
                </a>';
            }
            if(!$loggedin){
                echo '<a href="registration.html">
                    <li  id="startSignup">Registration</li>
                </a>
                <a href="login.php">
                    <li id="startLogin">Login</li>
                </a>';
            }
            ?>
        </ul>
    </header>
    
    <nav id="nav">
        <ul>
            <img src="images/ThreeLineDot.png" alt="" id="threeLine" onclick="displayThreeLine()" />
            <!-- <a href="userProfile.php">
                <img src="images/profile.png" id="profile2" alt="">
            </a> -->
            <li><a href="index.php">Home</a></li>
            <li><a <?php 
            if($loggedin){
                echo 'href="vacancy.php"';
            }
            ?>>Find Vacancies</a></li>
            <li><a href="about.php">About</a></li>
        </ul>
        <a href="contact.php"><button id="contact_btn">Contact</button></a>
    </nav>
    <section id="menus">
        <ul>
            <!-- <a href="userProfile.php">
                <img src="images/profile.png" id="profile1" alt="">
            </a> -->
            <li><a href="index.php">Home</a></li>
            <li><a <?php 
            if($loggedin){
                echo 'href="vacancy.php"';
            }
            ?>>Find Vacancies</a></li>
            <li><a href="about.php">About</a></li>
            <li onclick="hideThreeLine()"><a>Exit</a></li>
        </ul>
        <img class="section-images" src="images/facebook-icon.png" alt="">
        <img class="section-images" src="images/instagram-icon.png" alt="">
        <img class="section-images" src="images/twitter-icon.png" alt="">
    </section>

    <div class="wrapper">
        <div class="firstContent">
            <h2 class="quote">Anything,  You wanna know about !</h2>
        </div>
        <div class="secondContent">
            <form class="formContact" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <h2 class="quote quote1">Your FeedBack !!!</h2>
                <input type="text" name="name" id="name" placeholder="Your full name ...">
                <input type="text" name="phone" id="phone" placeholder="Your mobile no. ...">
                <input type="email" name="email" id="email" placeholder="Your email address...">
                <textarea name="desc" id="desc" placeholder="Your feedback ...."></textarea>
                <input type="submit" value="Submit" name="submit">
            </form>
        </div>
        <div class="thirdContent">
            <div class="last1">
                <div class="mapouter">
                    <div class="gmap_canvas">
                        <iframe width="800" height="300" id="gmap_canvas" src="https://maps.google.com/maps?q=xavier%20intl%20college,%20boudha&t=&z=11&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                        </iframe>
                        <a href="https://123movies-to.org"></a>
                        <br>
                        <a href="https://www.embedgooglemap.net">embed custom google map</a>
                    </div>
                </div>
            </div>
            <div class="last2">
                <h2 style="text-decoration: underline;">Meet US</h2>
                <div class="o one">
                    <i class="fa fa-phone"></i>
                    <a class="lastSecond" href="tel: 9860194329">9860194329</a>
                </div>
                <div class="o two">
                    <i class="fa fa-envelope"></i>
                    <a class="lastSecond" href="mailto: femployee@gmail.com">femployee@gmail.com</a>
                </div>
                <div class="o three">
                    <i class="fa fa-location-arrow"></i>
                    <a class="lastSecond" target="_blank" href="https://www.google.com/maps/place/Xavier+International+College/@27.7207524,85.3582103,18.8z/data=!4m12!1m6!3m5!1s0x39eb1bd9a2fc450b:0xc4897771cd30db17!2sXavier+International+College!8m2!3d27.7208437!4d85.3588288!3m4!1s0x39eb1bd9a2fc450b:0xc4897771cd30db17!8m2!3d27.7208437!4d85.3588288">Boudha, Kathmandu</a>
                </div>
            </div>
            <!-- <div class="last3">
                <p>This is the contact section where you can find the solution of your any problem...</p>
            </div> -->
        </div>
    </div>

    <div class="terms-conditions">
        <div class="terms">
            <h1 id="terms">Terms</h1>
            <a href="privacyPolicy.php" class="privacyPolicy">Privacy Policy</a>
            <a href="termsCondition.php" class="privacyPolicy">Terms and Conditions</a>
        </div>
        <h2 id="logo" class="logoE">fEmployee</h2>

        <div>
            <p class="copyright">
                fEmployee is a registered trademark of Freelancer Technology Pty Limited
            </p>
        </div>
        <div>
            <p class="copyright">
                Copyright &copy; 2022 Freelancer Technology Pty Limited
            </p>
        </div>
</body>
<script src="script.js"></script>
<script>
    document.getElementById('contact_info').addEventListener('click', () =>{
        if(document.getElementById('form').style.display == 'flex'){
            document.getElementById('form').style.display = 'none';
        }else{
            document.getElementById('form').style.display = 'flex';
        }
    })
</script>

</html>