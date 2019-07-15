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

    <h2>User Management</h2> 

    <!--     User Management Content     --> 
    <form action="userManagement.php">
        <div id="userList_container">
            <table>
                <tr>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>User Type</th>
                    <th>Action</th>
                </tr>
                <!--     Need to be pulling from database. Below just examples     --> 
                <tr>
                    <td>Mary Jones</td>
                    <td>mary@gmail.com</td>
                    <td>Admin User</td>
                    <td><button class="deletebtn" onclick="function">Delete</button><button class="updadtebtn" onclick="function">Update</button></td>
                </tr>
                <tr>
                    <td>Jay Carter</td>
                    <td>jay@yahoo.com</td>
                    <td>Regular User</td>
                    <td><button class="deletebtn" onclick="function">Delete</button><button class="updadtebtn" onclick="function">Update</button></td>
                </tr>
                <tr>
                    <td>Mike House</td>
                    <td>mhouse@yahoo.com</td>
                    <td>Regular User</td>
                    <td><button class="deletebtn" onclick="function">Delete</button><button class="updadtebtn" onclick="function">Update</button></td>
                </tr>
            </table>

        </div>
    </form>
    <br><br><br><br><br><br>

</body>
</html>

















