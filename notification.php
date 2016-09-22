<?php
	ob_start();
	session_start();
?>
<html>
<?php
	require"includes/header.php";
?>
		
		<!-- Marketing messaging and featurettes
		================================================== -->
		<!-- Wrap the rest of the page in another container to center all the content. -->

		<div class="container">	

			<section class="shopping-cart">
			<br><br><br>
			<?php
				$s="select * from notification where rec='".$_SESSION["email"]."' ORDER BY n_id DESC";
				$result = $conn->query($s);
				if ($result->num_rows!=0) 
				{
			?>
			<h2 class="title">Notifications</h2>
			<br>
			<form action="notification.php" role="form"  method="post" enctype="multipart/form-data">
			<table class="items-list" >
			<tbody>
			<?php
				while($row = $result->fetch_assoc())
				{ 	
					$temp=$row["n_id"];
					$n_id='notification.php?n_id='.$temp;
					$msg=$row["message"];
					$sts=$row["status"];
					$date=$row["date"];
					if($sts=="")
					{
						$sql="UPDATE notification SET status='Seen' WHERE n_id='$temp'";
						$conn->query($sql);
			?>
					
					<!--Item-->
					<tr class="item">
					  <td class="name" bgcolor="#c6c3c3">
					  <p style="font-size:16px;"><?php echo $msg;?></p>
					  <p style="font-size:12px;"><?php echo $date;?></p>
					  </td>
					  
					  <td class="delete" style="padding-left:20px;"><a href=<?php echo $n_id;?> style="font-size:1.5em;"><span class="glyphicon glyphicon-remove-circle"></span></a></td>
					</tr>
                   
				  <?php
					}
					else
					{
					?>
					<!--Item-->
					<tr class="item">
					  <td class="name">
					  <p style="font-size:16px;"><?php echo $msg;?></p>
					  <p style="font-size:12px;"><?php echo $date;?></p>
					  </td>
					  
					  <td class="delete" style="padding-left:20px;"><a href=<?php echo $n_id;?> style="font-size:1.5em;"><span class="glyphicon glyphicon-remove-circle"></span></a></td>
					</tr>
					<?php
					}
				}
					?>
				  </tbody></table>
					<?php
				}
					else
					{
					?>
						<h2 class="title">No Notification!</h2>
						<br><br><br><br><br><br><br><br>
						<?php
					}
				
			
			?>
            <br><br>
      </section>	
		</div><!-- /.container -->
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<?php
			include "includes/footer.php";
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