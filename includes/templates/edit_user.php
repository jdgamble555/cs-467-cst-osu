<div class="container">
    <form action="edit_user.php" method="post">
        <p>First Name: <input type="text" name="first_name" size="15" maxlength="15" value="<?php echo $row[0]; ?>"></p>
        <p>Last Name: <input type="text" name="last_name" size="15" maxlength="30" value="<?php echo $row[1]; ?>"></p>
        <p>Email Address: <input type="email" name="email" size="20" maxlength="60" value="<?php echo $row[2]; ?>"> </p>
        <p><input type="submit" class="buttons" name="submit" value="Submit"></p>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
    </form>
</div>