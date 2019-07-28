<h2>My Awards</h2>

<!--     Award Management Content     -->
<div id="awardList_container">
    <table>
        <tr>
            <th>Date</th>
            <th>Award Type</th>
        </tr>

        <?php

        // used inner join here with foreign key
        $q = "SELECT award_type, DATE_FORMAT(awards.timestamp, '%Y/%m/%d') AS da FROM awards WHERE receiver='" . $_SESSION['user_id'] . "' ORDER BY da ASC";
        $r = @mysqli_query($dbc, $q);

        $bg = '#eeeeee'; // Set the initial background color.

        while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {

            $t = 1;

            $bg = ($bg == '#eeeeee' ? '#ffffff' : '#eeeeee'); // Switch the background color.

            echo '<tr>
		<td align="left">' . $row['da'] . '</td>
        <td align="left">' . $row['award_type'] . '</td>
	    </tr>
	    ';
        } // End of WHILE loop.


        ?>




    </table>

    

</div>