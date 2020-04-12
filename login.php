<?php
	//for cookie
	session_start();
	
	$error = "";
	
	//to check if the user is logged out, if logged out, clear the cookie. if logged in or cookie has the info, redirect to log in page
	if(array_key_exists("logout", $_GET)){
		unset($_SESSION);
		setcookie("id", "", time() - 60*60);
		$_COOKIE['id'] = "";
	}else if ((array_key_exists("id", $_SESSION) AND $_SESSION['id']) OR (array_key_exists("id", $_COOKIE) AND $_COOKIE['id'])){
		header("Location: loggedinpage.php");
	}
	
	//form validation for signing up
	if(array_key_exists("submit", $_POST)){
		//connect to the database
		include("connection.php");

		if(!$_POST['troy_id']) {
			$error .= "<p>Your Troy ID is required!</p>";
		}
		if(!$_POST['password']) {
			$error .= "<p>A password is required!!</p>";
		}
		
		//check if there are error(s), show the error(s). if not check if the user name and email address has been taken
		if($error != "") {
			$error = "<p>There are error(s) in your form:</p>".$error."<p>Please check again.</p>";
		}else{
			//check if the email is existed
			$sql = "SELECT * FROM `user_info` WHERE `troy_id` = '".mysqli_real_escape_string($connection, $_POST['troy_id'])."'";
				
			$result = mysqli_query($connection, $sql);
			
			$row = mysqli_fetch_array($result);
			//if eamil is existed, then check password
			if(isset($row)){
				
				$entered_password = $_POST['password'];
				//if password is existed, then set seesion logged in and redirect to logged in page
				if($entered_password == $row['password']){
					
					$_SESSION['id'] = $row['id'];
					
					if($_POST['stayloggedin'] == '1'){
						setcookie("id", $row['id'], time() + 60*60*24);
					}
					header("Location: loggedinpage.php");
				}else{
					$error = "Password is incorrect.";
				}
				
			}else{
				$error = "That is a invalid Troy ID.";
			}

		}
		
	}
?>

<!-- include header.php file -->
<?php include("header.php"); ?>

<?php include("navbar.php"); ?>

<div class="container" id="container_opacity">

	<!--show the error if there is any-->
	<div id="error"><?php if($error != ""){echo '<div class="alert alert-danger" role="alert">'.$error."</div>";} ?></div>

	<!--log in form-->
	<form method="post">
		
		<fieldset class="form-group">
			<label for="troy_id">Troy ID: </label>
			<input class="form-control" type="text" name="troy_id" id="troy_id" placeholder="E.g. XXXXXXX" pattern="[0-9].{6}" title="Please enter your 7 digits Troy ID">
		</fieldset>
		<fieldset class="form-group">
			<label for="password">Password: </label>
			<input class="form-control" type="password" name="password" id="password" placeholder="Enter Your Password Here">
		</fieldset>
		
		<!--
		<div class="checkbox">
			<label>
				<input class="form-control" type="checkbox" name="stayloggedin" value=1> Stay logged in.
			</label>
		</div>
		-->
		
		<fieldset class="form-group">
			<input class="btn btn-success" type="submit" name="submit" value="Log In!">
		</fieldset>
		
	</form>

</div>

<!-- include footer.php file -->
<?php include("footer.php"); ?>




