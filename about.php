<?php
    include "loginOrNot.php";
?>

<?php require_once("connectDatabase.php"); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <?php include "favicon.html" ?>
    <style><?php include "style.css" ?></style>
    <style><?php include "terms.css" ?></style>
    <style><?php include "about.css" ?></style>
</head>

<body>

    <?php include "navigation.php"; ?>

    <div class="container">
        <h1 class="about-us">About Us</h1>
        <div class="social-media">
            <span>Find us on : </span>
            <span><img class="socialMedia" src="images/facebook-icon.png" alt=""></span>
            <span><img class="socialMedia" src="images/instagram-icon.png" alt=""></span>
            <span><img class="socialMedia" src="images/twitter-icon.png" alt=""></span>
        </div>
        <div class="content">
            <div class="intro last-content">
                <h3>Introduction</h3>

                <div class="description">
                    <p>This site give the reliability for getting the job and the opportunity. Many people are complete their skill development but not getting the job. So, We are focusing those people who don't even get the job while they are ready to be an Job Holder. We are giving the platform for those all people who don't get the job. This will allow people to direct interact with the employee and the clients. This is only the platform where people must have fill their information to get hire by the company or the organization. It is mainly focused in Nepal. Because Nepal is the country where most of the people going abroad to find the reliable job and most of the organization hire workers from out of the country. fEmployee gets you the opportunity to find the workers from every single place from Nepal.</p>
                </div>
            </div>
            <div class="objective last-content">
                <h3>How to Find Vacancy</h3>

                <div class="description">
                    <p>If you want to find the vacancy and go for what you want. Then there is a Find Vacancy Term in the navigation bar where you can find the reliable and most efficient vacancies. You just need to go up there and click it then the vacancies are appear. Just click in the search icon head of the content. Just click it and search for the Job you are able to done with.</p>

                </div>
            </div>
            <div class="other last-content">
                <h3>How to Register</h3>

                <div class="description">
                    <p>In the above content there is a login button just click it and you can able to see the register term. Just click it and you directly go to the page where you can register your Name and other required information. Then you can able to do any kind of job you ready for.</p>

                </div>
            </div>
        </div>
    </div>
    <?php include "footer.html" ?>
</body>

    <script src="script.js"></script>

</html>