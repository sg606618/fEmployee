<?php
    include "loginOrNot.php";
?>

<?php include_once "connectDatabase.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <?php include "favicon.html" ?>
    <style><?php include "contact.css" ?></style>
    <style><?php include "terms.css" ?></style>
    <style><?php include "style.css" ?></style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
        
    <?php include "navigation.php"; ?>

    <div class="wrapper">
        <div class="firstContent">
            <h2 class="quote">Anything,  You wanna know about !</h2>
        </div>
        <div class="secondContent">
            <form class="formContact" onSubmit="history.back()" action="https://formsubmit.co/sg606618@gmail.com" method="POST">
                <h2 class="quote quote1">Your FeedBack !!!</h2>
                <input type="hidden" name="_cc" value="raajshrestha1999@gmail.com">
                <input type="hidden" name="_captcha" value="false">
                <input type="hidden" name="_subject" value="User Feedback !!!">
                <input type="email" name="email" id="email" placeholder="Your email address..." required>
                <input type="hidden" name="_autoresponse" value="your custom message">
                <textarea name="message" id="desc" placeholder="Your feedback ...."></textarea>
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

    <?php include "footer.html" ?>
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