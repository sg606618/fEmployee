<?php
    // session_start();
    include 'loginOrNot.php';
    require_once("connectDatabase.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <?php include "favicon.html" ?>
    <style><?php include "employerProfile.css" ?></style>
    <style><?php include "style.css" ?></style>
    <style><?php include "terms.css" ?></style>

    <!-- Google font awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>

<body>
    <nav id="nav">
        <ul>
            <img src="images\ThreeLineDot.png" alt="" id="threeLine" onclick="displayThreeLine()" />
            <li><a href="index.php">Home</a></li>
            <li><a href="hire.php">Hire Workers</a></li>
        </ul>
        <h2 id="logo">fEmployee</h2>
        <div class="photoProfile" style="display: flex; flex-direction: row; align-items: center; color: blue; margin-right: 10px; gap: 0px;">
            <a id="options" href="">
                <abbr style="margin: 0;" title="">
                    <img src="" onerror='this.src="images/profile.png";' id="profile1" alt="" style="position: relative;">
                </abbr>
            </a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>
    <section id="menus">
        <ul>
            <a href="">
                <img src="" onerror='this.src="images/profile.png";' id="profile1" alt="">
            </a>
            <li><a href="index.php">Home</a></li>
            <li><a href="hire.php">Hire Workers</a></li>
            <li onclick="hideThreeLine()"><a>Exit</a></li>
        </ul>
        <img class="section-images" src="images\facebook-icon.png" alt="">
        <img class="section-images" src="images\instagram-icon.png" alt="">
        <img class="section-images" src="images\twitter-icon.png" alt="">
    </section>


    <div class="container" id="container">
        <fieldset class="user">
            <img src="" onerror='this.src="images/profile.png";' id="profile" alt="">
            <div class="data">
                <a><label for="" id="name"><?php echo $_SESSION['username']; ?></label></a>
                <label for="" id="skill"><?php echo $_SESSION['organization']; ?></label>
                <label for="" id="address"><?php echo $_SESSION['address']; ?></label>
            </div>
        </fieldset>
        
        <hr>
        <fieldset class="skill">
            <div class="skillDesc">
                <h2 style="float: left; text-decoration: underline; margin: 10px;">About Organization</h2>
                <textarea name="" id="desc" disabled><?php echo $_SESSION['description']; ?></textarea>
            </div>
        </fieldset>
        <hr>
        <fieldset class="workingHistory">
            <h2 style="text-decoration: underline;" class="working-history">Applicants</h2><br>
            <?php 
                $mail = $_SESSION['email'];
                $select = "SELECT * FROM `application` WHERE `email` = '$mail'";
                $out = mysqli_query($conn, $select);
                if(!$out){
                    echo "error occur";
                }
                $n = mysqli_num_rows($out);
                if($n){
                    while ($row = mysqli_fetch_assoc($out)) {
            ?>
            <div class="company">
                <a id="msg" href="individual.php?mail=<?php echo $row["userEmail"]; ?>">
                    <strong style="color: green; font-size: 18px;"><?php echo $row['name']; ?></strong>
                </a>
                <strong style="color: red; font-size: 16px;"><?php echo $row['skill']; ?></strong>
                <small><?php echo $row['phone']; ?> || <?php echo $row['userEmail']; ?></small>
                <small><?php echo $row['compAddress']; ?></small>
                <p><?php echo $row['userDesc']; ?></p>
                <a class="confirmation" href="deleteapp.php?sn=<?php echo $row['id'] ?>">
                    <input type="button" value="Delete">
                </a>
            </div>
            <?php 
                    }
                }
            ?>
        </fieldset>
        <fieldset class="workingHistory">
            <h2 style="text-decoration: underline;" class="working-history">Your Vacancies</h2><br>
            <?php 
                $mail = $_SESSION['email'];
                $select = "SELECT * FROM `openvacancy` WHERE `Email` = '$mail'";
                $out = mysqli_query($conn, $select);
                if(!$out){
                    echo "error occur";
                }
                $n = mysqli_num_rows($out);
                if($n){
                    while ($row = mysqli_fetch_assoc($out)) {
            ?>
            <div class="company">
                <strong style="color: green; font-size: 18px;"><?php echo $row['Job Title']; ?></strong>
                <strong style="color: red; font-size: 16px;"><?php echo $row['Company']; ?></strong>
                <small><?php echo $row['Contact']; ?> || <?php echo $row['Email']; ?></small>
                <small><?php echo $row['Address']; ?></small>
                <p><?php echo $row['Description']; ?></p>
                <a class="confirmation" href="deleteop.php?op=<?php echo $row['S.N.'] ?>">
                    <input type="button" value="Delete">
                </a>
            </div>
            <?php 
                    }
                }
            ?>
        </fieldset>
    </div>

    <?php include "footer.html" ?>
    
</body>
<script>
     var elems = document.getElementsByClassName('confirmation');
    var confirmIt = function (e) {
        if (!confirm('Are you sure?')) e.preventDefault();
    };
    for (var i = 0, l = elems.length; i < l; i++) {
        elems[i].addEventListener('click', confirmIt, false);
    }
</script>
<script src="script.js"></script>

</html>