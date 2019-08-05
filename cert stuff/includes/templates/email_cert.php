<div class='container'>
        Are you sure you want to email this award?

    <form action="email_cert.php" method="post">
        <input type="radio" name="sure" value="Yes"> Yes
        <input type="radio" name="sure" value="No" checked="checked"> No
        <input type="submit" class="buttons" name="Send" value="submit">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
    </form>
</div>