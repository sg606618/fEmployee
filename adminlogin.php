<?php 
    require_once("connectDatabase.php");
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $pass = $_POST['password'];

        // echo password_hash("admin@123", PASSWORD_DEFAULT);
        $sql = "SELECT * FROM `admin` WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num >= 0){
            while($row = mysqli_fetch_assoc($result)){
                if(password_verify($pass, $row['password'])){
                    echo "<script>alert('Login successfull !!!');</script>";
                    header('location: admin.php');
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminLogin</title>
    <?php include('favicon.html'); ?>
    <style><?php include "adminlogin.css"; ?></style>
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                <img src="images/adminImg.png" alt="">
                <strong>Admin Login</strong>
                <input type="text" name="username" id="username" placeholder="Enter username...">
                <input type="password" name="password" id="password" placeholder="Enter password...">
                <input type="submit" value="Login" name="submit">
            </form>
        </div>
    </div>
</body>
</html>