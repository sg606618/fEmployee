
<?php 
    // include "loginOrNot.php";
    require_once "connectDatabase.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>fEmployee - Starting Page</title>
    <?php include "favicon.html" ?>
    <style><?php include "style.css" ?></style>
    <style><?php include "main.css" ?></style>
    <style><?php include "terms.css" ?></style>
    <link rel="stylesheet" href="all.css">

</head>

<body>
    <header>
        <?php include "logo/logo.html"; ?>
        <ul>
            <a id="registration" href="#">
                <li id="reg" class="reg">Registration</li>
                <div class="dropdown">
                    <p><a href="signup.html">Employer</p></a>
                    <p><a href="registration.html">Job Seeker</p></a>
                </div>
            </a>
            <a href="adminlogin.php">
                <li id="">Admin</li>
            </a>
            <a href="login.php">
                <li id="">Login</li>
            </a>
        </ul>
    </header>
    <i class="fas fa-key usr"></i>
    <h1 id="vacancies">Vacancies Over Here</h1>
    <div class="search-bar">
        <form onsubmit="search()" method="post">
            <input type="search" name="search" placeholder="Search Keyword ..." id="search">
            <input type="hidden" value="" name="submit" style="display: none;">
            <button type="submit"><b>Search</b></button>
        </form>
    </div>

    <div class="informations">
        <?php
            $sql = "SELECT * FROM openvacancy ORDER BY `S.N.` DESC";
            $result = mysqli_query($conn, $sql);
            if(!$result){
                echo ("<h1 style='color: red; font-weight: 500;'>Wait for Vacancies to be Opened...!!!</h1>");
            }
        ?>
        <script>
            function search(){
                <?php
                    $search = $_POST['search'];
                    if(!$search == ''){
                        $sql = "SELECT * FROM `openvacancy` WHERE `Address` LIKE '%$search%' OR `Company` LIKE '%$search%' OR `Job Title` LIKE '%$search%' OR `Description` LIKE '%$search%' ORDER BY `S.N.` DESC";
                        $result = mysqli_query($conn, $sql);
                        if(!$result){
                            die ("Error in Selecting Database , <br> Please check!!!");
                        }
                    }
                ?>
            }
        </script>
        <?php
            $num = mysqli_num_rows($result);
            // echo $num;
            if($num > 0){
                while($row = mysqli_fetch_assoc($result)){
        ?>
        <div class="vacancy_wrapper">
            <a href="job.php?var=<?= $row['S.N.'] ?>">
                <img src="" alt="<?= $row['Company'] ?>" id="thumbnail">
            </a>
            <div class="info">
                <h2>
                    <a href="job.php?var=<?= $row['S.N.'] ?>">
                        <?= $row['Job Title'] ?>
                    </a>
                </h2>
                <small>
                    <?= $row['Contact'] ?> || <?= $row['Open Date'] ?>
                </small>
                <p>
                    <?= $row['Description'] ?>
                </p>
                <small>
                    <?= $row['Address'] ?> || <?= $row['Expiry Date'] ?>
                </small>
            </div>
        </div>
        <?php
                }
            }else{
                echo "no data found";
            }
            mysqli_close($conn);
        ?>
    </div>

    <?php include "footer.html" ?>

</body>

<script><?php include "script.js"; ?></script>
<script>
    document.getElementById('reg').addEventListener('mouseover', ()=>{
        document.querySelector('.dropdown').style.display = "block";
    });
    document.querySelector('.dropdown').addEventListener('mouseleave', ()=>{
        document.querySelector('.dropdown').style.display = "none";
    });
</script>

</html>