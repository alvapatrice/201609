<?php
	ob_start();
	session_start();
?>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>MeLife</title>
		<link rel="stylesheet" href="css/style.css"/>
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
		<meta content="IE=edge" http-equiv="X-UA-Compatible">
		<meta content="" name="description">
		<meta content="" name="author">
		<link rel="stylesheet" href="bootstrap-3.3.2-dist/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="bootstrap-3.3.2-dist/css/bootstrap-theme.min.css"/>
		<!-- Just for debugging purposes -->
		<script src="bootstrap-3.3.2-dist/js/ie-emulation-modes-warning.js"></script>
		<style>
			body{
				padding-top:50px;
			}
		</style>
		 <script type="text/javascript">         
            function increase(){
				var textBox = document.getElementById("quantity");
				textBox.value++;
            }
			function decrease(){
				var textBox = document.getElementById("quantity");
				if(textBox.value!=1)
					textBox.value--;
            }			
		</script>
		<?php
			include "includes/dbConnector.php";
		?>
	</head>
	<body>
		<!--\\\\\\\\\\\\\Navigation ber starts here/////////////-->
		<?php
			function navi()
			{
		?>
				<ul class="nav navbar-nav">
					<li><a href="index.php" style="font-size:16px;">Home</a></li>
					<li><a href="doctor.php" style="font-size:16px;">Find a doctor</a></li>
					<li class="dropdown">
					<a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#" style="font-size:16px;">Doctor Accessories<span class="caret"></span></a>
					<ul role="menu" class="dropdown-menu">
						<li><a href="equipments.php" style="font-size:16px;">Equipements</a></li>
						<li><a href="medicines.php" style="font-size:16px;">Medicines</a></li>
					</ul>
					</li>
					<li><a href="blog.php" style="font-size:16px;">Blog</a></li>
					<li><a href="about.php" style="font-size:16px;">About</a></li>
					<li><a href="contact.php" style="font-size:16px;">Contact</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#" data-toggle="modal" data-target="#modal-1"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
										
					<li><a href="#" data-toggle="modal" data-target="#modal-2"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				</ul>
		<?php
			}
		?>
		<div class="navbar-wrapper">
			<div class="container">
				<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
					<div class="container">
						<div class="navbar-header">
							<button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
								<span class="sr-only">Toggle nevigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a href="#" class="navbar-brand" style="font-size:20px;">MeLife</a>
						</div>
						<div class="navbar-collapse collapse" id="navbar">
                    
					<!-- inside it we can put form, list etc anything we want -->
							<?php
								if(isset($_POST['email']))
								{
									$email=$_POST['email'];
									$pass=$_POST['password'];
									$s="select * from users where email=\"$email\" and password=\"$pass\"";
									$result = $conn->query($s);
									if ($result->num_rows!=0) 
									{
										$cur=1;
										if($row = $result->fetch_assoc())
										{ 
											$username=$row["username"];
											$type=$row["type"];
											$_SESSION["username"]=$username;
											$_SESSION["type"]=$type;
											$_SESSION["email"]=$email;
											$_SESSION["password"]=$pass;
											include "shopping_cart_cnt.php";
							?>
											<ul class="nav navbar-nav">
												<li><a href="index.php" style="font-size:16px;">Home</a></li>
												<li><a href="doctor.php" style="font-size:16px;">Find a doctor</a></li>
												<?php 
													if($type=="doctor")
													{
												?>
														<li><a href="dpanel.php" style="font-size:16px;">Doctor Panel</a></li>
												<?php
													}
												?>
												<li class="dropdown">
													<a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#" style="font-size:16px;">Doctor Accessories<span class="caret"></span></a>
													<ul role="menu" class="dropdown-menu">
														<li><a href="equipments.php" style="font-size:16px;">Equipements</a></li>
														<li><a href="medicines.php" style="font-size:16px;">Medicines</a></li>
													</ul>
												</li>
												<li><a href="blog.php" style="font-size:16px;">Blog</a></li>
												<li><a href="about.php" style="font-size:16px;">About</a></li>
												<li><a href="contact.php" style="font-size:16px;">Contact</a></li>
											</ul>
											<ul class="nav navbar-nav navbar-right">
												<li><a href="cart.php" style="font-size:16px;"><span class="glyphicon glyphicon-shopping-cart"></span> Cart <span class="badge"style="font-size:12px;"><?php echo $cnt;?></span></a></li>
												<li><a href="notification.php" style="font-size:17px;"><span class="glyphicon glyphicon-globe" ></span> Notifications <span class="badge"style="font-size:12px;"><?php echo $cnt1;?></span></a></li>
												<li class="dropdown">
													<a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#" style="font-size:16px;"><?php echo $_SESSION["username"];?><span class="caret"></span></a>
													<ul role="menu" class="dropdown-menu">
														<p style="text-align:center;"><li><a href="profile.php" style="font-size:16px;text-align:center;">Profile</a></li></p>
														<!--<form method="post">
															<li><a href="index.php" style="font-size:16px;" name="logout" id="logout">Logout</a></li>
														</form>-->
														<li>
															<form action="item.php" role="form" class="form-inline" method="post" enctype="multipart/form-data">
																<p style="text-align:center;"><input name="logout" type="submit" class="btn btn-success" value="Sign Out"></p>
															</form>
														</li>
													</ul>
												</li>
											</ul>
							<?php
										}
									}
									else 
									{
										navi();
							?>
										
										<!-- ///////for wrong password\\\\\\\\
										<div class="container">
											<div class="row" id="error-container">
												 <div class="span12">  
													 <div class="alert alert-error">
														<button type="button" class="close" data-dismiss="alert">?</button>
														 test error message
													 </div>
												 </div>
											</div>
										</div>
										
										<div class="bs-example">
											<div class="alert alert-danger" id="myAlert">
												<a href="#" class="close" data-dismiss="alert">&times;</a>
												<strong>Error!</strong> A problem has been occurred while submitting your data.
											</div>
										</div>
										-->
							<?php
									}
								}
								else if(isset($_POST['logout']))
								{
									// remove all session variables
									$s="select * from cart";
									$result = $conn->query($s);
									$i=0;
									$q=array();
									$med=array();
									if ($result->num_rows!=0) 
									{	
										while($row = $result->fetch_assoc())
										{
											$q[$i]=$row["quan"];
											$med[$i]=$row["med_id"];
											$i=$i+1;
										}
									}
									$sql = "DELETE FROM cart";
									mysqli_query($conn, $sql);
									for($j=0;$j<$i;$j++)
									{
										$s="select quan from medicines where med_id='$med[$j]'";
										$result = $conn->query($s);
										if ($result->num_rows!=0) 
										{	
											if($row = $result->fetch_assoc())
											{
												$quant=$q[$j]+$row["quan"];
												$sql = "UPDATE medicines SET quan=\"$quant\" WHERE med_id='$med[$j]'";
												$conn->query($sql);
											}
										}
									}
									
									session_unset();

									// destroy the session
									session_destroy(); 
									navi();
									header('Location: index.php');
								}
								else  if(isset($_POST['regemail']))
								{
									$email=$_POST['regemail'];
									$username=$_POST['username'];
									if(isset($_POST['type']))
									{
										$type=$_POST['type'];
									}
									else $type="";
									$pass=$_POST['password'];
									$s="select * from users where email=\"$email\" OR username=\"$username\"";
									$result = $conn->query($s);
									if ($result->num_rows!=0||$type=="") 
									{
										navi();
									}
									else
									{
										$_SESSION["username"]=$username;
										$_SESSION["type"]=$type;
										$_SESSION["email"]=$email;
										$_SESSION["password"]=$pass;
										$s="INSERT INTO users (username,email,password,type) VALUES('$username','$email','$pass','$type')";
										$conn->query($s);
										include "shopping_cart_cnt.php";
							?>				
										<ul class="nav navbar-nav">
												<li><a href="index.php" style="font-size:16px;">Home</a></li>
												<li><a href="doctor.php" style="font-size:16px;">Find a doctor</a></li>
												<?php 
													if($type=="doctor")
													{
												?>
														<li><a href="dpanel.php" style="font-size:16px;">Doctor Panel</a></li>
												<?php
													}
												?>
												<li class="dropdown">
													<a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#" style="font-size:16px;">Doctor Accessories<span class="caret"></span></a>
													<ul role="menu" class="dropdown-menu">
														<li><a href="equipments.php" style="font-size:16px;">Equipements</a></li>
														<li><a href="medicines.php" style="font-size:16px;">Medicines</a></li>
													</ul>
												</li>
												<li><a href="blog.php" style="font-size:16px;">Blog</a></li>
												<li><a href="about.php" style="font-size:16px;">About</a></li>
												<li><a href="contact.php" style="font-size:16px;">Contact</a></li>
											</ul>
											<ul class="nav navbar-nav navbar-right">
												<li><a href="cart.php" style="font-size:16px;"><span class="glyphicon glyphicon-shopping-cart"></span> Cart <span class="badge"style="font-size:12px;"><?php echo $cnt;?></span></a></li>
												<li><a href="notification.php" style="font-size:17px;"><span class="glyphicon glyphicon-globe" ></span> Notifications <span class="badge"style="font-size:12px;"><?php echo $cnt1;?></span></a></li>
												<li class="dropdown">
													<a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#" style="font-size:16px;"><?php echo $_SESSION["username"];?><span class="caret"></span></a>
													<ul role="menu" class="dropdown-menu">
														<p style="text-align:center;"><li><a href="profile.php" style="font-size:16px;text-align:center;">Profile</a></li></p>
														<!--<form method="post">
															<li><a href="index.php" style="font-size:16px;" name="logout" id="logout">Logout</a></li>
														</form>-->
														<li>
															<form action="item.php" role="form" class="form-inline" method="post" enctype="multipart/form-data">
																<p style="text-align:center;"><input name="logout" type="submit" class="btn btn-success" value="Sign Out"></p>
															</form>
														</li>
													</ul>
												</li>
											</ul>
							<?php
									}
								}
								else if(isset($_SESSION['username']))
								{
									include "shopping_cart_cnt.php";
							?>
										<ul class="nav navbar-nav">
											<li><a href="index.php" style="font-size:16px;">Home</a></li>
											<li><a href="doctor.php" style="font-size:16px;">Find a doctor</a></li>
											<?php 
												if($_SESSION['type']=="doctor")
												{
											?>
													<li><a href="dpanel.php" style="font-size:16px;">Doctor Panel</a></li>
											<?php
												}
											?>
											<li class="dropdown">
											<a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#" style="font-size:16px;">Doctor Accessories<span class="caret"></span></a>
											<ul role="menu" class="dropdown-menu">
												<li><a href="equipments.php" style="font-size:16px;">Equipements</a></li>
												<li><a href="medicines.php" style="font-size:16px;">Medicines</a></li>
											</ul>
											</li>
											<li><a href="blog.php" style="font-size:16px;">Blog</a></li>
											<li><a href="about.php" style="font-size:16px;">About</a></li>
											<li><a href="contact.php" style="font-size:16px;">Contact</a></li>
										</ul>
										<ul class="nav navbar-nav navbar-right">
										<li><a href="cart.php" style="font-size:16px;"><span class="glyphicon glyphicon-shopping-cart"></span> Cart <span class="badge"style="font-size:12px;"><?php echo $cnt;?></span></a></li>
												<li><a href="notification.php" style="font-size:17px;"><span class="glyphicon glyphicon-globe" ></span> Notifications <span class="badge"style="font-size:12px;"><?php echo $cnt1;?></span></a></li>
												<li class="dropdown">
													<a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#" style="font-size:16px;"><?php echo $_SESSION["username"];?><span class="caret"></span></a>
													<ul role="menu" class="dropdown-menu">
														<p style="text-align:center;"><li><a href="profile.php" style="font-size:16px;text-align:center;">Profile</a></li></p>
														<!--<form method="post">
															<li><a href="index.php" style="font-size:16px;" name="logout" id="logout">Logout</a></li>
														</form>-->
														<li>
															<form action="item.php" role="form" class="form-inline" method="post" enctype="multipart/form-data">
																<p style="text-align:center;"><input name="logout" type="submit" class="btn btn-success" value="Sign Out"></p>
															</form>
														</li>
													</ul>
												</li>
											</ul>
							<?php
								}
								else
								{
									navi();
								}
							?>
						</div>
					</div>
				</nav>	
			</div>
		</div>
		
		<!--\\\\\\\\\\\\\Navigation ber ends here/////////////-->
		
		<!--\\\\\\\\\\\\\sign up form starts here/////////////-->
		
		<div class="modal fade" id="modal-1" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" style="border-bottom:none">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<br>
                        <h1 class="modal-title">MeLife</h1>
                    </div>
                    <div class="modal-body" style="border-top:none">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#section-1" data-toggle="tab" id="tabbeauty">Sign Up</a></li>
							<li><a href="#section-2" data-toggle="tab" id="tabbeauty">Log In</a></li>
						</ul>
                        <div class="tab-content">
							<div class="tab-pane fade in active" id="section-1">
								<br><br>
								<form action="item.php" role="form" class="form-inline" method="post" enctype="multipart/form-data">
									<div class="form-group" style="padding-left:59px;">
										<input type="text" name="regemail" id="form-elem-8" class="form-control" placeholder="Email address" style="height:46px;width:449px">
									</div><br><br>
									<div class="form-group" style="padding-left:59px;">
										<input type="text" name="username" id="form-elem-9" class="form-control" placeholder="Username" style="height:46px;width:449px">
									</div><br><br>
									<div class="form-group" style="padding-left:59px;">
										<input type="password" name="password" id="form-elem-10" class="form-control" placeholder="Password" style="height:46px;width:449px">
									</div><br><br>
									<div class="form-group" style="padding-left:59px;">
										<select id="company" class="form-control" style="width:182px;" name="type">
										  <option value="" disabled selected>User Type</option> 
										  <option value="doctor">Doctor</option>
										  <option value="member">Member</option>
										</select> 
									</div><br><br>
									<p style="text-align:center;"><input type="submit" class="btn btn-success btn-lg" value="Create An Account"></p>
								</form>
							</div>
							<div class="tab-pane fade" id="section-2">
								<br><br>
								<form action="item.php" role="form" class="form-inline" method="post" enctype="multipart/form-data">
									<div class="form-group" style="padding-left:59px;">
										<input type="text" id="form-elem-6" name="email" class="form-control" placeholder="Email address" style="height:46px;width:449px">
									</div><br><br>
									<div class="form-group" style="padding-left:59px;">
										<input type="password" id="form-elem-7" name="password" class="form-control" placeholder="Password"style="height:46px;width:449px">
									</div><br><br>
									<span style="padding-left:59px;">
										<input type="checkbox">Remember me 
										<a href="" style="text-decoration:none;padding-left:200px;">Forgot your password?</a>
									</span><br><br>
									<p style="text-align:center;"><input type="submit" class="btn btn-success btn-lg" value="Log In" data-toggle="modal" data-target="#modal-3"></p>
								</form>
							</div>
						</div>
					</div>
                    <div class="modal-footer" style="padding-right:70px;padding-bottom:50px;">
						<p style="padding-right:180px;color:gray;">Or connect with</p>
						<div class="row">
							<div class="col-lg-4">
								<a data-attr2="Login" data-attr1="master" data-analytics="SignupFacebook" class="btn btn-facebook btn-social" style="padding-top:10px;height:41px;width:97px;">Facebook</a>
							</div><!-- /.col-lg-4 -->
							<div class="col-lg-4">
								<a data-attr2="Login" data-attr1="master" data-analytics="SignupGoogle" class="btn btn-google btn-social" style="padding-top:10px;height:41px;width:97px;">Google</a>
							</div><!-- /.col-lg-4 -->
							<div class="col-lg-4">
								<a data-attr2="Login" data-attr1="master" data-analytics="SignupGithub" class="btn btn-github btn-social" style="padding-top:10px;height:41px;width:97px;"> GitHub</a>
							</div><!-- /.col-lg-4 -->
						</div><!-- /.row -->
					</div><!-- /.container -->
				</div>
			</div>
		</div>
		
		<!--\\\\\\\\\\\\\sign up form ends here/////////////-->
		
		<!--\\\\\\\\\\\\\Log In form starts here/////////////-->
		
		<div class="modal fade" id="modal-2" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" style="border-bottom:none">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<br>
                        <h1 class="modal-title">MeLife</h1>
                    </div>
                    <div class="modal-body" style="border-top:none">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#section-3" data-toggle="tab" id="tabbeauty">Log In</a></li>
							<li><a href="#section-4" data-toggle="tab" id="tabbeauty">Sign Up</a></li>
						</ul>
                        <div class="tab-content">
							<div class="tab-pane fade in active" id="section-3">
								<br><br>
								<form action="item.php" role="form" class="form-inline" method="post" enctype="multipart/form-data">
									<div class="form-group" style="padding-left:59px;">
										<input type="text" id="form-elem-6" name="email" class="form-control" placeholder="Email address" style="height:46px;width:449px">
									</div><br><br>
									<div class="form-group" style="padding-left:59px;">
										<input type="password" id="form-elem-7" name="password" class="form-control" placeholder="Password"style="height:46px;width:449px">
									</div><br><br>
									<span style="padding-left:59px;">
										<input type="checkbox">Remember me 
										<a href="" style="text-decoration:none;padding-left:200px;">Forgot your password?</a>
									</span><br><br>
									<p style="text-align:center;"><input type="submit" class="btn btn-success btn-lg" value="Log In" data-toggle="modal" data-target="#modal-3"></p>
								</form>
							</div>
							<div class="tab-pane fade" id="section-4">
								<br><br>
								<form action="item.php" role="form" class="form-inline" method="post" enctype="multipart/form-data">
									<div class="form-group" style="padding-left:59px;">
										<input type="text" name="regemail" id="form-elem-8" class="form-control" placeholder="Email address" style="height:46px;width:449px">
									</div><br><br>
									<div class="form-group" style="padding-left:59px;">
										<input type="text" name="username" id="form-elem-9" class="form-control" placeholder="Username" style="height:46px;width:449px">
									</div><br><br>
									<div class="form-group" style="padding-left:59px;">
										<input type="password" name="password" id="form-elem-10" class="form-control" placeholder="Password" style="height:46px;width:449px">
									</div><br><br>
									<div class="form-group" style="padding-left:59px;">
										<select id="company" class="form-control" style="width:182px;" name="type">
										  <option value="" disabled selected>User Type</option> 
										  <option value="doctor">Doctor</option>
										  <option value="member">Member</option>
										</select> 
									</div><br><br>
									<p style="text-align:center;"><input type="submit" class="btn btn-success btn-lg" value="Create An Account"></p>
								</form>
							</div>
						</div>
					</div>
                    <div class="modal-footer" style="padding-right:70px;padding-bottom:50px;">
						<p style="padding-right:180px;color:gray;">Or connect with</p>
						<div class="row">
							<div class="col-lg-4">
								<a data-attr2="Login" data-attr1="master" data-analytics="SignupFacebook" class="btn btn-facebook btn-social" style="padding-top:10px;height:41px;width:97px;">Facebook</a>
							</div><!-- /.col-lg-4 -->
							<div class="col-lg-4">
								<a data-attr2="Login" data-attr1="master" data-analytics="SignupGoogle" class="btn btn-google btn-social" style="padding-top:10px;height:41px;width:97px;">Google</a>
							</div><!-- /.col-lg-4 -->
							<div class="col-lg-4">
								<a data-attr2="Login" data-attr1="master" data-analytics="SignupGithub" class="btn btn-github btn-social" style="padding-top:10px;height:41px;width:97px;"> GitHub</a>
							</div><!-- /.col-lg-4 -->
						</div><!-- /.row -->
					</div><!-- /.container -->
				</div>
			</div>
		</div>
		<!--\\\\\\\\\\\\\Log In form ends here/////////////-->
		
		<!-- Marketing messaging and featurettes
		================================================== -->
		<!-- Wrap the rest of the page in another container to center all the content. -->

		<div class="container">	

			<?php
			/*
			else if(isset($_POST['wish'])&&isset($_SESSION['username']))
			{
				$s="select * from cart where med_id='".$_POST['wish']."' and type='wish' and email='".$_SESSION["email"]."'";
				$result = $conn->query($s);
				if ($result->num_rows==0) 
				{
					$s="select * from medicines where med_id='".$_POST['wish']."'";
					$result = $conn->query($s);
					if ($result->num_rows!=0) 
					{	
						if($row = $result->fetch_assoc())
						{ 
							$date=date("d/m/Y");
							$sql = "INSERT INTO cart(email,med_id,quan,date,ctgry,type) VALUES ('".$_SESSION["email"]."', '".$_POST['wish']."','0','".$date."','med','wish')";
							mysqli_query($conn, $sql);
						}
					}
				}
				else 
				{
					echo "already in wishlist";
				}
			}
			else if(isset($_POST['wish']))
			{
				echo "bla";
			}
			*/
			if(isset($_GET['p_id']))
			{
				$product_id = (int)$_GET['p_id'];
				$_SESSION['p_id']=$product_id;
			}
			else if(isset($_SESSION['p_id']))
				$product_id =$_SESSION['p_id'];
			if($_SESSION["tp"]=="med")
				$s="select * from medicines where med_id=\"$product_id\"";
			else
				$s="select * from medicine";
			$result = $conn->query($s);
			if ($result->num_rows!=0) 
			{
				if($row = $result->fetch_assoc())
				{ 
					$m_id=$row["med_id"];
					$m_name=$row["name"];
					$tp=$row["type"];
					$ctg=$row["ctgry"];
					$price=$row["price"];
					$des=$row["des"];
					$stat=$row["stat"];
					$pic='img/'.$row["pic"];
					$_SESSION["tp"]="med";
				}
			}
		?>
		<section class="catalog-single">
      	<div class="container">
          <div class="row">
          
          	<!--Product Gallery-->
            <div class="col-lg-6 col-md-6" style="position: relative;">
            	<img alt="1" src=<?php echo $pic;?> class="img-thumbnail" alt="Cinque Terre" height="490px" width="555px">
              	
            </div>
            
            <!--Product Description-->
            <div class="col-lg-6 col-md-6">
              <h2><?php echo $m_name;?></h2>
			  <h3><?php echo $tp;?></h3>
			  <h3>Category: <?php echo $ctg;?></h3>
			  <h3>Availability: <?php echo $stat;?></h3>
              <div class="price">BDT <?php echo $price;?> Taka</div>
			  <form action="item.php" role="form" class="form-inline" method="post" enctype="multipart/form-data">
              <div class="buttons group">
                <div class="qnt-count">
                  <a href="#" class="incr-btn" onclick="decrease()" style="height:35px;">-</a>
                  <input type="text" value="1" class="form-control" id="quantity" name="quan">
                  <a href="#" class="incr-btn" onclick="increase()" style="height:35px;">+</a>
                </div>
                <button class="btn btn-beau" style="height:37px;width:150px;margin-left:10px;"name="cart" value=<?php echo $m_id;?>><span class="glyphicon glyphicon-shopping-cart"></span>  Add to Cart</button>
                <!--button class="btn btn-beau" style="height:39px;width:153px;"name="wish" value=<?php //echo $m_id;?>><span class="glyphicon glyphicon-heart"></span>  Add to wishlist</button-->
				</form>
              </div>
              <p class="p-style2"><?php echo $des;?></p>
          </div>
        </div>
      </section>	
		</div><!-- /.container -->
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<?php
			include"includes/footer.php";
		?>
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