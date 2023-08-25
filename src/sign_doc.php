<?php include ( "inc/connect.inc.php" ); ?>
<?php 
ob_start();
session_start();
if (!isset($_SESSION['user_login'])) {
	header("location: login.php");
	$user = "";
}
else {
	$user = $_SESSION['user_login'];
	$result = mysqli_query($con, "SELECT * FROM user WHERE id='$user'");
		$get_user_email = mysqli_fetch_assoc($result);
			$uname_db = $get_user_email['firstName'];
			$uemail_db = $get_user_email['email'];
			$recipientAddress = $get_user_email != null ? $get_user_email['address'] : null;
			$uadd_db = $get_user_email['address'];
}


$iname = "";
$rname = "";

if (isset($_POST['signup'])) {
//declere veriable
$iname = $_POST['iname'];
$rname = $_POST['rname'];
$file_name = $_FILES['pdf_file']['name'];
//triming name
$_POST['iname'] = trim($_POST['iname']);

//finding file extention
$profile_pic_name = @$_FILES['pdf_file']['name'];
$file_basename = substr($profile_pic_name, 0, strripos($profile_pic_name, '.'));
$file_ext = substr($profile_pic_name, strripos($profile_pic_name, '.'));
		
$filename = strtotime(date('Y-m-d H:i:s')).$file_ext;

	if (file_exists("image/".$filename)) {
		echo @$_FILES["pdf_file"]["name"]."Already exists";
	}else {
		if(move_uploaded_file(@$_FILES["pdf_file"]["tmp_name"], "image/".$filename)){
			$photos = $filename;
			$result = mysqli_query($con, "INSERT INTO products(iname,rname, filename) VALUES ('$_POST[iname]','$_POST[rname]','$photos')");
				header("Location: sign_doc.php");
		}else {
			echo "Something Worng on upload!!!";
		}
		//echo "Uploaded and stored in: userdata/profile_pics/$item/".@$_FILES["pdf_file"]["name"];
		
		
	}
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
			<div class="signinButton loginButton" style="float:right">

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
							echo ''.$recipientAddress.'';
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
					<th><?php echo '<a href="sign_doc.php?uid='.$user.'" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #e6b7b8;border-radius: 12px;">Sign Document</a>'; ?></th>
					
					<th>
						<?php echo '<a href="verify_doc.php?uid='.$user.'" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #fff;border-radius: 12px;">Verify Document</a>'; ?>
					</th>
					<th><?php echo '<a href="reset.php?uid='.$user.'" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #fff;border-radius: 12px;">Reset Password</a>'; ?></th>
					

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
										<h2 style="margin-left:149px">Sign Document</h2>
										<div class="signup_error_msg">';
											if (isset($error_message)) {echo $error_message;}
										echo '</div>
										<div class="signupform_text"></div>
										<div>

											<form action="" method="POST" class="registration" enctype="multipart/form-data">
												<div class="signup_form">

											
											

											<div>
											<div class="label_content1" style="float: left;">
  											<h5>Upload File:</h5>
  											</div>
											<input name="pdf_file" id="pdf_file" style=" font-size: 20px;
														font-style: italic;margin-bottom: 3px;margin-top: 0px;padding: 14px;line-height: 25px;border-radius: 4px;border: 1px solid #169E8F;color: #169E8F;margin-left: 70px;width: 270px;background-color: transparent;" class="form-control" type="file" accept=".pdf" title="Upload PDF" value="Add Pic">
											</div></br>


											<div>
											<input name="Sign"  style=" font-size: 20px;
														font-style: italic;margin-bottom: 3px;margin-top: 0px;padding: 14px;line-height: 25px;border-radius: 4px;border: 1px solid #169E8F;color: #000;margin-left: 240px;width: 304px;background-color: transparent;" class="uisignupbutton signupbutton" type="button" value="Sign" onclick="sign()"  >
											</div>

											
											</div>
											
											</form>
											<div>
											<textarea id="story" name="story" rows="5" cols="33" style="margin-left:350px;margin-top:50px">
											</textarea>
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<script src="https://cdn.jsdelivr.net/npm/web3@1.5.0/dist/web3.min.js"></script>
					<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
					<script type="module" src="js/signing.js"></script>
	
				';
			}

		 ?>
	
</body>
</html>