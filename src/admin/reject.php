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

?>




<!doctype html>
<html>
	<head>
		<title>Welcome to ebuybd online shop</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css">
	</head>
	<body class="home-welcome-text" >
		<div class="homepageheader">
			<div class="signinButton loginButton"style="float:right">
				<div class="uiloginbutton signinButton loginButton" style="margin-right: 40px;">
					<?php 
						if ($user!="") {
							echo '<a style="text-decoration: none;color: #fff;" href="logout.php">LOG OUT</a>';
						}
					 ?>
					
				</div>
				<div class="uiloginbutton signinButton loginButton">
					<?php 
						if ($user!="") {
							echo '<a style="text-decoration: none;color: #fff;" href="login.php">Hi '.$uname_db.'</br><span style="color: #de2a74">'.$utype_db.'</span></a>';
						}
						else {
							echo '<a style="text-decoration: none;color: #fff;" href="login.php">LOG IN</a>';
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
		<div class="categolis">
			<table>
				<tr>
					
					<th><a href="reject.php" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #24bfae;border-radius: 12px;">Reject Document</a></th>
					<th><a href="sign_doc.php" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #24bfae;border-radius: 12px;">Sign Document</a></th>
					<th><a href="verify_doc.php" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #24bfae;border-radius: 12px;">Verify Document</a></th>


				</tr>
			</table>
		</div>











		<?php 
			if(isset($success_message)) {echo $success_message;}
			else {
				echo '
					<div class="holecontainer" style="float: right; margin-right: 36%; padding-top: 20px;">
						<div class="container">
							<div>
								<div>
									<div class="signupform_content">
										<h2 style="margin-left:149px">Reject Document</h2>
										<div class="signup_error_msg">';
											if (isset($error_message)) {echo $error_message;}
										echo '</div>
										<div class="signupform_text"></div>
										<div>

											<form action="" method="POST" class="registration" enctype="multipart/form-data">
												<div class="signup_form">

											<div>
											<div class="label_content" style="float: left;">
											</div></br>
											

											<div>
											<div class="label_content1" style="float: left;">
  											<h5>Upload File:</h5>
  											</div>
											<input name="pdf_file"style=" font-size: 20px;
														font-style: italic;margin-bottom: 3px;margin-top: 0px;padding: 14px;line-height: 25px;border-radius: 4px;border: 1px solid #169E8F;color: #169E8F;margin-left: 70px;width: 270px;background-color: transparent;" class="form-control" type="file" accept=".pdf" title="Upload PDF" value="Add Pic">
											</div></br>


											<div>
											<input name="Reject"  style=" font-size: 20px;
														font-style: italic;margin-bottom: 3px;margin-top: 0px;padding: 14px;line-height: 25px;border-radius: 4px;border: 1px solid #169E8F;color: #000;margin-left: 240px;width: 304px;background-color: transparent;" class="uisignupbutton signupbutton" type="submit" value="Reject" onclick="reject()">
											</div>
											</div>
											</form>
										

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
					<script src="js/rejecting.js"></script>

				';
			}

		 ?>

	</body>
</html>