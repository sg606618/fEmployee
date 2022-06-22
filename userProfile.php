<?php
    session_start();
    
    require_once("connectDatabase.php");

    $mail = $_SESSION['email'];
    if(!isset($_POST['submit'])){
        echo "";
    }else{
        $file = $_FILES['photo'];
        // print_r($file);
        $filename = $file['name'];
        $filepath = $file['tmp_name'];
        $fileerror = $file['error'];

        $nam = $_POST['name'];
        $add = $_POST['address'];
        $sk = $_POST['skill'];
        $ph = $_POST['phone'];
        $wh = $_POST['wh'];
        $des = $_POST['desc'];
        if($nam == '' || $add == '' || $sk == '' || $ph == '' || $wh == '' || $des == ''){
            echo "<script>alert('You have to fill the blank areas to submit ...')</script>";
        }else{
            // $pass = $_POST['pass'];
            // $db_pass = $_SESSION['password'];
            // $pass_decode = password_verify($pass, $db_pass);
            if($fileerror == 0){
                $destfile = 'imagefolder/'. $filename;
                // echo $destfile;
                move_uploaded_file($filepath, $destfile);
                // if($pass_decode){
                    $sql = "UPDATE `registration` SET `Name`='$nam',`Address`='$add', `Skill`='$sk',`Phone`='$ph',`Description`='$des', `Working Hours`='$wh', `Photo`='$destfile' WHERE `Email` = '$mail'";
                    $result = mysqli_query($conn, $sql);
                    if(!$result){
                        echo "error in updating ...";
                    }
                // }else{
                //     echo "<script>alert('Password Incorrect...');</script>";
                // }
                $select = "SELECT * FROM registration WHERE `Email` = '$mail'";
                $check = mysqli_query($conn, $select);
                $num = mysqli_num_rows($check);
                // echo $num;
                if($num){
                    while($rows = mysqli_fetch_assoc($check)){
                        $_SESSION['name'] = $rows['Name'];
                        $_SESSION['address'] = $rows['Address'];
                        $_SESSION['skill'] = $rows['Skill'];
                        $_SESSION['phone'] = $rows['Phone'];
                        $_SESSION['work'] = $rows['Working Hours'];
                        $_SESSION['desc'] = $rows['Description'];
                        $_SESSION['photo'] = $rows['Photo'];
                    }
                }
            }
        }
    }

    if(isset($_SESSION['name'])){
?>

<?php include 'connectDatabase.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['name'] ?></title>
    <style><?php include "userProfile.css" ?></style>
    <style><?php include "style.css" ?></style>
    <style><?php include "terms.css" ?></style>

    <!-- Google font awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    



</head>

<body>
    <div class="formWrapper" id="formWrapper">
        <h2>Edit Profile</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="check()" method="post" enctype="multipart/form-data">
            <label for="">Full Name :</label> <br>
            <input type="text" name="name" id="name"><br>
            <label for="">Address :</label> <br>
            <input type="text" name="address" id="address"><br>
            <label for="">Phone Number :</label> <br>
            <input type="text" name="phone" id="phone"><br>
            <label for="">Skills :</label> <br>
            <input type="text" name="skill" id="skill"><br>
            <label for="">Working Hours :</label> <br>
            <input type="number" name="wh" id="wh"><br>
            <label for="">About :</label> <br>
            <textarea name="desc" id="desc" placeholder="Edit your bio ..."></textarea><br>
            <input type="file" name="photo" id="photo" value="Choose a valid Photo..."><br><br>
            <!-- <label for="">Password :</label> <br>
            <input type="password" name="pass" id="pass" placeholder="Enter your valid password..."><br> -->
            <input type="submit" value="Change" name="submit">
        </form>
    </div>
    <nav id="nav">
        <ul>
            <img src="images\ThreeLineDot.png" alt="" id="threeLine" onclick="displayThreeLine()" />
            <li><a href="index.php">Home</a></li>
            <li><a href="vacancy.php">Find Job</a></li>
        </ul>
        <h2 id="logo">fEmployee</h2>
        <div class="photoProfile" style="display: flex; flex-direction: row; align-items: center; gap: 10px;">
            <a id="options" href="">
                <abbr title="<?php echo $_SESSION["name"]; ?>">
                    <img src="<?php echo $_SESSION['photo']; ?>" onerror='this.src="images/profile.png";' id="profile1" alt="" style="position: relative;">
                </abbr>
            </a>
            <div id="option" style="">
                <ol>
                    <li id="clickLog"><a href="logout.php">Logout</a></li><hr>
                    <li id="edit">Edit</li><hr>
                    <li id="exit">Exit</li>
                </ol>
            </div>
        </div>
        <!-- <a href="logout.php"><button>Logout</button></a> -->
    </nav>
    <section id="menus">
        <ul>
            <a href="">
                <img src="<?php echo $_SESSION['photo']; ?>" onerror='this.src="images/profile.png";' id="profile1" alt="">
            </a>
            <li><a href="index.php">Home</a></li>
            <li><a href="vacancy.php">Find Job</a></li>
            <li onclick="hideThreeLine()"><a>Exit</a></li>
        </ul>
        <img class="section-images" src="images\facebook-icon.png" alt="">
        <img class="section-images" src="images\instagram-icon.png" alt="">
        <img class="section-images" src="images\twitter-icon.png" alt="">
    </section>


    <div class="container" id="container">
        <fieldset class="user">
            <img src="<?php echo $_SESSION['photo']; ?>" onerror='this.src="images/profile.png";' id="profile" alt="">
            <div class="data">
                <a><label for="" id="name"><?php echo $_SESSION['name']; ?></label></a>
                <label for="" id="address"><?php echo $_SESSION['address']; ?></label>
                <label for="" id="skill"><?php echo $_SESSION['skill']; ?></label>
            </div>
        </fieldset>
        
        <hr>
        <fieldset class="skill">
            <div class="skillName">
                <label for=""><?php echo $_SESSION['skill']; ?>
                    <!-- <img class="edit" style="height: 30px; width: 30px; float: right;" src="images/edit.png" alt=""> -->
                </label>
                
            </div>
            <div class="skillDesc">
                <h2 style="float: left; text-decoration: underline; margin: 10px;">User Description</h2>
                <textarea name="" id="desc" disabled><?php echo $_SESSION['desc']; ?></textarea>
            </div>
        </fieldset>
        <hr>
        <fieldset class="workingHistory">
            <h2 style="text-decoration: underline;" class="working-history">Working History</h2><br>
            <div class="company">
                <strong for="">AAA Company Ltd.</strong>
                <p>This is the project to make a logo for our company. We use the previous logo for a years and we want
                    to change the logo in a new design</p>
            </div>
            <div class="company">
                <strong for="">AAA Company Ltd.</strong>
                <p>This is the project to make a logo for our company. We use the previous logo for a years and we want
                    to change the logo in a new design</p>
                </div>
                <div class="company">
                <strong for="">AAA Company Ltd.</strong>
                <p>This is the project to make a logo for our company. We use the previous logo for a years and we want
                    to change the logo in a new design</p>
            </div>
        </fieldset>
        <hr>
        <fieldset class="portfolio">
            <h1>Portfolio</h1>
            <div class="add-port">

                <div class="image-upload">
                    <label for="file-input" id="inputFile">
                        <img src="images/plus-icon.png" class="plus-icon" height=' 100vw' width='100vw' />
                    </label><br>
                    <input id="file-input" type="file" name="image" onchange="loadFile(event)" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,.pdf,.html, .jpg, .jpeg, .png, .svg" />
                </div>
                <div id="output" class="output">
                    <img src="images/employee.png" alt="">
                    This is an apple
                </div>

                <label for="" style="color: orange; font-size: clamp(10px, 3vw, 15px);">ShowCase your work to win more projects. Add items to impress clients.</label>
            </div>
        </fieldset>
        <hr>
        <fieldset class="hrs">
            <h2>Working Hours</h2>
            <p>More than <?php echo $_SESSION['work']; ?> hrs a day</p>
        </fieldset>
        <hr>
        <fieldset class="languages">
            <h2>Language Skills</h2>
            <p class="langu"><?php echo $_SESSION['lang']; ?></p>
        </fieldset>
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
    </div>
    
</body>

<script src="script.js"></script>

<script>
    document.getElementById('options').addEventListener('click', (e)=> {
        e.preventDefault();
        if(document.getElementById('option').style.visibility == "hidden"){
            document.getElementById('option').style.visibility = "visible";
        }else{
            document.getElementById('option').style.visibility = "hidden";
        }
    });
    document.getElementById('edit').addEventListener('click', ()=> {
        if(document.getElementById('formWrapper').style.top == "-100%"){
            document.getElementById('formWrapper').style.top = "2%";
            document.getElementById('container').style.opacity = ".2";
        }else{
            document.getElementById('formWrapper').style.top = "-100%";
            document.getElementById('container').style.opacity = "1";
        }
    });
    document.getElementById('exit').addEventListener('click', ()=> {
        document.getElementById('option').style.visibility = "hidden";
        document.getElementById('formWrapper').style.top = "-100%";
        document.getElementById('container').style.opacity = "1";
    })
</script>

<script>
    // var loadFile = function (event) {
    //     document.getElementById('output').style.display = 'block';
    //     var image = document.getElementById('output');
    //     image.src = URL.createObjectURL(event.target.files[0]);
    //     document.getElementById('output').style.outline = '4px solid black';
    // };
</script>
    <?php   
        }else{
            echo "You are logged out";
            header('location:login.php');
        }
    ?>  

</html>