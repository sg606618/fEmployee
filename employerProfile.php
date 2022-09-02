<?php
    session_start();
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
                <a><label for="" id="name"></label></a>
                <label for="" id="address"></label>
                <label for="" id="skill"></label>
            </div>
        </fieldset>
        
        <hr>
        <fieldset class="skill">
            <div class="skillName">
                <label for="">
                    <!-- <img class="edit" style="height: 30px; width: 30px; float: right;" src="images/edit.png" alt=""> -->
                </label>
                
            </div>
            <div class="skillDesc">
                <h2 style="float: left; text-decoration: underline; margin: 10px;">User Description</h2>
                <textarea name="" id="desc" disabled></textarea>
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
            <p>More than  hrs a day</p>
        </fieldset>
        <hr>
        <fieldset class="languages">
            <h2>Language Skills</h2>
            <p class="langu"></p>
        </fieldset>
    </div>

    <?php include "footer.html" ?>
    
</body>

<script src="script.js"></script>

</html>