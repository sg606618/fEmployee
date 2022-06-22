<?php include 'connectDatabase.php' ?>
<?php
	$mail = $_GET['var'];
	// echo $mail;
	$sql = "select * from registration where `Email` = '$mail'";
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
	<title><?php echo $row['Name']; ?> || fEmployee</title>
	<style><?php include "style.css" ?></style>
	<style><?php include "terms.css" ?></style>
	<style><?php include "individual.css" ?></style>
</head>

<body>
	<header>
		<h2 id="logo">fEmployee</h2>
		<ul>
			<?php
                echo '<a href="logout.php">
                <li id="startLogin" style="margin-left: -50%;">Logout</li>
                </a>';
            ?>
		</ul>
	</header>

	<nav id="nav">
		<ul>
			<img src="images/ThreeLineDot.png" alt="" id="threeLine" onclick="displayThreeLine()" />
			<!-- <a href="userProfile.php">
                <img src="images/profile.png" id="profile2" alt="">
            </a> -->
			<li><a href="index.php">Home</a></li>
			<li><a href="vacancy.php">Find Vacancies</a></li>
			<li><a href="about.php">About</a></li>
		</ul>
		<a href="contact.php"><button id="contact_btn">Contact</button></a>
	</nav>
	<section id="menus">
		<ul>
			<!-- <a href="userProfile.php">
                <img src="images/profile.png" id="profile1" alt="">
            </a> -->
			<li><a href="index.php">Home</a></li>
			<li><a href="vacancy.php">Find Vacancies</a></li>
			<li><a href="about.php">About</a></li>
			<li onclick="hideThreeLine()"><a>Exit</a></li>
		</ul>
		<img class="section-images" src="images/facebook-icon.png" alt="">
		<img class="section-images" src="images/instagram-icon.png" alt="">
		<img class="section-images" src="images/twitter-icon.png" alt="">
	</section>

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
		<div class="userPortfolio">
			<h3 class="portfolio">Portfolio (ScreenShots)</h3>
			<div class="portimg">
				<img class="imgport" src="images/userPortfolio.jpg" alt="">
				<img class="imgport" src="images/userPortfolio.jpg" alt="">
				<img class="imgport" src="images/userPortfolio.jpg" alt="">
			</div>
			<h3 style="margin-top: 20px;" class="portfolio">Project Links</h3>
			<a href="https:\\www.userprofile.com">My Profile</a>
			<a href="https:\\www.femployee.com">fEmployee</a>
		</div>
		<h3 class="work">Working History</h3>
		<div class="workingHistory">
			<h4 class="company">AAA Company Ltd.</h4>
			<p class="wh">This is the project to make a logo for our company. We use the previous logo for a years and
				we want to change the logo in a new design.</p>
			<h4 class="company">AAA Company Ltd.</h4>
			<p class="wh">This is the project to make a logo for our company. We use the previous logo for a years and
				we want to change the logo in a new design.</p>
			<h4 class="company">AAA Company Ltd.</h4>
			<p class="wh">This is the project to make a logo for our company. We use the previous logo for a years and
				we want to change the logo in a new design.</p>
		</div>
		<h3 class="expe">Experiences</h3>
		<p class="exp">3 years as a intern in <b>Bajra Int'l</b></p>
		<!-- <input type="submit" value="Hire" name="hire">   -->
	</div>

	<div class="terms-conditions">
		<div class="terms">
			<h1 id="terms">Terms</h1>
			<a href="privacyPolicy.php" class="privacyPolicy">Privacy Policy</a>
			<a href="termsCondition.php" class="privacyPolicy">Terms and Conditions</a>
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
	</div>
	<?php 
			}
		}
		mysqli_close($conn);
	?>
	
</body>

</html>