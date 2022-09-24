<?php 
    session_start();
    require_once("connectDatabase.php");

    $var = $_GET['var'];

    $sql = "SELECT * FROM openvacancy WHERE `S.N.` = '$var'";
    if(!$result = mysqli_query($conn, $sql)){
        echo "error in selecting";
    }
    $num = mysqli_num_rows($result);
    if($num){
        while($row = mysqli_fetch_assoc($result)){
            $company =mysqli_real_escape_string($conn, $row['Company']);
            $job = mysqli_real_escape_string($conn,$row['Job Title']);
            $address =mysqli_real_escape_string($conn, $row['Address']);
            $contact =mysqli_real_escape_string($conn, $row['Contact']);
            $email =mysqli_real_escape_string($conn, $row['Email']);
            $description =mysqli_real_escape_string($conn, $row['Description']);
            $openDate = mysqli_real_escape_string($conn,$row['Open Date']);
            $expDate = mysqli_real_escape_string($conn,$row['Expiry Date']);
        }
    }
    $name = mysqli_real_escape_string($conn, $_SESSION['name']);
    $skill = mysqli_real_escape_string($conn, $_SESSION['skill']);
    $phone = mysqli_real_escape_string($conn, $_SESSION['phone']);
    $userDesc = mysqli_real_escape_string($conn, $_SESSION['desc']);
    $userEmail = mysqli_real_escape_string($conn, $_SESSION['email']);
    $query = "INSERT INTO `application` (`company`,`job`,`compAddress`,`contact`,`email`,`description`,`openDate`,`expDate`,`name`,`skill`,`phone`,`userDesc`,`userEmail`) VALUES ('$company','$job','$address','$contact','$email','$description','$openDate','$expDate','$name','$skill','$phone','$userDesc','$userEmail')";
    $out = mysqli_query($conn, $query);
    if(!$out){
        echo "you are getting wrong with that";
    }else{
        header('location: userProfile.php');
    }
?>