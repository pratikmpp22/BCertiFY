<?php include ( "../inc/connect.inc.php" ); ?>
<?php 
ob_start();
session_start();
if (!isset($_SESSION['admin_login'])) {
	header("location: login.php");
	$user = "";
}
else {
	$user = $_SESSION['admin_login'];
	$result = mysqli_query($con, "SELECT * FROM admin WHERE id='$user'");
		$get_user_email = mysqli_fetch_assoc($result);
			$uname_db = $get_user_email['firstName'];
			$utype_db=$get_user_email['type'];
}
$search_value = "";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Welcome to ebuybd online shop</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<script src="/js/homeslideshow.js"></script>
	</head>
	<body style="min-width: 980px;">
		<div class="homepageheader">
			<div class="signinButton loginButton" style="float:right">
				<div class="uiloginbutton signinButton loginButton" style="margin-right: 40px;">
					<?php 
						if ($user!="") {
							echo '<a style="text-decoration: none;color: #fff;" href="logout.php">LOG OUT</a>';
						}
						else {
							echo '<a style="text-decoration: none;color: #fff;" href="signup.php">SIGN IN</a>';
						}
					 ?>
					
				</div>
				<div class="uiloginbutton signinButton loginButton" style="">
					<?php 
						if ($user!="") {
							echo '<a style="text-decoration: none;color: #fff;" href="update_admin.php">Hi '.$uname_db.'</br><span style="color: #010a0e">'.$utype_db.'</span></a>';
						}
						else {
							echo '<a style="text-decoration: none;color: #fff;" href="login.php">LOG IN</a>';
						}
					 ?>
				</div>
			</div>
			<div style="float: left; margin: 5px 0px 0px 23px;">
				<a href="index.php">
					<img style=" height: 75px; width: 70px;" src="../../image/icon.png">
				</a>
			</div>

		</div>
		<div class="categolis">
			<table>
				<tr>
					<th><a href="reject.php" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #e6b7b8;border-radius: 12px;">Reject Certificate</a></th>
				</tr>
			</table>
		</div>
		<div class="home-welcome" style="text-align: center; padding-bottom:20px; ">
			<div class="home-welcome-text">
				<h1>Welcome To Admin Panel</h1>
				<h2>You have all permission to do!</h2>
			</div>
		</div>
	</body>
</html>