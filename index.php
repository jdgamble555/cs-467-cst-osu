<?php # Script 18.5 - index.php
// This is the main page for the site.

// Include the configuration file:
require('includes/config.inc.php');

// Set the page title and include the HTML header:
$page_title = 'Welcome to this Site!';
include('includes/header.html');

// Welcome the user (by name if they are logged in):
echo '<h1>Welcome';
if (isset($_SESSION['first_name'])) {
    echo ", {$_SESSION['first_name']}";
}
echo '!</h1>';

if ($_SESSION['user_level'] == 0) {
    include('includes/regular_landing.php');
} else {
    include('includes/admin_landing.php');
}

?>

<?php include('includes/footer.html'); ?>
