<h2>Award Management</h2>

<!--     Award Management Content     -->
<div id="awardList_container">
    <table>
        <tr>
            <th>Date</th>
            <th>Receiver</th>
            <th>Award Type</th>
            <th>Action</th>
        </tr>

        <?php

        // used inner join here with foreign key
        $q = "SELECT awards.id, users.first_name, users.last_name, awards.award_type, DATE_FORMAT(awards.timestamp, '%Y/%m/%d') AS da FROM awards INNER JOIN users ON awards.receiver=users.user_id ORDER BY da ASC";
        $r = @mysqli_query($dbc, $q);

        $bg = '#eeeeee'; // Set the initial background color.

        while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {

            $bg = ($bg == '#eeeeee' ? '#ffffff' : '#eeeeee'); // Switch the background color.

            echo '<tr>
		<td align="left">' . $row['da'] . '</td>
        <td align="left">' . $row['first_name'] . ' ' . $row['last_name'] . '</td>
        <td align="left">' . '<a href="my_awards.php?award=' . $row['id'] . '">' . $row['award_type'] . '</a></td>
        <td><button class="deletebtn" onclick="location.href=\'delete_award.php?id=' . $row['id'] . '\'">Delete</button></td>
	</tr>
	';
        } // End of WHILE loop.

        ?>




    </table>

</div>
<p> </p>
<div id="awards_container">
    <form action="awards.php" method="post">
        <h4>Reciever: <br><select name="receiver">

                <?php

                $q = "SELECT first_name, last_name, user_id FROM users";
                $r = @mysqli_query($dbc, $q);

                while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {

                    echo '<option value="' . $row['user_id'] . '">' . $row['first_name'] . ' ' . $row['last_name'] . '</option>';
                }
                ?>

            </select>
            <input type="hidden" name="sender" value="<?php echo $_SESSION[SQLFIX . 'user_id']; ?>">
            <h4>Award Type: <input name="award_type" type="text" placeholder="Enter award type">


                <input type="submit" class="buttons" name="add_award" value="Add Award">

    </form>
</div>