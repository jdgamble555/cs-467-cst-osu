<div class='container'>
    <h3>Name: <?php echo $row[0]; ?></h3>
    Are you sure you want to delete this award?

    <form action="delete_award.php" method="post">
        <input type="radio" name="sure" value="Yes"> Yes
        <input type="radio" name="sure" value="No" checked="checked"> No
        <input type="submit" class="buttons" name="submit" value="Submit">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
    </form>
</div>