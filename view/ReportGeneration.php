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

    <h2>Generate Report</h2> 

    <!--     Report Generation Content     --> 
    <form action="generateReport.php">
        <div id="report_container">
            <p>Please select below criterias to generate desired report.</p>

            <label for="date"><b>Award Month/Year: </b></label>
            <input type="month" name="awardMonth">

            <label for="awardType"><b>Award Type: </b></label>
            <input type="type" name="awardType"><br>

            <label for="name"><b>Award Creator: </b></label>
            <input type="name" name="name">

            <div class="clearfix">
                <button type="reset" class="cancelbtn">Export</button>
                <button type="submit" class="signupbtn">Display</button>
            </div>
        </div>
    </form>
    <br><br><br><br><br><br>

</body>
</html>

















