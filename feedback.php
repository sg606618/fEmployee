<?php include_once "connectDatabase.php" ?>
<?php
    $sql = "select * from contact";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    echo "<h1>Messages From Users...</h1><hr>";
    if($num){
        while($row = mysqli_fetch_assoc($result)){
            $sn = $row['sn'];
            $name = $row['Name'];
            $email = $row['Email'];
            $phone = $row['Mobile'];
            $desc = $row['Description'];
            $date = $row['date'];
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
            <h2><?php echo $name; ?></h2>
            <h4><?php echo $desc; ?></h4>
            <p><?php echo $date; ?></p>
            <small><?php echo $email ?></small> ||
            <small><?php echo $phone ?></small>
        </div>
    </div>
    <?php
            }
        }
    ?>
</body>
</html>