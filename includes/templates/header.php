<?php # Script 18.1 - header.html
// This page begins the HTML header for the site.

// Start output buffering:
ob_start();

// Initialize a session:
session_start();

// Check for a $page_title value:
if (!isset($page_title)) {
	$page_title = 'Excellent Job';
}
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title><?php echo $page_title; ?></title>
	<link rel="stylesheet" type="text/css" href="./includes/layout.css">
	<link rel="icon" href="./img/star_logo.jpg" type="image/x-icon">
	<link href="../assets/jquery.signaturepad.css" rel="stylesheet">
	<!--[if lt IE 9]><script src="../assets/flashcanvas.js"></script><![endif]-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
</head>

<body>
	<div class="header">
		<img src="img/star_logo.jpg" alt="logo">
		<h1><a href="index.php">Excellent Job</a></h1>
	</div>

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
</body>
		<!-- End of Header -->