<?php # Script 18.11 - change_password.php
// This page allows a logged-in user to change their password.

require('includes/config.inc.php');

require_once('mysqli_connect.php');

if (isset($_GET['award'])) {

	// Start output buffering:
	ob_start();

	// Initialize a session:
	session_start();

	$id = $_GET['award'];

	$query = "SELECT awards.id, 
receiver,
receiver.first_name, 
receiver.last_name, 
sender.first_name, 
sender.last_name, 
awards.award_type, 
Date_format(awards.timestamp, '%Y/%m/%d') AS da 
FROM awards 
INNER JOIN users AS receiver 
ON awards.receiver = receiver.user_id 
INNER JOIN users AS sender 
ON awards.sender = sender.user_id
WHERE awards.id = $id";

	$stmt = $dbc->prepare($query);
	$stmt->execute();
	$stmt->bind_result($aID, $rID, $r_fname, $r_lname, $s_fname, $s_lname, $award_type, $date);
	$stmt->fetch();
	$stmt->close();

	$dbc->close();

	include('includes/templates/pdf.php');

	if ($_SESSION[SQLFIX . 'user_level'] == 1) {
		header("refresh:3;url=awards.php");
	} else {
		header("refresh:3;url=my_awards.php");
	}
	exit();
}

$page_title = 'My Awards';

include('includes/templates/header.php');

include('includes/templates/my_awards.php');

include('includes/templates/footer.php');
