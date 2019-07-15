<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CS467 Capstone Project</title>
    <!-- add icon link -->
    <link rel="icon" href="../img/star_logo.jpg" type="image/x-icon">
    
    <link rel="stylesheet" type="text/css" href="../includes/layout.css">
</head>

<body>
<!--     Header     -->   
    <div class="header">
        <img src="../img/star_logo.jpg" alt="logo"> 
        <h1><a href="Login.html">EXCELLENT JOB</a></h1>
    </div>

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
    <br><br><br><br><br><br>

</body>
</html>

















