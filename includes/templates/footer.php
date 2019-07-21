<!-- Menu -->
<div id="Menu">
	<ul>
		<li><a href="index.php" title="Home Page">Home</a></li>
		<?php # Script 18.2 - footer.html
		// This page completes the HTML template.

		// Display links based upon the login status:
		if (isset($_SESSION['user_id'])) {

			echo '<li><a href="logout.php" title="Logout">Logout</a></li>
	<li><a href="password.php" title="Change Your Password">Change Password</a></li>
	';

			// Add links if the user is an administrator:
			if ($_SESSION['user_level'] == 1) {
				echo '<li><a href="view_users.php" title="View All Users">View Users</a></li>';
			}
		} else { //  Not logged in.
			echo '<li><a href="register.php" title="Register for the Site">Register</a></li>
	<li><a href="login.php" title="Login">Login</a></li>
	<li><a href="forgot.php" title="Password Retrieval">Retrieve Password</a></li>
	';
		}
		?>
		<li><a href="#">Some Page</a></li>
		<li><a href="#">Another Page</a></li>
	</ul>
</div>


</div>

</body>

</html>
<?php // Flush the buffered output.
ob_end_flush();
?>