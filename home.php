<?php include './view/header.php'; ?>

<p>This will be the body section.</p>

<?php

// get employee's name

$r = get_employee("1");

echo $r['name'];

?>

<?php include './view/footer.php'; ?>