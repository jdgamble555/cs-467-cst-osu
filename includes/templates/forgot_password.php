<h2>Forgot My Password</h2>
<form action="forgot.php" method="post">
	<div id="pwr_container">
		<p>Please enter your email address associated with your account. We'll send you a link to reset your password.</p>
		<div class="pwr-email">
			<p><input type="email" name="email" placeholder="Please Enter Email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" required></p>
			<div align="center"><input type="submit" name="submit" class="buttons" value="Reset Password"></div>
		</div>
	</div>
</form>