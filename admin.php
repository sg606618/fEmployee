<?php include_once "connectDatabase.php" ?>
<?php 
    // include "loginOrNot.php";
    $sql = "SELECT * FROM `application` ORDER BY `id` DESC";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        die ("Error in Selecting Database , <br> Please check!!!");
    }
    $nu = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Dashboard</title>
    <?php include "favicon.html" ?>
    <style><?php include "hire.css" ?></style>
    <link rel="stylesheet" href="terms.css">
    <style><?php include "admin.css" ?></style>
</head>
<body>
    <header>
        <h2 id="logo" onclick="window.location='admin.php'">fEmployee</h2>
        <strong>Admin Pannel</strong>
        <ol>
            <li id="startLogin" style="margin-left: -50%;"><a href="logout.php">Logout</a></li>
        </ol>
    </header>
    <div class="total">
        <div class="navBar">
            <nav id="nav">
                <ul>
                    <li>
                        <img src="images/adminImg.png" alt="">
                    </li>
                    <li><a href="#application">Applications</a></li>
                    <li><a href="#jobseeker">JobSeekers</a></li>
                    <li><a href="#employer">Employers</a></li>
                    <li><a href="#vacancy">Vacancies</a></li>
                </ul>
            </nav>
        </div>
        <div class="wrapper">
            <h1 id="jobseeker" style="text-decoration: underline; text-align: center;">Applicants (<?php echo $nu; ?>)</h1>
            <div class="container applicants">
                <?php
                    // echo $num;
                    if($nu > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            ?>
                <div class="company">
                    <strong style="color: green; font-size: 18px;"><?php echo $row['name']; ?></strong>
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
                    }else{
                        echo "There are no User Registered yet...";
                    }
                ?>
            </div>
            <?php
                $sql = "SELECT * FROM registration ORDER BY `S.N.` DESC";
                $result = mysqli_query($conn, $sql);
                if(!$result){
                    die ("Error in Selecting Database , <br> Please check!!!");
                }
                $num = mysqli_num_rows($result);
            ?>
        <div class="wrapper">
            <h1 id="jobseeker" style="text-decoration: underline; text-align: center;">JobSeekers (<?php echo $num; ?>)</h1>
            <div class="container jobseeker">
                <div class="information">
                    <?php
                        // echo $num;
                        if($num > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                ?>
                    <div class="contentinfo">
                        <!-- <a >
                            <div class="crossButton" style="margin: 20px 15px 0 0;"></div>
                        <a> -->
                        <div class="info">
                            <div class="top_section">
                                <div class="image-icons">
                                    <a href="deletereg.php?var=<?php echo $row['Email'] ?>">
                                        <img src="<?php echo $row['Photo'] ?>" alt="images" onerror="this.src='images/profile.png';" class="profile" />
                                    </a>
                                    <section class="img-icon">
                                        <i class="fa fa-2x fa-github"></i>
                                        <i class="fa fa-2x fa-facebook-square"></i>
                                        <i class="fa fa-2x fa-twitter"></i>
                                    </section>
                                </div>
                                <div class="userInfo">
                                    <b style="margin-bottom: 10px; color: whitesmoke; font-size: 20px;"><?php echo $row['Name'] ?></b>
                                    <b><?php echo $row['Skill'] ?></b>
                                    <b><small style="margin-top: 10px; float: right; color: white;"><?php echo $row['Address'] ?></small></b>
                                </div>
                            </div>
                            <div class="description">
                                <textarea name="desc" id="desc" disabled><?php echo $row['Description'] ?></textarea>
                            </div>
                            <div class="buttons">
                                <a class="msg confirmation" href="deletereg.php?var=<?php echo $row['S.N.'] ?>">
                                    <input type="button" value="Delete" class="message" id="delete">
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                            }
                        }else{
                            echo "There are no User Registered yet...";
                        }
                    ?>
                </div>
            </div>
            <?php
                $sql = "SELECT * FROM register ORDER BY `sn` DESC";
                $result = mysqli_query($conn, $sql);
                if(!$result){
                    die ("Error in Selecting Database , <br> Please check!!!");
                }
                $numb = mysqli_num_rows($result);
            ?>
            <h1 id="employer" style="text-decoration: underline; text-align: center;">Employers (<?php echo $numb; ?>)</h1>
            <div class="container employer">
                <?php
                    if ($numb) {
                        while($rows = mysqli_fetch_assoc($result)) {
                            ?>
                            <?php
                    echo '<div class="content" id="content">
                    <a href="deleteem.php?sn='.$rows['sn'].'">
                        <div class="crossButton"></div>
                    </a>
                    <div class="heading" id="heading">
                            <h3 id="title">' . $rows['organization'] . '</h3>
                        </div>
                        <div class="parts">
                            <div class="part part1">
                                <article>
                                    <span>' . $rows['username'] . '</span>
                                    <span>' . $rows['address'] . '</span>
                                    <span>' . $rows['email'] . '</span>
                                </article>
                            </div>
                        </div>
                        <div class="description">
                            <textarea disabled name="description" id="description" rows="10" disabled>' . $rows['description'] . '</textarea>
                        </div>
                        <div class="buttons">
                            <a class="msg confirmation" href="deleteem.php?sn='.$rows['sn'].'">
                                <input type="button" class="message" value="Delete">
                            </a>
                        </div>
                    </div>';
                    ?>
                <?php   
                        }
                    } else {
                        echo "There are no more employer left!!!";
                    }
                ?>
            </div>
            <?php
                $sql = "SELECT * FROM openvacancy ORDER BY `S.N.` DESC";
                $result = mysqli_query($conn, $sql);
                if(!$result){
                    die ("Error in Selecting Database , <br> Please check!!!");
                }
                $number = mysqli_num_rows($result);
            ?>
            <h1 id="vacancy" style="text-decoration: underline; text-align: center;">Vacancies (<?php echo $number; ?>)</h1>
            <div class="container vacancies">
                <?php
                    if ($number) {
                        while($rows = mysqli_fetch_assoc($result)) {
                            ?>
                            <?php
                    echo '
                    <div class="content" id="content">
                        <div class="heading" id="heading">
                            <h3 id="title">' . $rows['Job Title'] . '</h3>
                        </div>
                        <div class="parts">
                            <div class="part part1">
                                <article>
                                    <span>' . $rows['Company'] . '</span>
                                    <span>' . $rows['Address'] . '</span>
                                    <span>' . $rows['Email'] . '</span>
                                </article>
                            </div>
                            <div class="part part2">
                                <article>
                                    <span>Opening Date:</span>
                                    <span>' . $rows['Open Date'] . '</span>
                                    <span>Expiry Date:</span>
                                    <span>' . $rows['Expiry Date'] . '</span>
                                </article>
                            </div>
                        </div>
                        <div class="description">
                            <textarea disabled name="description" id="description" rows="10" disabled>' . $rows['Description'] . '</textarea>
                        </div>
                        <div class="buttons">
                            <a class="msg confirmation" href="deleteop.php?op='.$rows['S.N.'].'">
                                <input type="button" class="message" value="Delete">
                            </a>
                        </div>
                    </div>';
                    ?>
                <?php   
                        }
                    } else {
                        echo "Vacancy isn't available in this time !!!...";
                    }
                mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    var elems = document.getElementsByClassName('confirmation');
    var confirmIt = function (e) {
        if (!confirm('Are you sure?')) e.preventDefault();
    };
    for (var i = 0, l = elems.length; i < l; i++) {
        elems[i].addEventListener('click', confirmIt, false);
    }
</script>
</html>