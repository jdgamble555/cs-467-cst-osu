<h2>Award Management</h2> 

<!--     Award Management Content     --> 
<form action="awardManagement.php">
    <div id="awardList_container">
        <table>
            <tr>
                <th>Date</th>
                <th>Receiver</th>
                <th>Award Type</th>
                <th>Action</th>
            </tr>
            <!--     Need to be pulling from database. Below just examples     --> 
            <tr>
                <td>2019/7/10</td>
                <td>Mary Jones</td>
                <td>Employee of the Month</td>
                <td><button class="deletebtn" onclick="function">Delete</button></td>
            </tr>
            <tr>
                <td>2019/6/10</td>
                <td>Jay Carter</td>
                <td>Employee of the Week</td>
                <td><button class="deletebtn" onclick="function">Delete</button></td>
            </tr>
            <tr>
                <td>2019/8/15</td>
                <td>Mike House</td>
                <td>Employee of the Month</td>
                <td><button class="deletebtn" onclick="function">Delete</button></td>
            </tr>
        </table>

    </div>
</form>