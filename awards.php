<?php

require('includes/config.inc.php');

$page_title = 'Award Management';

include('includes/templates/header.php');

require_once('mysqli_connect.php');

# add award
if (isset($_POST['add_award'])) {

    $award_type = $_POST['award_type'];
    $receiver = $_POST['receiver'];
    $sender = $_POST['sender'];

    $q = "INSERT INTO awards (award_type, receiver, sender, timestamp) VALUES ('$award_type', '$receiver', '$sender', NOW() )";
    $r = mysqli_query($dbc, $q) or trigger_error("Query: $q\n<br>MySQL Error: " . mysqli_error($dbc));

    $body = "Your boss has given you an award. Login to Excellent Job to view it: http://web.engr.oregonstate.edu/~gambljon/index.php";
	mail($_POST['receiver'], 'Your received an award!', $body, 'From: gambljon@oregonstate.edu');

    if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

        echo '<p class="success">You have successfully added an award!</p>';

    } else { // If it did not run OK.
        echo '<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';
    }
}

?>

<?php include('includes/templates/awards.php'); ?>

<?php include('includes/templates/footer.php'); ?>

