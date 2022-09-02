<header>
    <h2 id="logo" onclick="window.location = 'index.php'">fEmployee</h2>
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
                if($employer){
                    echo '<a href="logout.php">
                        <li id="startLogin" style="margin-left: -50%;">Logout</li>
                    </a>
                    <a href="employerProfile.php">
                        <img src="./images/profile.png" style="border-radius: 50%;" id="profile2" alt="">
                    </a>';
                }
                if(!$loggedin && !$employer){
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
        <li><a href="index.php">Home</a></li>
        <?php
            if($employer){
                echo '<li><a href="hire.php">Hire Worker</a></li>';
            }
            if($loggedin){
                echo '<li><a href="vacancy.php">Find Vacancies</a></li>';
            }
        ?>
        <li><a href="about.php">About</a></li>
    </ul>
    <a href="contact.php"><button id="contact_btn">Contact</button></a>
</nav>
<section id="menus">
    <ul>
        <li><a href="index.php">Home</a></li>
        <?php
            if($employer){
                echo '<li><a href="hire.php">Hire Worker</a></li>';
            }
            if($loggedin){
                echo '<li><a href="vacancy.php">Find Vacancies</a></li>';
            }
        ?>
        <li><a href="about.php">About</a></li>
        <li onclick="hideThreeLine()"><a>Exit</a></li>
    </ul>
    <img class="section-images" src="images/facebook-icon.png" alt="">
    <img class="section-images" src="images/instagram-icon.png" alt="">
    <img class="section-images" src="images/twitter-icon.png" alt="">
</section>