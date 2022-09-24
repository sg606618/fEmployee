<?php include 'connectDatabase.php' ?>
<?php

	if(isset($_GET['var'])){
		$var = $_GET['var'];
		$sql = "SELECT * FROM registration WHERE `S.N.` = '$var'";
	}
	if(isset($_GET['mail'])){
		$mail = $_GET['mail'];
		$sql = "SELECT * FROM registration WHERE Email = '$mail'";
	}
	$result = mysqli_query($conn, $sql);
	if(!$result){
		echo "error occur";
	}
	$num = mysqli_num_rows($result);
	
	if($num){
		while($row = mysqli_fetch_assoc($result)){
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include "favicon.html" ?>
	<title><?php echo $row['Name']; ?> || fEmployee</title>
	<style><?php include "style.css" ?></style>
	<style><?php include "terms.css" ?></style>
	<style><?php include "individual.css" ?></style>
</head>

<body>

	<div class="wrapper">
		<div class="user">
			<div class="userInfo">
				<h1 class="userName">
					<?php echo $row['Name']; ?>
				</h1>
				<h4 class="skills">
					<?php echo $row['Skill']; ?>
				</h4>
				<p class="userAddress">
					<?php echo $row['Address']; ?>
				</p>
				<small class="userDet">
					<?php echo $row['Email']; ?> ||
					<?php echo $row['Phone']; ?>
				</small>
				<img class="star" src="images/star.png" alt="">
			</div>
			<img src="<?php echo $row['Photo']; ?>" onerror='this.src="images/profile.png";' class="pro" alt="">
		</div>
		<div class="description">
			<label class="desc" for="desc">About</label>
			<textarea name="desc" id="desc" disabled><?php echo $row['Description']; ?></textarea>
		</div>
		<div class="experience">
			<label class="exp" for="exp">Experience</label>
			<p class="expe" name="exp"><?php echo $row['Experience']; ?></p>
		</div>
		<div class="experience">
			<a class="msge" href="<?php echo $row['cv']; ?>" download>
				<input type="button" class="message" value="Download CV">
			</a>
		</div>
	</div>
	<?php 
	$val = $row['Email'];
			}
		}
		mysqli_close($conn);
	?>
</body>
<script><?php include "script.js"; ?></script>
</html>