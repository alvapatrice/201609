<?php
	ob_start();
	session_start();
?>
<html>
<?php
	require "includes/header.php";
?>
		
		<!--profile starts here-->
		<?php
			$emm=$_SESSION["email"];
			$pw=$_SESSION["password"];
			$user=$_SESSION["username"];
			$fir="";
			$las="";
			$name="";
			$pas="";
			$cpas="";
			$gen="";
			$cred="";
			$add="";
			$ph="";
			$img_url="";
			$s="select user_id from users where email='".$_SESSION["email"]."'";
			$result = $conn->query($s);
			if ($result->num_rows!=0) 
			{
				if($row = $result->fetch_assoc())
				{ 
					$_SESSION["u_id"]=$row["user_id"];
				}
			}
			$t=0;
			$s="select * from profile where u_id='".$_SESSION["u_id"]."'";
			$result = $conn->query($s);
			if ($result->num_rows!=0) 
			{
				$t=0;
			}
			else
			{
				$t=1;
			}
			if(isset($_POST['upp']))
			{
				$fir=$_POST['firstName'];
				$las=$_POST['lastName'];
				$name=$fir." ".$las;
				$pas=$_POST['passw'];
				$cpas=$_POST['confirmPassword'];
				$gen=$_POST['gender'];
				$cred=$_POST['cred'];
				$add=$_POST['senderAddress'];
				$ph=$_POST['senderPhone'];
				$img_file=$_FILES['img']['tmp_name'];
				$target_file=basename($_FILES['img']['name']);
				$upload_dir="img/";
				$_SESSION["password"]=$pas;
				$pw=$pas;
				move_uploaded_file($img_file, $upload_dir."/".$target_file);
				// Perform Update
				$img_url =$target_file ;
				if($t==1)
				{
					if(isset($_SESSION['type']))
					{
						if($_SESSION['type']=='doctor')
						{
							$s="INSERT INTO profile (u_id,fstname,lstname,gender,credit_card,pic) VALUES('".$_SESSION["u_id"]."','$fir','$las','$gen','$cred','$img_url')";
							$conn->query($s);
							$sql = "UPDATE users SET password=\"$pas\" WHERE user_id='".$_SESSION["u_id"]."'";
							$conn->query($sql);
							$s="INSERT INTO doctors (u_id,name,location,phn,email) VALUES('".$_SESSION["u_id"]."','$name','$add','$ph','".$_SESSION["email"]."')";
							$conn->query($s);
						}
						else
						{
							$s="INSERT INTO profile (u_id,fstname,lstname,gender,credit_card,phn,address,pic) VALUES('".$_SESSION["u_id"]."','$fir','$las','$gen','$cred','$ph','$add','$img_url')";
							$conn->query($s);
							$sql = "UPDATE users SET password=\"$pas\" WHERE user_id='".$_SESSION["u_id"]."'";
							$conn->query($sql);
						}
					}
				}
				else
				{
					if(isset($_SESSION['type']))
					{
						if($_SESSION['type']=='doctor')
						{
							if($img_url=="")
							{
								$s="UPDATE profile SET fstname=\"$fir\",lstname=\"$las\",gender=\"$gen\",credit_card=\"$cred\" where u_id='".$_SESSION["u_id"]."'";
							}
							else
							{
								$s="UPDATE profile SET fstname=\"$fir\",lstname=\"$las\",gender=\"$gen\",credit_card=\"$cred\",pic=\"$img_url\" where u_id='".$_SESSION["u_id"]."'";
							}
							$conn->query($s);
							$sql = "UPDATE users SET password=\"$pas\" WHERE user_id='".$_SESSION["u_id"]."'";
							$conn->query($sql);
							$em=$_SESSION["email"];
							$s="UPDATE doctors SET name=\"$name\",location=\"$add\",phn=\"$ph\",email=\"$em\" where u_id='".$_SESSION["u_id"]."'";
							$conn->query($s);
						}
						else
						{
							if($img_url=="")
							{
								$s="UPDATE profile SET fstname=\"$fir\",lstname=\"$las\",gender=\"$gen\",credit_card=\"$cred\",phn=\"$ph\",address=\"$add\" where u_id='".$_SESSION["u_id"]."'";
							}
							else
							{
								$s="UPDATE profile SET fstname=\"$fir\",lstname=\"$las\",gender=\"$gen\",credit_card=\"$cred\",phn=\"$ph\",address=\"$add\",pic=\"$img_url\" where u_id='".$_SESSION["u_id"]."'";
							}
							$conn->query($s);
							$sql = "UPDATE users SET password=\"$pas\" WHERE user_id='".$_SESSION["u_id"]."'";
							$conn->query($sql);
						}
					}
				}
			}
			
			$s="select * from profile where u_id='".$_SESSION["u_id"]."'";
			$result = $conn->query($s);
			if ($result->num_rows!=0) 
			{
				if($row = $result->fetch_assoc())
				{
					$fir=$row["fstname"];
					$las=$row["lstname"];
					$gen=$row["gender"];
					$cred=$row["credit_card"];
					if($_SESSION['type']=='doctor')
					{
						$s="select * from doctors where u_id='".$_SESSION["u_id"]."'";
						$result = $conn->query($s);
						if ($result->num_rows!=0) 
						{
							if($row = $result->fetch_assoc())
							{
								$add=$row["location"];
								$ph=$row["phn"];
							}
						}
					}
					else
					{
						$add=$row["address"];
						$ph=$row["phn"];
					}
				}
			}
		?>
		<div class="container" >
			<div class="row" >
				<div class="col-sm-8 col-sm-offset-2">
					<div class="page-header">
						<h2>Profile</h2>
					</div>
					
					<form id="defaultForm" method="post" class="form-horizontal" action="profile.php" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-sm-3 control-label">Full name</label>
							<div class="col-sm-4">
							<textarea class="form-control" rows="1" name="firstName"
											required data-fv-notempty-message="First name" placeholder="First name" maxlength="75"><?php echo $fir;?></textarea>
							</div>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="lastName" placeholder="Last name" value=<?php echo $las;?> >
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Username</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" value=<?php echo $user;?> readonly>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Email address</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" value=<?php echo $emm;?> readonly>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Password</label>
							<div class="col-sm-4">
								<input type="password" class="form-control" name="passw" required value=<?php echo $pw;?> >
							</div>
							<div class="col-sm-4">
								 <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm" required value=<?php echo $pw;?>>
		
							</div>
						</div>
							
				   <div class="form-group">
							<label class="col-sm-3 control-label">Gender</label>
							<div class="col-sm-6">
								<div class="radio">
									<label>
										<input type="radio" name="gender" value="Male" <?php if($gen=="Male")echo "checked"?> /> Male
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="gender" value="Female" <?php if($gen=="Female")echo "checked"?> /> Female
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Credit Card No.</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" name="cred" required value=<?php echo $cred;?>>
							</div>
						</div>
						<div class="form-group">
								<label class="col-lg-3 control-label">Address</label>
								<div class="col-lg-5">
									 <textarea class="form-control" rows="5" name="senderAddress"
											required data-fv-notempty-message="The address is required" maxlength="75"><?php echo $add;?></textarea>
								</div>
							</div>
							<div class="form-group">
							<label class="col-lg-3 control-label">Phone</label>
							<div class="col-lg-5">
								<input class="form-control" type="text" name="senderPhone" value=<?php echo $ph;?> >
							</div>
							</div>
							<div class="form-group">
							<br>
							<div class="col-lg-5 col-sm-offset-3">
								<br>
								<input type="file" accept="image/*" onchange="loadFile(event)" name="img" id="img">
								<img id="output" style="width:70%; margin-top:10px;"/>
							</div>
							</div>
							<br>
							<div class="form-group">
							<div class="col-sm-8 col-sm-offset-4">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<button type="submit" class="btn btn-primary" name="upp" value="upp">Update</button>
							</div>
						</div>
						<?php
						if(isset($_SESSION['type']))
						{
							if($_SESSION['type']=='doctor')
							{
						?>
							<br>
							<p style="color:red;font-size:20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Go to <a href="dpanel.php" style="text-decoration:none;">Doctor Panel</a> to edit your information and visit hours.</p>
						<?php
							}
						}
						?>
						<br>
					</form>
				</div>
			</div>
		</div>
		<!--profile ends here-->
		<!-- FOOTER Starts Here-->
		
		<link href="css/font-awesome.min.css" rel="stylesheet">
<?php
	include"includes/footer.php";
?>
		<!--/.footer Ends Here-->
		
		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="bootstrap-3.3.2-dist/js/jquery.min.js"></script>
		<script src="bootstrap-3.3.2-dist/js/bootstrap.min.js"></script>
		<script src="bootstrap-3.3.2-dist/js/docs.min.js"></script>
		<script src="js/jquery-2.1.3.min.js"></script>
		<script src="js/myjs.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="bootstrap-3.3.2-dist/js/ie10-viewport-bug-workaround.js"></script>
	</body>
</html>