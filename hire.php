<?php include_once "connectDatabase.php" ?>
<?php 
    include "loginOrNot.php";

    $sql = "SELECT * FROM registration ORDER BY `S.N.` DESC";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        die ("Error in Selecting Database , <br> Please check!!!");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hire Workers</title>
    <?php include "favicon.html" ?>
    <!-- <link rel="stylesheet" href="hire.css"> -->
    <style>
        <?php include "hire.css" ?>
    </style>
    <link rel="stylesheet" href="terms.css">


    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
    <script>
        function search(){
            <?php
                $search = $_POST['search'];
                if(!$search == ''){
                    $sql = "SELECT * FROM registration WHERE `Skill` LIKE '%$search%' ORDER BY `S.N.` DESC";
                    $result = mysqli_query($conn, $sql);
                    if(!$result){
                        die ("Error in Selecting Database , <br> Please check!!!");
                    }
                }
            ?>
        }
    </script>
<body>
    <div class="container">
        <h2 id="logo">fEmployee</h2>
        <hr>
        <h2 class="find">Find Workers Here !</h2>
        <div class="search-bar">
            <form onsubmit="search()" method="post">
                <a href="index.php">
                    <img src="images/back_button.png" alt="" id="back_sign">
                </a>
                <input type="search" name="search" placeholder="Search for skill you need ..." id="search">
                <input type="hidden" value="" name="submit" style="display: none;">
                <button type="submit"><i class="fa fa-search fa-2x" id="search-icon"></i></button>
            </form>
        </div>
        <hr>
    </div>
    <div class="information" style="padding: 0 10%">
        <?php
            $num = mysqli_num_rows($result);
            // echo $num;
            if($num > 0){
                while($row = mysqli_fetch_assoc($result)){
        ?>
        <div class="contentinfo">
            <div class="info">
                <div class="top_section">
                    <div class="image-icons">
                        <a href="individual.php?var=<?php echo $row['Email'] ?>">
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
                    <a class="msg" href="<?php echo $row['cv']; ?>" download>
                        <input type="button" class="message" value="Download CV">
                    </a>
                </div>
            </div>
        </div>
        <?php
                }
            }else{
                echo "<p style='font-size: 20px; color: red;'>No such skill found... Try another!!!</p>";
            }
            mysqli_close($conn);
        ?>
    </div>
    <?php include "footer.html" ?>
</body>
</html>