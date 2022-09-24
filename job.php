<?php
    session_start();
    require_once('connectDatabase.php');

    if(isset($_POST['submit'])){
        if(isset($_SESSION['username'])){
            echo "<script>alert('You are not able to Apply for a job. You can Add vacancy.'); history.back();</script>";
        }
        if(!isset($_SESSION['name'])){
            echo "<script>alert('You have to login first'); location.replace('login.php');</script>";
        }else{
            
        }
    }
    
    if(isset($_GET['var'])){
        $sn = $_GET['var'];
        $sql = "SELECT * FROM `openvacancy` WHERE `S.N.` = '$sn'";
        $result = mysqli_query($conn, $sql);
        if(!$result){
            die("You have some issues...");
        }
        $num = mysqli_num_rows($result);
        if($num){
            while ($row = mysqli_fetch_assoc($result)){
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "favicon.html" ?>
    <title><?= $row['Job Title'] ?></title>
    <style><?= include "job.css"; ?></style>
</head>
<body>
    <div class="container">
        <form action="<?php htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
            <h1><?= $row['Job Title']; ?></h1>
            <h3><?= $row['Company']; ?></h3>
            <small><?= $row['Address'] ?> || <?= $row['Contact'] ?> || <?= $row['Email'] ?></small>
            <p><?= $row['Description']; ?></p>
            <small>Expired in <?= $row['Expiry Date'] ?></small>
            <a class="msg" href="apply.php?var=<?php echo $row['S.N.']; ?>">
                <input type="button" class="message" value="Apply" name="submit">
            </a>
        </form>
    </div>
    <?php
                }
            }
        }
        mysqli_close($conn);
    ?>
</body>
</html>