<?php

// report page
if (isset($_POST['display'])) {

    echo $s;
?>


<?php
// regular page
} else {
?>

<h2>Generate Report</h2>

<!--     Report Generation Content     -->
<form action="reports.php" method="post">

    <div id="report_container">
        <p>Please select below criterias to generate desired report.</p>
        <p>Award Month/Year: <?php echo $d; ?></p>
        <p>Award Type: <?php echo $s; ?></p>

        <input type="submit" class="buttons signupbtn btn_float" name="display" value="Display">
        <input type="submit" class="buttons signupbtn btn_float" name="export" value="Export">
    </div>
</form>

<?php

}