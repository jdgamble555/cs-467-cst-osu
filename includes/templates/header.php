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
<header>
		<!-- <img src="img/star_logo.jpg" alt="logo"> -->
		<h1><a href="index.php" id="mainHeader">Excellent Job</a></h1>

			<nav>
				<ul>
					<li><a href="index.php" title="Home Page" id="menu">Home</a></li>
					<?php # Script 18.2 - footer.html
					// This page completes the HTML template.

					// Display links based upon the login status:
					if (isset($_SESSION[SQLFIX . 'user_id'])) {

						echo '<li><a href="logout.php" title="Logout">Logout</a></li>
				<li><a href="password.php" title="Change Your Password">Change Password</a></li>
				';

						// Add links if the user is an administrator:
						if ($_SESSION[SQLFIX . 'user_level'] == 1) {
							echo '<li><a href="view_users.php" title="View All Users">View Users</a></li>';
						}
					} else { //  Not logged in.
						echo '<li><a href="login.php" title="Login" id="menu">Login</a></li>
				';
				// <li><a href="register.php" title="Register for the Site"  id="menu">Register</a></li>
				// <li><a href="forgot.php" title="Password Retrieval" id="menu">Retrieve Password</a></li>
					}
					?>
					<li><a href="contact_us.php" title="Contact Us" id="menu">Contact Us</a></li>
				</ul>
			</nav>
</header>
</body>
		<!-- End of Header -->