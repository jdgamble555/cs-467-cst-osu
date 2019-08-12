<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Reprots</title>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
</head>

<body>
    <script>
        var doc = new jsPDF()
        var img = new Image;
        var src = './img/header2.jpg';
        img.src = src;
        var img2 = new Image;
        src = './img/star_logo.jpg';
        img2.src = src;

        // signature Image
        <?php
            if (file_exists('./signatures/'.$rID.'.png')) {
        ?>

        var img3 = new Image;
        src = './signatures/<?php echo $rID; ?>.png';
        img3.src = src;
        img3.width = 80;
        img3.height = 30;

        <?php } ?>

        // Excellent Job and Image
        doc.addImage(img, 10, 10);
        doc.setFont("verdana, arial, helvetica, sans-serif;", "bold");
        doc.setFontSize(15);
        doc.setTextColor("#09c");
        doc.text(21, 20, 'Excellent Job\'s');
        
        doc.setFontSize(40);
        doc.text(20, 40, '<?php echo $award_type; ?>');


        doc.addImage(img2, -30, 70);
        // name etc
        doc.setFont("arial");
        doc.setFontSize(12);
        doc.setTextColor("#000")
        doc.text(20, 70, 'An Award from <?php echo $s_fname . " " . $s_lname; ?> on <?php echo $date; ?>.');
        // more
        doc.text(20, 90, 'Dear <?php echo $r_fname . " " . $r_lname; ?>,');
        doc.text(20, 100, 'Congratulations on a job well done and thank you for being a valuable member of our team.');
        doc.text(20, 110, 'Keep up the good work!');

        <?php
            if (file_exists('./signatures/'.$rID.'.png')) {
        ?>

        doc.text(20, 120, 'Accepted by:');
        doc.addImage(img3, 20, 125, 40, 15);

        <?php } ?>

        doc.save('certificate.pdf');

    </script>
</body>

</html>