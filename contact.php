<?php
	ob_start();
	session_start();
?>
<html>
<?php
	require"includes/header.php";
?>
		<!--\\\\\\\\\\\\\Log In form ends here/////////////-->
		
		<?php
		
			if(isset($_POST['st']))
			{
				$mml=$_POST['emaill']." ";
				$mm=$_POST['msg'];
				$date=date("d/m/Y H:i:s");
				$s="INSERT INTO notification (send,rec,message,date) VALUES('$mml','admin','$mm','$date')";
				$conn->query($s);
			}
		?>
		
		<div class="container" style="background-color:#36404a;width:auto;padding-bottom:80px;">	
			<h1 style="color:white;padding-top:80px;text-align:center;font-weight: bold;">Contact Us</h1>
			<h3 style="color:white;text-align:center;">Have a question? Drop us a line; we are here to help.</h3>
			<br><br>
			<!-- Three columns of text below the carousel -->
			<div class="row">
				<form action="contact.php" role="form"  method="post" enctype="multipart/form-data">
				<div class="col-lg-4 col-lg-offset-2">
					<textarea class="form-control" rows="6" id="comment" placeholder="Message" name="msg" style="width:420px;font-size:18px;"></textarea>
				</div><!-- /.col-lg-4 -->
				<div class="col-lg-4">
					
						<div class="form-group">
							<input type="text" id="form-elem-3" class="form-control" name="namee" placeholder="Full Name" style="height:46px;width:420px;font-size:18px;">
						</div>
						<div class="form-group" style="padding-bottom:6px;">
							<input type="text" id="form-elem-4" class="form-control" placeholder="Email" name="emaill"style="height:46px;width:420px;font-size:18px;">
						</div>
						<br><br>
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						<button type="submit" class="btn btn-success btn-lg" name="st" value="st">Send Email</button>
					
				</div><!-- /.col-lg-4 -->
				</form>
			</div><!-- /.row -->
			<!-- /END THE FEATURETTES -->
		
		</div><!-- /.container -->
		<div class="container" style="background-color:#EFF1F3;width:auto;padding-bottom:80px;padding-top:80px;">	
			
			<!-- Three columns of text below the carousel -->
			<div class="row">
				<div class="col-lg-5 col-lg-offset-1">
					<h2>Technical | <a href="tel:+8618602880530" style="text-decoration:underline;">+8618602880530</a></h2>
					<address style="font-size:20px;color:gray;">
						Chengdu Neusoft University<br>
						HviewTech<br>

					</address>
				</div><!-- /.col-lg-4 -->
				<div class="col-lg-4">
					<h2>Service | <a style="text-decoration:underline;"href="tel:+250787060343">+250787060343</a></h2>
					<address style="font-size:20px;color:gray;">
						MeLife<br>
						2nd Floor,Kwamushimire, Kepler<br>

						Kigali, Rwanda
					</address>
				</div><!-- /.col-lg-4 -->
			</div><!-- /.row -->
			
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