<?php

require('includes/config.inc.php');

require_once('mysqli_connect.php');

if (isset($_POST['display']) || isset($_POST['export'])) {

    $q = "SELECT awards.id, 
receiver.first_name AS rfirst, 
receiver.last_name AS rlast, 
sender.first_name AS sfirst, 
sender.last_name AS slast, 
awards.award_type, 
Date_format(awards.timestamp, '%Y/%m/%d') AS da 
FROM awards 
INNER JOIN users AS receiver 
ON awards.receiver = receiver.user_id 
INNER JOIN users AS sender 
ON awards.sender = sender.user_id";

    $ds = $_POST['year_month'] . '01';
    $dt = $_POST['year_month'] . '31';

    // get dates
    $q .= " WHERE DATE(awards.timestamp) >= '" . $ds . "' AND DATE(awards.timestamp) < '" . $dt . "'";

    if ($_POST['award_type'])

        // get award type
        $q .= " AND awards.award_type='" . $_POST['award_type'] . "'";


    $r = @mysqli_query($dbc, $q);

    if (isset($_POST['export'])) {

        $s = '';

        while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
            $s .= $row['rfirst'] . ' ' . $row['rlast'] . ',' . $row['sfirst'] . ' ' . $row['slast'] . ',' . $row['award_type'] . ',' . $row['da'] . "\r\n";
        }

        echo $s;

        exit;
    }

    $page_title = 'Award Report Generation';

    include('includes/templates/header.php');

    // Table header:
    $s = '<p> </p><table width="60%">
<thead>
<tr>
	<th align="left"><strong>Receiver</strong></th>
	<th align="left"><strong>Sender</strong></th>
	<th align="left"><strong>Award</strong></th>
	<th align="left"><strong>Date</strong></th>
</tr>
</thead>
<tbody>
';


    $bg = '#eeeeee'; // Set the initial background color.

    $es = [];
    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {

        $bg = ($bg == '#eeeeee' ? '#ffffff' : '#eeeeee'); // Switch the background color.

        $s .= '<tr bgcolor="' . $bg . '">
            <td align="left">' . $row['rfirst'] . ' ' . $row['rlast'] . '</td>
            <td align="left">' . $row['sfirst'] . ' ' . $row['slast'] . '</td>
            <td align="left">' . $row['award_type'] . '</td>
            <td align="left">' . $row['da'] . '</td>
        </tr>
        ';
        $name = $row['rfirst'] . ' ' . $row['rlast'];
        if (!isset($es[$name])) {
            $es[$name] = 0;
        }
        $es[$name]++;
    }

    $s .= '</tbody></table>';

    $s .= '
    <!DOCTYPE HTML>
<html>
<head>
<script type="text/javascript">
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light1", // "light2", "dark1", "dark2"
	animationEnabled: false, // change to true		
	title:{
		text: "Top Employees"
	},
	data: [
	{
		// Change type to "bar", "area", "spline", "pie",etc.
		type: "column",
        dataPoints: [';

    foreach ($es as $key => $value) {
        $s .= '{ label: "' . $key .'", y: ' . $value . '},';
    }
    $s .= '
		]
	}
	]
});
chart.render();

}
</script>
</head>
<body>
<p> </p>
<div id="chartContainer" style="height: 370px; width: 60%; margin: 0 auto;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>
</body>
</html>
    
    ';
} else {

    $page_title = 'Award Report Generation';

    include('includes/templates/header.php');

    // get award types

    $q = 'SELECT DISTINCT award_type FROM awards';
    $r = @mysqli_query($dbc, $q);

    $s = '<select name="award_type"><option value="" SELECTED></option>';

    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {

        $s .= '<option value="' . $row['award_type'] . '">' . $row['award_type'] . '</option>';
    }

    $s .= '</select>';

    // get award dates

    $q = 'SELECT DISTINCT EXTRACT(YEAR_MONTH FROM `timestamp`) AS dr FROM awards';
    $r = @mysqli_query($dbc, $q);

    $d = '<select name="year_month"><option value="" SELECTED></option>';

    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {

        $new_d = $row['dr'];

        $new_d = preg_replace('/(\d{4})(\d{2})/', '${2}/${1}', $new_d);

        $d .= '<option value="' . $row['dr'] . '">' . $new_d . '</option>';
    }

    $d .= '</select>';
}

include('includes/templates/report_generation.php');

include('includes/templates/footer.php');
