<?php # Script 18.5 - index.php
// This is the main page for the site.

// Include the configuration file:
require('includes/config.inc.php');

// Set the page title and include the HTML header:
$page_title = 'Excellent Job';
include('includes/templates/header.php');

// Welcome the user (by name if they are logged in):
echo '<h2>Welcome';
if (isset($_SESSION[SQLFIX . 'first_name'])) {
    echo ", {$_SESSION[SQLFIX . 'first_name']}";
}
echo '!</h2>';

// see if logged in
if (isset($_SESSION[SQLFIX . 'user_level'])) {
    
    // check user level
    if ($_SESSION[SQLFIX . 'user_level'] == 0) {
        include('includes/templates/regular_landing.php');
    } else {
        include('includes/templates/admin_landing.php');
    }
}
else {
    include('includes/templates/main_page.php');
}

?>

<?php include('includes/templates/footer.php'); ?>
