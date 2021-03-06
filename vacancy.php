<?php session_start(); ?>
<?php include 'connectDatabase.php';?>

<?php    
    $sql = "SELECT * FROM openvacancy ORDER BY `S.N.` DESC";
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
    <title>Vacancies</title>
    <!-- <link rel="stylesheet" media="all" href="vacancy.css"> -->
    <style><?php include 'vacancy.css'; ?></style>
    <link rel="stylesheet" media="all" href="terms.css">

    <!-- Google font awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
</head>
    <script>
        function search(){
            <?php
                $search = $_POST['search'];
                if(!$search == ''){
                    $sql = "SELECT * FROM openvacancy WHERE `Job Title` LIKE '%$search%' ORDER BY `S.N.` DESC";
                    $result = mysqli_query($conn, $sql);
                    if(!$result){
                        die ("Error in Selecting Database , <br> Please check!!!");
                    }
                }
            ?>
        }
    </script>
<body>
    <h2 id="logo">fEmployee</h2><hr>
    <h2 class="find">Find Vacancies here !</h2>
    <div class="search-bar">
        <form onsubmit="search();" method="post">
            <a href="index.php">
                <img src="images/back_button.png" alt="" id="back_sign">
            </a>
            <input type="search" name="search" placeholder="Search which skill you have ..." id="searchBox">
            <input type="submit" value="" name="submit" style="dipaly: none;">
            <i class="fa fa-search fa-2x" id="search-icon"></i>
        </form>
    </div>
    <hr>
    <div class="container1" id="container">
        <?php
            if (mysqli_num_rows($result)) {
                while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <?php
            echo '<div class="content" id="content">
                <div class="heading" id="heading">
                    <h3 id="title">' . $row['Job Title'] . '</h3>
                </div>
                <div class="parts">
                    <div class="part part1">
                        <article>
                            <span>' . $row['Company'] . '</span>
                            <span>' . $row['Address'] . '</span>
                            <span>' . $row['Email'] . '</span>
                        </article>
                    </div>
                    <div class="part part2">
                        <article>
                            <span>Opening Date:</span>
                            <span>' . $row['Open Date'] . '</span>
                            <span>Expiry Date:</span>
                            <span>' . $row['Expiry Date'] . '</span>
                        </article>
                    </div>
                </div>
                <div class="description">
                    <textarea disabled name="description" id="description" rows="10" disabled>' . $row['Description'] . '</textarea>
                </div>
                <a href="mailto: '.$row['Email'].'">
                    <input type="button" id="button" value="Contact">
                </a>
            </div>';
            ?>
        <?php   
                }
            } else {
                echo "This work isn't available in this time !!! <br> Try this later...";
            }
            mysqli_close($conn);
        ?>
    </div>
    <hr>
    <div class="terms-conditions">
        <div class="terms">
            <h1 id="terms">Terms</h1>
            <a href="privacyPolicy.php" target="_blank" class="privacyPolicy">Privacy Policy</a>
            <a href="termsCondition.php" target="_blank" class="privacyPolicy">Terms and Conditions</a>
        </div>
        <h2 id="logo" class="logoE">fEmployee</h2>

        <div>
            <p class="copyright">
                fEmployee is a registered trademark of Freelancer Technology Pty Limited
            </p>
        </div>
        <div>
            <p class="copyright">
                Copyright &copy; 2022 Freelancer Technology Pty Limited
            </p>
        </div>
</body>

    <script>
        const searchFilter = () => {
            let filter = document.getElementById('searchBox').value.toUpperCase();
            let head = document.querySelector('.heading');
            
            for (var i = 0; i < head.length; i++){
                let job = head[i].getElementsByTagName('h3');
                let textValue = job.textContent || job.innerHTML;
                if(textValue.indexOf(filter) > -1){
                    head[i].style.display = '';
                }else{
                    head[i].style.display = 'none';
                }
            }
    }
    </script>

</html>