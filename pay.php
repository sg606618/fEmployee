<?php session_start(); ?>
<?php
    if( isset($_SESSION['submit']) && 
        $_SESSION['submit'] == $_POST['submit'] ){
    }
    else{
        $_SESSION['submit'] = $_POST['submit'];
    } 
?>
<?php require_once("connectDatabase.php"); ?>
<?php 

    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($conn,$_POST['name']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $cash = $_POST['cash'];
        $reason = mysqli_real_escape_string($conn,$_POST['reason']);
        $value = $_POST['value'];
        // echo $value;

        $sql = "UPDATE `registration` SET `Cash` = Cash+$cash WHERE Email = '$value'";
        $result = mysqli_query($conn, $sql);
        if(!$result){
            echo "You have to enter some pay...";
        }else{
            echo "Successfull";
            ?>
            <script>
                window.location.replace("index.php");
            </script>
            <?php
        }

        $query = "INSERT INTO `message` (`name`, `email`, `useremail`, `cash`, `Description`) VALUES ('$name', '$email', '$value', '$cash', '$reason')";
        $check = mysqli_query($conn, $query);
        if(!$check){
            echo "You have to enter some pay...";
        }else{
            echo "Successfull";
            ?>
            <script>
                window.location.replace("index.php");
            </script>
            <?php
        }
    }
?>