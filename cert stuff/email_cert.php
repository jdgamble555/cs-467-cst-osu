<?php # Script 10.2 - email_cert.php
// This page is for emailing an award certificate.


$page_title = 'Email an Award';+
include('includes/templates/header.php');
echo '<h2>Email an Award</h2>';

// Check for a valid user ID, through GET or POST:
if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From view_users.php
	$id = $_GET['id'];
} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission.
	$id = $_POST['id'];
} else { // No valid ID, kill the script.
	echo '<p class="error">This page has been accessed in error.</p>';
	include('includes/templates/footer.php');
	exit();
}

require('mysqli_connect.php');

    include "clean_text.php";
    include "laTex.php";
	ini_set('display_errors', 'On');
   
	     
        $db = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    
                       
         //get award info from awards
         $query= "SELECT id, giver, receiver, award_type, timestamp, FROM awards where id = ?";
         $stmt = $db->prepare($query);
         $stmt->execute();
         $stmt-> bind_result($id, $giver, $receiver, $award_type, $timestamp);
         $stmt-> fetch();
         $stmt->close();
               
		$db->close();
             
       //input data into .tex - data needs to be in an array - also used to send pdf
        $recName = $fname . " " . $lname;
        $giveName = $fname2 . " " . $lname2;
        $tmpTex = $aID . "cert.tex";
        $tmpAux = $aID ."cert.aux";
        $tmpLog = $aID. "cert.log";
		$tmpPDF = $aID. "cert.pdf";
		      
        $data = [
           "sender" => $sender,
           "receiver" => $receiver,
           "timestamp" => $timestamp,
           "award_type" => $award_type,
		   "signature" => $signature
           ];
        
		//call function to create the filled tex
		$texTemp = "./template/award.tex";
        clean_text($data, $texTemp, $tmpTex);
        
        //create pdf
		$cmd = "/usr/bin/pdflatex ".$tmpTex;
	    exec($cmd, $output, $error);
		if ($error > 0){
			die ("Error creating PDF. Please try again later.");
		}
	
		//delete temp files
        unlink ($tmpsig);
        unlink ($tmpTex);
        unlink ($tmpAux);
        unlink ($tmpLog);
		unlink ($tmpPDF);
	

include('includes/templates/footer.php');
?>