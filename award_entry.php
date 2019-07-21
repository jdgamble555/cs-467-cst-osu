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
<!--     Comment     -->   
    <div class="header">
        <img src="../img/star_logo.jpg" alt="logo"> 
        <h1><a href="Login.html">EXCELLENT JOB</a></h1>
    </div>

    <h2>Award Entry</h2> 

    <!--     Award Entry Content     --> 
    <form action="awardEntry.php">
        <div id="awardEntry_container">
            <label for="name"><b>Award Receiver Name</b></label>
            <input type="text" name="name" required>

            <label for="awardType"><b>Award Type</b></label>
            <input type="text" name="awardType" required>
            
            <label for="email"><b>Award Receiver Email</b></label>
            <input type="text" name="email" required>

            <div class="clearfix">
                <button type="reset" class="cancelbtn">Cancel</button>
                <button type="submit" class="emailbtn">Email Award</button>
            </div>
        </div>
    </form>
    <br><br><br><br><br><br>

</body>
</html>

















