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
        $des = $_POST['desc'];
        if($nam == '' || $add == '' || $sk == '' || $ph == '' || $des == ''){
            echo "<script>alert('You have to fill the blank areas to submit ...')</script>";
        }else{
            if($fileerror == 0){
                $destfile = 'imagefolder/'. $filename;
                move_uploaded_file($filepath, $destfile);
                $sql = "UPDATE `registration` SET `Name`='$nam',`Address`='$add', `Skill`='$sk',`Phone`='$ph',`Description`='$des', `Photo`='$destfile' WHERE `Email` = '$mail'";
                $result = mysqli_query($conn, $sql);
                if(!$result){
                    echo "error in updating ...";
                }
                $select = "SELECT * FROM registration WHERE `Email` = '$mail'";
                $check = mysqli_query($conn, $select);
                $num = mysqli_num_rows($check);
                if($num){
                    while($rows = mysqli_fetch_assoc($check)){
                        $_SESSION['name'] = $rows['Name'];
                        $_SESSION['address'] = $rows['Address'];
                        $_SESSION['skill'] = $rows['Skill'];
                        $_SESSION['phone'] = $rows['Phone'];
                        $_SESSION['desc'] = $rows['Description'];
                        $_SESSION['photo'] = $rows['Photo'];
                    }
                }
            }
        }
    }

    $query = "SELECT * FROM registration WHERE `Email` = '$mail'";
    $checks = mysqli_query($conn, $query);
    if(!$checks){
        echo "error occur";
    }
    $nums = mysqli_num_rows($checks);
    if($nums){
        while ($row = mysqli_fetch_assoc($checks)) {
            
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
    <?php include "favicon.html" ?>
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
        <div id="line"></div>
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
            <label for="">About :</label> <br>
            <textarea name="desc" id="desc" placeholder="Edit your bio ..."></textarea><br>
            <input type="file" name="photo" id="photo" value="Choose a valid Photo..."><br><br>
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
        <div class="photoProfile" style="display: flex; flex-direction: row; align-items: center; color: blue; margin-right: 10px; gap: 0px;">
            <a id="options" href="">
                <abbr style="margin: 0;" title="<?php echo $_SESSION["name"]; ?>">
                    <img src="<?php echo $_SESSION['photo']; ?>" onerror='this.src="images/profile.png";' id="profile1" alt="" style="position: relative;">
                </abbr>
            </a>
            <div id="option" style="">
                <ol>
                    <li id="clickLog"><a href="logout.php">Logout</a></li><hr>
                    <li id="edit">Edit</li><hr>
                    <a href="messages.php?mail=<?= $_SESSION['email'] ?>"><li id="edit">Messages</li></a><hr>
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
            <h2 style="text-decoration: underline;" class="working-history">Applied History</h2><br>
            <?php 
                $mail = $_SESSION['email'];
                $select = "SELECT * FROM `application` WHERE `userEmail` = '$mail'";
                $out = mysqli_query($conn, $select);
                if(!$out){
                    echo "error occur";
                }
                $n = mysqli_num_rows($out);
                if($n){
                    while ($row = mysqli_fetch_assoc($out)) {
            ?>
            <div class="company">
                <strong style="color: green; font-size: 18px;"><?php echo $row['job']; ?></strong>
                <strong style="color: red; font-size: 16px;"><?php echo $row['company']; ?></strong>
                <small><?php echo $row['contact']; ?> || <?php echo $row['email']; ?></small>
                <small><?php echo $row['compAddress']; ?></small>
                <p><?php echo $row['description']; ?></p>
                <a class="confirmation" href="deleteapp.php?sn=<?php echo $row['id'] ?>">
                    <input type="button" value="Delete">
                </a>
            </div>
            <?php 
                    }
                }
            ?>
        </fieldset>
        <hr>
    </div>
    <?php include "footer.html" ?>
    
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
    document.getElementById('exit').addEventListener('click', ()=> {
        document.getElementById('option').style.visibility = "hidden";
        document.getElementById('formWrapper').style.top = "-150%";
        document.getElementById('container').style.opacity = "1";
    })
    document.getElementById('edit').addEventListener('click', hideEditProfile);
    document.getElementById('line').addEventListener('click', hideEditProfile);
    function hideEditProfile(){
        if(document.getElementById('formWrapper').style.top == "-150%"){
            document.getElementById('formWrapper').style.top = "2%";
            document.getElementById('container').style.opacity = ".2";
        }else{
            document.getElementById('formWrapper').style.top = "-150%";
            document.getElementById('container').style.opacity = "1";
        }
    };
</script>
    <?php   
        }else{
            echo "You are logged out";
            header('location:login.php');
        }
    ?>  
    <script>
        var elems = document.getElementsByClassName('confirmation');
        var confirmIt = function (e) {
            if (!confirm('Are you sure?')) e.preventDefault();
        };
        for (var i = 0, l = elems.length; i < l; i++) {
            elems[i].addEventListener('click', confirmIt, false);
        }
    </script>
</html>