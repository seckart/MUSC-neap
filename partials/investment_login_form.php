<?php
	// Determine whether or not to show the .invalid message under
	// the password input.
	$passClass = "";
	if ( isset($failed_attempt) && $failed_attempt == true )  {
		$passClass = "showing";
	}
	// Make sure $error_msg was set somewhere
	$error_msg = (isset($error_msg) && !empty($error_msg)) ? $error_msg : "";
?>
<div class="max-width-300 margin-zero-auto">

	<!-- The Padlock Image -->
	<img class="blk margin-zero-auto" src="<?php echo $TEMPLDIR; ?>/padlock_closed.png" alt="" />

	<!-- The Access Code Form -->
	<form class="blk rounded-box bg-darkest-orange top-mg-less" action="investment.php" method="POST">
		<!-- The Label -->
		<label class="wid-full bold color-white bot-mg-barely" for="access_code">
			Please Enter Access Code:
		</label>
		<!-- The Password Field -->
		<input class="wid-full" id="access_code" name="access_code" type="password" placeholder="Access Code" />
		<!-- The Invalid Input Error Message -->
		<div class="invalid <?php echo $passClass; ?>">
			<?php echo $error_msg; ?>	
		</div>
		<!-- The Login Button -->
		<input class="wid-full btn btn-orange" type="submit" value="Login" />
	</form>

	<!-- The 'Forgot Your Password' Text Below the form -->
	<div class="v-padded-less font-size-3qt color-orange">
		<div class="bold">
			Forgot your password?
		</div>
		<p class="l-pd-less">
			Please contact HealthLinx<sup>&reg;</sup> for further assistance. Thank you.
		</p>
	</div>

</div>