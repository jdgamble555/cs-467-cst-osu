<?php # Script 18.1 - header.html
// This page begins the HTML header for the site.

// Start output buffering:
ob_start();

// Initialize a session:
session_start();

// Check for a $page_title value:
if (!isset($page_title)) {
	$page_title = 'Employee Recognition';
}
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title><?php echo $page_title; ?></title>
	<link rel="stylesheet" type="text/css" href="includes/layout.css">
	<link rel="icon" href="img/star_logo.jpg" type="image/x-icon">
</head>

<body>
	<div class="header">
		<img src="img/star_logo.jpg" alt="logo">
		<h1><a href="Login.html">Employee Recognition</a></h1>
	</div>
	<div id="Content">
		<!-- End of Header -->