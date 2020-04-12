<?php
	session_start();
	session_destroy();
?>

<!-- include header.php file -->
<?php include("header.php"); ?>
	<?php include("navbar.php"); ?>
			
			<div id="container_opacity">
				<div class="jumbotron">
					<h1 class="display-3">Find the nearest parking space around you.<br>Start right now!</h1>
					<p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
					<hr class="my-4">
					<p>Are you interested? Sign Up Now!</p>
					<p class="lead">
					<a class="btn btn-primary btn-lg" href="signup.php?logout=ture" role="button" >Sign Up</a>
					</p>
				</div>
				
				<div id="google_map" align=center style="margin:50px;">
					<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d13562.253597564533!2d-85.9662151!3d31.80964685!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1555734891873!5m2!1sen!2sus" width="1200" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
			</div>

			<div id="footer">
				
			</div>
<!-- include footer.php file -->
<?php include("footer.php"); ?>