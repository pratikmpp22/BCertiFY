<?php include ( "inc/connect.inc.php" ); ?>
<?php 
ob_start();
session_start();
if (!isset($_SESSION['user_login'])) {
	$user = "";
}
else {
	$user = $_SESSION['user_login'];
	$result = mysqli_query($con, "SELECT * FROM user WHERE id='$user'");
	$get_user_email = mysqli_fetch_assoc($result);
	$uname_db = $get_user_email != null ? $get_user_email['firstName'] : null;

}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>BCertiFY</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<script src="/js/homeslideshow.js"></script>
	</head>
	<body style="min-width: 980px;">
		<div class="homepageheader">
			<div class="signinButton loginButton" style="float:right" >


			<div class="uiloginbutton signinButton loginButton" style="margin-right: 5px;"> 
					<?php 
						if ($user!="") {
							echo '<a style="text-decoration: none; color: #fff;" href="sign_doc.php?uid='.$user.'">Hi '.$uname_db.'</a>';
						}
						else {
							echo '<a style="text-decoration: none; color: #fff;" href="login.php">LOG IN</a>';
						}
					 ?>
				</div>




				<div class="uiloginbutton signinButton loginButton" style="margin-right: 19px;">
					<?php 
						if ($user!="") {
							echo '<a style="text-decoration: none; color: #fff;" href="logout.php">LOG OUT</a>';
						}
						else {
							echo '<a style="color: #fff; text-decoration: none;" href="signup.php">SIGN UP</a>';
						}
					 ?>
					
				</div>

			</div>
			<div style="float: left; margin: 5px 0px 0px 23px;">
				<a href="index.php">
<img style=" height: 75px; width: 75px;" src="../../image/icon.png">

				</a>
			</div>

		</div>
		<div class="home-welcome">
			<div class="home-welcome-text" >
				<div style="padding-top: 180px;">
					<div style=" background-color: #dadbe6;">
						<h1 style="margin: 0px;">BCertiFY</h1>
						<h2>Blockchain Based Certificate Specification</h2>
					</div>
				</div>
			</div>
		</div>

		
	</body>
</html>