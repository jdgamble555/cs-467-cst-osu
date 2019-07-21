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