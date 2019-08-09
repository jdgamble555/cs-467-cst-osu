<?php # Script 10.2 - email_cert.php
// This page is for emailing an award certificate.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$page_title = 'Email an Award';
include('../includes/templates/header.php');
echo '<h2>Email an Award</h2>';

// Check for a valid user ID, through GET or POST:
if ((isset($_GET['id'])) && (is_numeric($_GET['id']))) { // From view_users.php
    $id = $_GET['id'];
} elseif ((isset($_POST['id'])) && (is_numeric($_POST['id']))) { // Form submission.
    $id = $_POST['id'];
} else { // No valid ID, kill the script.
    echo '<p class="error">This page has been accessed in error.</p>';
    include('../includes/templates/footer.php');
    exit();
}

require('../mysqli_connect.php');

include "clean_text.php";
include "laTex.php";
ini_set('display_errors', 'On');


// get award info from awards
// $query = "SELECT id, sender, receiver, award_type, timestamp FROM awards where id = $id";

$query = "SELECT awards.id, 
receiver.first_name, 
receiver.last_name, 
sender.first_name, 
sender.last_name, 
award_type, 
Date_format(awards.timestamp, '%Y/%m/%d') AS da 
FROM awards 
INNER JOIN users AS receiver 
ON awards.receiver = receiver.user_id 
INNER JOIN users AS sender 
ON awards.sender = sender.user_id";


$stmt = $dbc->prepare($query);
$stmt->execute();
$stmt->bind_result($id, $r_fname, $r_lname, $s_fname, $s_lname, $award_type, $date);
$stmt->fetch();
$stmt->close();

$dbc->close();

/**
 * $id = award_id
 * $r_fname = receiver first name
 * $r_lname = receiver last name
 * $s_fname = sender first name
 * $s_lname = sender last name
 * $award_type = award type
 * $date = timestamp in format Year / Month / Day
 */


// input data into .tex - data needs to be in an array - also used to send pdf

$aID = $id;

$receiver = $r_fname . " " . $r_lname;
$sender = $s_fname . " " . $s_lname;
$tmpTex = $aID . "cert.tex";
$tmpAux = $aID . "cert.aux";
$tmpLog = $aID . "cert.log";
$tmpPDF = $aID . "cert.pdf";

$data = [
    "sender" => $sender,
    "receiver" => $receiver,
    "timestamp" => $date,
    "award_type" => $award_type,
    "signature" => $signature
];

//call function to create the filled tex
$texTemp = "./template/award.tex";
clean_text($data, $texTemp, $tmpTex);

//create pdf
$cmd = "/usr/bin/pdflatex " . $tmpTex;
exec($cmd, $output, $error);
if ($error > 0) {
    die("Error creating PDF. Please try again later.");
}

//delete temp files
unlink($tmpsig);
unlink($tmpTex);
unlink($tmpAux);
unlink($tmpLog);
unlink($tmpPDF);


include('./includes/templates/footer.php');
