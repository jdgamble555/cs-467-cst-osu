<h2>Sign Up</h2>
<form action="register.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="MAX_FILE_SIZE" value="300000">
	<div id="signup_container">
		<p>Please fill in this form to create an account.</p>
		<p><strong>First Name:</strong> <input type="text" placeholder="Enter First Name" name="first_name" size="20" maxlength="20" value="<?php if (isset($trimmed['first_name'])) echo $trimmed['first_name']; ?>"></p>

		<p><strong>Last Name:</strong> <input type="text" placeholder="Enter Last Name" name="last_name" size="20" maxlength="40" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>"></p>

		<p><strong>Email Address:</strong> <input type="email" placeholder="Enter Email" name="email" size="30" maxlength="60" value="<?php if (isset($trimmed['email'])) echo $trimmed['email']; ?>"> </p>

		<p><strong>Password:</strong> <input type="password" placeholder="Enter Password" name="password1" size="20" value="<?php if (isset($trimmed['password1'])) echo $trimmed['password1']; ?>"> </p>

		<p><strong>Confirm Password:</strong> <input type="password" placeholder="Repeat Password" name="password2" size="20" value="<?php if (isset($trimmed['password2'])) echo $trimmed['password2']; ?>"></p>
		
		<label for="signature"><b>Please upload a file of your signature:</b></label>
		<input type="file" name="upload" size="40" required><br><br><br>
		
		<div class="clearfix">
			<input type="reset" class="buttons cancelbtn btn_float" value="Cancel">
			<input type="submit" class="buttons signupbtn btn_float" name="submit" value="Sign Up">
		</div>
	</div>

</form>