<?php # Script 18.5 - index.php
// This is the main page for the site.

// Include the configuration file:
require('includes/config.inc.php');
require('signature-to-image.php');
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
<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>Accept a Signature · Signature Pad</title>
  <style>
    body { font: normal 100.01%/1.375 "Helvetica Neue",Helvetica,Arial,sans-serif; }
  </style>
  <link href="../assets/jquery.signaturepad.css" rel="stylesheet">
  <!--[if lt IE 9]><script src="../assets/flashcanvas.js"></script><![endif]-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
</head>
<body>
  <form method="post" action="" class="sigPad">
    <label for="name">Print your name</label>
    <input type="text" name="name" id="name" class="name">
    <p class="typeItDesc">Review your signature</p>
    <p class="drawItDesc">Draw your signature</p>
    <ul class="sigNav">
      <li class="drawIt"><a href="#draw-it" >Draw It</a></li>
      <li class="clearButton"><a href="#clear">Clear</a></li>
    </ul>
    <div class="sig sigWrapper">
      <div class="typed"></div>
      <canvas class="pad" width="400" height="150"></canvas>
      <input type="hidden" name="output" class="output">
    </div>
    <button type="submit">Save</button>
  </form>

  <script src="../jquery.signaturepad.js"></script>
  <script>
    $(document).ready(function() {
      $('.sigPad').signaturePad();
    });
  </script>
  <script src="../assets/json2.min.js"></script>
</body>
<?php include('includes/templates/footer.php'); ?>