<?php # Script 18.5 - index.php
// This is contact us page for the site.

// Include the configuration file:
require('includes/config.inc.php');

// Set the page title and include the HTML header:
$page_title = 'Contact Us';
include('includes/templates/header.php');

// Welcome the user.
echo '<h2>Hi there! Glad to see you!</h2>';
echo '<h3>(US)+1(888)999-7086</h3></br>';
echo '<h3>ExcellentJob@gmail.com</h3></br>';
?>

<img src="./img/greeting.gif" class="center">
<?php include('includes/templates/footer.php'); ?>

