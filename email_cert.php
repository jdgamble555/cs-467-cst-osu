<?php # Script 10.2 - email_cert.php
// This page is for emailing an award certificate.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$page_title = 'Email an Award';
include('includes/templates/header.php');
echo '<h2>Email an Award</h2>';

// Check for a valid user ID, through GET or POST:
if ((isset($_GET['id'])) && (is_numeric($_GET['id']))) { // From view_users.php
    $id = $_GET['id'];
} elseif ((isset($_POST['id'])) && (is_numeric($_POST['id']))) { // Form submission.
    $id = $_POST['id'];
} else { // No valid ID, kill the script.
    echo '<p class="error">This page has been accessed in error.</p>';
    include('includes/templates/footer.php');
    exit();
}

require('mysqli_connect.php');
include "laTex.php";
include ('includes/award.tex');
ini_set('display_errors', 'On');


$query = "SELECT awards.id, 
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
$stmt->bind_result($aID, $rfname, $rlname, $sfname, $slname, $awardtype, $date);
$stmt->fetch();
$stmt->close();

$dbc->close();

print $aID;

print $rfname;

print $rlname;

print $awardtype;

print $date;

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

$receiver = $rfname . " " . $rlname;
$sender = $sfname . " " . $slname;
$tmpTex = $aID . "cert.tex";
$tmpAux = $aID . "cert.aux";
$tmpLog = $aID . "cert.log";
$tmpPDF = $aID . "cert.pdf";

$data = array(
    "sender" => $sender,
    "receiver" => $receiver,
    "date" => $date,
    "awardtype" => $awardtype//,
   // "signature" => $signature
);

try {
    LatexTemplate::download($data, 'award.tex', 'a.pdf');
} catch(Exception $e) {
    echo $e -> getMessage();
}



//delete temp files
//unlink($tmpsig);
//unlink($tmpTex);
//unlink($tmpAux);
//unlink($tmpLog);
//unlink($tmpPDF);


include('includes/templates/footer.php');
