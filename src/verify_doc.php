<?php include ( "inc/connect.inc.php" ); ?>
<?php 

ob_start();
session_start();
if (!isset($_SESSION['user_login'])) {
	header("location: login.php");
} 
else {
	$user = $_SESSION['user_login'];
	$result = mysqli_query($con, "SELECT * FROM user WHERE id='$user'");
		$get_user_email = mysqli_fetch_assoc($result);
			$uname_db = $get_user_email['firstName'];
			$uemail_db = $get_user_email['email'];
			$address_db = $get_user_email != null ? $get_user_email['address'] : null;
			$uadd_db = $get_user_email['address'];
}
$certi_id = "";
$pub_key = "";
if (isset($_REQUEST['uid'])) {
	
	$user2 = mysqli_real_escape_string($con, $_REQUEST['uid']);
	if($user != $user2){
		header('location: index.php');
	}
}else {
	header('location: index.php');
}

$search_value = "";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Noodles&Canned</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body >
	<div class="homepageheader">
			<div class="signinButton loginButton"  style="float:right">



			<div class="uiloginbutton signinButton loginButton" style="">
					<?php 
						if ($user!="") {
							echo 'Hi, '.$uname_db.'';
						}
						else {
							echo '<a style="text-decoration: none; color: #fff;" href="login.php">LOG IN</a>';
						}
					 ?>
				</div>



				<div class="uiloginbutton signinButton loginButton style='float:right'">
					<?php 
						if ($user!="") {
							echo ''.$address_db.'';
						}
						else {
							echo '';
						}
					 ?>
				</div>


			

				<div class="uiloginbutton signinButton loginButton" style="margin-right: 10px;">
					<?php 
						if ($user!="") {
							echo '<a style="text-decoration: none; color: #fff;" href="logout.php">LOG OUT</a>';
						}
						else {
							echo '<a style="text-decoration: none; color: #fff;" href="signup.php">SIGN IN</a>';
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
					
					<th>
						<?php echo '<a href="sign_doc.php?uid='.$user.'" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #fff;border-radius: 12px;">Sign Document</a>'; ?>
					</th>
					<th>
						<?php echo '<a href="verify_doc.php?uid='.$user.'" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #e6b7b8;border-radius: 12px;">Verify Document</a>'; ?>
					</th>
					<th><?php echo '<a href="reset.php?uid='.$user.'" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #fff;border-radius: 12px;">Reset Password</a>'; ?></th>
					

				</tr>
			</table>
		</div>



		<<?php 
			if(isset($success_message)) {echo $success_message;}
			else {
				echo '
					<div class="holecontainer" style="float: right; margin-right: 36%; padding-top: 20px;">
						<div class="container">
							<div>
								<div>
									<div class="signupform_content">
										<h2 style="margin-left:149px">Verify Document</h2>
										<div class="signup_error_msg" id="error">';
											if (isset($error_message)) {echo $error_message;}
										echo '</div>
										<div class="signupform_text"></div>
										<div>

											<form action="" method="POST" class="registration" enctype="multipart/form-data">
												<div class="signup_form " style="padding-left: 0px;">

									

											<div>
											<div class="label_content1" style="float: left;">
  											<h5>Issuers Public Address:</h5>
  											</div>
												<td >
												<input name="iAddress" id="iAddress" style="margin-left: 8px; id="last_name" required="required" class="last_name signupbox" type="text" size="30" value="'.$pub_key.'" >
												</td>
											</div></br>
											

											<div>
											<div class="label_content1" style="float: left;">
  											<h5 style="margin-left:167px">Upload File:</h5>
  											</div>
											<input name="pdf_file" id="pdf_file" style=" font-size: 20px;
														font-style: italic;margin-bottom: 3px;margin-top: 0px;padding: 14px;line-height: 25px;border-radius: 4px;border: 1px solid #169E8F;color: #169E8F;margin-left: 11px;width: 270px;background-color: transparent;" class="form-control" type="file" accept=".pdf" title="Upload PDF" value="Add Pic">
											</div></br>




											<div>
											<input name="verify"  style=" font-size: 20px;
														font-style: italic;margin-bottom: 3px;margin-top: 0px;padding: 14px;line-height: 25px;border-radius: 4px;border: 1px solid #169E8F;color: #000;margin-left: 346px;width: 304px;background-color: transparent;" class="uisignupbutton signupbutton" type="button" value="Verify" onclick="verif()"  >
											</div>

											
											</div>
											</form>
											
											


											<div>
												<textarea id="story" name="story" rows="5" cols="33" style="margin-left:438px;margin-top:50px">
												</textarea>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
					<script src="js/verifying.js"></script>



				';

				
			}

		 ?>

	
</body>
</html>