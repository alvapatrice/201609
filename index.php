<?php
	ob_start();
	session_start();
?>
<html>
	<?php
		require"includes/header.php";
	?>


		
		<!-- Carousel
		================================================== -->
		<div data-ride="carousel" class="carousel slide" id="myCarousel" style="height:600px;">
		<!-- Indicators -->
			<ol class="carousel-indicators">
				<li class="" data-slide-to="0" data-target="#myCarousel"></li>
				<li data-slide-to="1" data-target="#myCarousel" class=""></li>
				<li data-slide-to="2" data-target="#myCarousel" class="active"></li>
			</ol>
			<div role="listbox" class="carousel-inner" style="height:600px;">
				<div class="item active">
					<img alt="First slide" src="img/bigstock-Medical-doctors-group-Isolate-27388721.jpg">
					<div class="container">
						<div class="carousel-caption">
							<h1>Appointment Any Doctor in Rwanda </h1>
							<p>Through this platform you can make an appointment with any doctor you want,
							be working in private or public hospital, we can connect you with them.</p>
							<p><a role="button" href="#section-4" class="btn btn-lg btn-primary" id="tabbeauty">Sign up today</a></p>
						</div>
					</div>
				</div>
				<div class="item">
					<img alt="Second slide" src="img/Stethoscope.jpg">
					<div class="container">
						<div class="carousel-caption">
							<h1>Get Advice From Doctors</h1>
							<p>Through MeLife platform you can connect with a doctor and get advice about how you can
							take care of your health, you can also follow our blog.</p>
							<p><a role="button" href="#" class="btn btn-lg btn-primary">Learn more</a></p>
						</div>
					</div>
				</div>
				<div class="item">
					<img alt="Third slide" src="img/medicine.jpg">
					<div class="container">
						<div class="carousel-caption">
							<h1>Order Medicines You Want From Trusted Suppliers</h1>
							<p>We work with medicine shops that are trusted that the ministry of health, it no doubt
							that your order will be secured. Just order from us it doesn't matter where you are,
								we will deliver it to you</p>
							<p><a role="button" href="medicines.php" class="btn btn-lg btn-primary">Browse Medicines</a></p>
						</div>
					</div>
				</div>
			</div>
			<a data-slide="prev" role="button" href="#myCarousel" class="left carousel-control">
				<span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a data-slide="next" role="button" href="#myCarousel" class="right carousel-control">
				<span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		
		<!-- /.carousel ends here -->
	
		<!-- Marketing messaging and featurettes
		================================================== -->
		<!-- Wrap the rest of the page in another container to center all the content. -->

		<div class="container marketing">	

			<!-- Three columns of text below the carousel -->
			<div class="row">
				<div class="col-lg-12">
					<ul class="hr-mission-highlights unstyled row">
						<li class=" hr-mission-highlight span-xs-16 span-md-8" style="list-style:none;">
							<div class="hr-mission-figure hr-mission-developers is-active">
								<span class="hr-mission-content">
									<img src="img/people.png" alt="People">
									<p style="font-size:18px;padding-top:10px;">Experienced<br>
									Doctors</p>
								</span>
							</div>
						</li>
						<li class=" hr-mission-highlight span-xs-16 span-md-8" style="padding-left:118px;list-style:none;">
							<div class="hr-mission-figure hr-mission-challenges is-active">
								<span class="hr-mission-content">
									<img src="img/medal_of_honor.png" alt="Medal_of_honor">
									<p style="font-size:18px;padding-top:10px;">1000+<br>
									Equiqments</p>
								</span>
							</div>
						</li>
						<li class=" hr-mission-highlight span-xs-16 span-md-8" style="padding-left:225px;list-style:none;">
							<div class="hr-mission-figure hr-mission-companies is-active">
								<span class="hr-mission-content">
									<img src="img/suitcase.png" alt="Suitcase" style="padding-right:3px;">
									<p style="font-size:18px;padding-top:10px;">1000+<br>
									Medicines</p>
								</span>
							</div>
						</li>
					</ul>
				</div><!-- /.col-lg-12 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
		<br><br><br><br>
		<div class="container marketing">

			<!-- Three columns of text below the carousel -->
			<!--<div class="row">
				<div class="col-lg-4">
				  <h2>Heading</h2>
				  <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
				  <p><a role="button" href="#" class="btn btn-default">View details ?</a></p>
				</div><!-- /.col-lg-4 -->
				<!--<div class="col-lg-4">
				  <h2>Heading</h2>
				  <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
				  <p><a role="button" href="#" class="btn btn-default">View details ?</a></p>
				</div><!-- /.col-lg-4 -->
				<!--<div class="col-lg-4">
				  <h2>Heading</h2>
				  <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
				  <p><a role="button" href="#" class="btn btn-default">View details ?</a></p>
				</div><!-- /.col-lg-4 -->
			<!--</div><!-- /.row -->
		</div>
		
		<!-- /.Marketing container end here-->
		
		<!-- FOOTER Starts Here-->
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