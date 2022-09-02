<?php include_once "connectDatabase.php" ?>
<?php
    $mail = $_GET['mail'];
    $sql = "SELECT * FROM `message` WHERE `useremail` = '$mail'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    echo "<h1>Notification about payment...</h1><hr>";
    if($num){
        while($row = mysqli_fetch_assoc($result)){
            $sn = $row['sn'];
            $name = $row['name'];
            $email = $row['email'];
            $desc = $row['Description'];
            $date = $row['date'];
            $cash = $row['cash'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FeedBacks || fEmployee</title>
    <?php include "favicon.html" ?>
    <style><?php include "feedback.css" ?></style>
</head>
<body>
    <div class="wrapper">
        <div class="content">
            <span><b style="color: green;"><?php echo $name; ?>&nbsp;</b>Give you <?= $cash ?>$ for your genuine work.</span><br>
            <h2>He had something to say!</h2>
            <h4><?php echo $desc; ?></h4>
            <p><?php echo $date; ?></p>
            <small><?php echo $email ?></small>
        </div>
    </div>
    <?php include "footer.html" ?>
    <?php
            }
        }
    ?>
</body>
</html>