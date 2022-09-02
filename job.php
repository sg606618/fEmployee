<?php
    require_once('connectDatabase.php');
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
        <form action="" method="post">
            <h1><?= $row['Job Title']; ?></h1>
            <h3><?= $row['Company']; ?></h3>
            <small><?= $row['Address'] ?> || <?= $row['Contact'] ?> || <?= $row['Email'] ?></small>
            <p><?= $row['Description']; ?></p>
            <small>Expired in <?= $row['Expiry Date'] ?></small>
            <input type="submit" value="Apply" name="submit">
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