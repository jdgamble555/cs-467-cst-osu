<?php # Script 18.11 - change_password.php
// This page allows a logged-in user to change their password.
require('includes/config.inc.php');
$page_title = 'My Awards';
include('includes/templates/header.php');

// If no user_id session variable exists, redirect the user:
if (!isset($_SESSION['user_id'])) {

	$url = BASE_URL . 'index.php'; // Define the URL.
	ob_end_clean(); // Delete the buffer.
	header("Location: $url");
	exit(); // Quit the script.

}

require_once('mysqli_connect.php');

?>

<?php include('includes/templates/my_awards.php'); ?>

<?php include('includes/templates/footer.php'); ?>