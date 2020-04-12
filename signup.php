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
		
		//***********************************************connect to the database*******************************************
		include("connection.php");
		//*****************************************************************************************************************
		
		if(!$_POST['troy_id']) {
			$error .= "<p>Your Troy ID is required!</p>";
		}
		if(!$_POST['password']) {
			$error .= "<p>A password is required!</p>";
		}
		if(!$_POST['first_name']) {
			$error .= "<p>First name is required!</p>";
		}
		if(!$_POST['last_name']) {
			$error .= "<p>Last name is required!</p>";
		}
		if(!$_POST['email']) {
			$error .= "<p>An email address is required!</p>";
		}

		//check if there are error(s), show the error(s). if not check if the user name and email address has been taken
		if($error != "") {
			$error = "<p>There are error(s) in your form:</p>".$error."<p>Please check again.</p>";
		}else {
			$sql_u = "SELECT * FROM `user_info` WHERE `troy_id` = '".mysqli_real_escape_string($connection, $_POST['troy_id'])."' LIMIT 1";
			$result_u = mysqli_query($connection, $sql_u);
			
			$sql_e = "SELECT * FROM `user_info` WHERE `email` = '".mysqli_real_escape_string($connection, $_POST['email'])."' LIMIT 1";
			$result_e = mysqli_query($connection, $sql_e);
			
			if(mysqli_num_rows($result_u) > 0){
				$error = "That Troy ID has registered before. Please try another one.";
			}else if(mysqli_num_rows($result_e) > 0){
				$error = "That email address is taken. Please try another one.";
			}else{ //if both user name and email address isn't taken, insert data into database
				$sql = "INSERT INTO `user_info` (`troy_id`, `password`, `first_name`, `last_name`, `email`) 
				VALUES (
					'".mysqli_real_escape_string($connection, $_POST['troy_id'])."', 
					'".mysqli_real_escape_string($connection, $_POST['password'])."', 
					'".mysqli_real_escape_string($connection, $_POST['first_name'])."', 
					'".mysqli_real_escape_string($connection, $_POST['last_name'])."', 
					'".mysqli_real_escape_string($connection, $_POST['email'])."' 
				)";
				
				if(!mysqli_query($connection, $sql)){
					$error = "<p>Cannot sign you up right now. Please try again later.</p>";
				}else{
					/*****************************************************************************************************************************************************************************************************
					password security
					$sql = "UPDATE `user_info` SET `password` = '".md5(md5(mysqli_insert_id($connection)).$_POST['password'])."' WHERE `id` = '".mysqli_insert_id($connection)."' LIMIT 1";
					mysqli_query($connection, $sql);
					******************************************************************************************************************************************************************************************************/
					
					//set cookie
					$_SESSION['id'] = mysqli_insert_id($connection);
					
					if($_POST['stayloggedin'] == '1'){
						setcookie("id", mysqli_insert_id($connection), time() + 60*60*24);
					}
					
					header("Location: loggedinpage.php");
				}
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

	<!--sign up form-->
	<form method="post">

		<fieldset class="form-group">
			<label for="troy_id">Troy ID: </label>
			<input class="form-control" type="text" name="troy_id" id="troy_id" placeholder="E.g. XXXXXXX" pattern="[0-9].{6}" title="Please enter your 7 digits Troy ID">
		</fieldset>
		<fieldset class="form-group">
			<label for="password">Password: </label>
			<input class="form-control" type="password" name="password" id="password" placeholder="Enter Your Password Here">
		</fieldset>
		<fieldset class="form-group">
			<label for="first_name">First Name: </label>
			<input class="form-control" type="text" name="first_name" id="first_name" placeholder="Enter Your First Name Here">
		</fieldset>
		<fieldset class="form-group">
			<label for="last_name">Last Name: </label>
			<input class="form-control" type="text" name="last_name" id="last_name" placeholder="Enter Your Last Name Here">
		</fieldset>
		<fieldset class="form-group">
			<label for="email">Email: </label>
			<input class="form-control" type="email" name="email" id="email" placeholder="E.g. example@example.com">
		</fieldset>
		
		<!--
		<div class="checkbox">
			<label>
				<input type="checkbox" name="stayloggedin" value=1> Stay logged in.
			</label>
		</div>
		-->
		
		<fieldset class="form-group">
			<input class="btn btn-success" type="submit" name="submit" value="Sign Up!">
		</fieldset>
		
	</form>

</div>

<!-- include footer.php file -->
<?php include("footer.php"); ?>





