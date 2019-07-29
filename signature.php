<?php

$page_title = 'Add a signature';

include('includes/templates/header.php');

if (!isset($_SESSION['user_id'])) {

	$url = BASE_URL . 'index.php'; // Define the URL.
	ob_end_clean(); // Delete the buffer.
	header("Location: $url");
	exit(); // Quit the script.

}

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['output'])) {
        // save image to png
        require_once "./signature/signature-to-image.php";
        $json = $_POST['output'];
        $img = sigJsonToImage($json);
        imagepng($img, "./signatures/" . $_SESSION['user_id'] . ".png");

        imagedestroy($img);

        chmod("./signatures/{$_SESSION['user_id']}.png", 0777);

        echo "success!";

    }

    // Check for an uploaded file:
    if (isset($_FILES['upload'])) {

        // Validate the type. Should be JPEG or PNG.
        $allowed = ['image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png'];
        if (in_array($_FILES['upload']['type'], $allowed)) {

            $name = $_FILES["file"]["name"];
            $ext = end((explode(".", $name)));

            // Move the file over.
            if (move_uploaded_file($_FILES['upload']['tmp_name'], "./signatures/{$_SESSION['user_id']}.png")) {
                // everyone can view it
                chmod("./signatures/{$_SESSION['user_id']}.png", 0777);
                echo '<p><em>The file has been uploaded!</em></p>';
            } // End of move... IF.

        } else { // Invalid type.
            echo '<p class="error">Please upload a JPEG or PNG image.</p>';
        }
    } // End of isset($_FILES['upload']) IF.

    // Check for an error:
    if ($_FILES['upload']['error'] > 0) {
        echo '<p class="error">The file could not be uploaded because: <strong>';

        // Print a message based upon the error.
        switch ($_FILES['upload']['error']) {
            case 1:
                print 'The file exceeds the upload_max_filesize setting in php.ini.';
                break;
            case 2:
                print 'The file exceeds the MAX_FILE_SIZE setting in the HTML form.';
                break;
            case 3:
                print 'The file was only partially uploaded.';
                break;
            case 4:
                print 'No file was uploaded.';
                break;
            case 6:
                print 'No temporary folder was available.';
                break;
            case 7:
                print 'Unable to write to the disk.';
                break;
            case 8:
                print 'File upload stopped.';
                break;
            default:
                print 'A system error occurred.';
                break;
        } // End of switch.

        print '</strong></p>';
    } // End of error IF.

    // Delete the file if it still exists:
    if (file_exists($_FILES['upload']['tmp_name']) && is_file($_FILES['upload']['tmp_name'])) {
        unlink($_FILES['upload']['tmp_name']);
    }
} // End of the submitted conditional.

$fl = "./signatures/" . $_SESSION['user_id'] . ".png";

if (file_exists($fl)) {
    echo '<br><br><div class="center"><img class="center" src="' . $fl . '"></div>';
}

?>


<?php include('includes/templates/signature.php'); ?>

<?php include('includes/templates/footer.php'); ?>














