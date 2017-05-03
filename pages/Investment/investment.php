<?php include '../../partials/document_header.php'; ?>
<?php

	//
	// Set the Correct Password Here (Inside the quotation marks)
	
	$CORRECTPASS = "graham";


	// The 'name' on the form element that will contain the user's password
	$key = "access_code";
	// A flag indicating if they are successfully logged in or not
	$logged_in = false;
	// A flag indicating if the user tried a password and got it wrong.
	// The investment_login_form.php file uses this to show error messages
	$failed_attempt = false;
	// The text of the error message. Might say, "Wrong Password" for instance
	$error_msg = "";
	// Check if the user's password matches the Correct Password
	if (POSTHas($key)) {
		$logged_in = (strcmp($CORRECTPASS, $_POST[$key]) == 0) ? true : false;
		if ($logged_in == false) {
			$failed_attempt = true;
			if ( strlen($_POST[$key]) < 1 ) {
				$error_msg = "Empty Access Code.";
			} else {
				$error_msg = "Wrong Access Code.";
			}
		}
	}
?>

	<h1 class="title">
		Investment
	</h1>

	<?php 
		if ($logged_in == true) { 
			include $PARTSDIR . '/investment_logged_in.php';
		} else {
			include $PARTSDIR . '/investment_login_form.php';
		}
	?>

<?php include $DOCFOOTER; ?>