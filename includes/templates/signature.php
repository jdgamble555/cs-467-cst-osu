<br><br>
<h3>Add a Signature</h3>
<div id="sig_container">
    <!--<form enctype="multipart/form-data" action="signature.php" method="post">

        <input type="hidden" name="MAX_FILE_SIZE" value="524288">

        <fieldset>
            <legend>Select a JPEG or PNG image of 512KB or smaller to be uploaded:</legend>

            <p><strong>File:</strong> <input type="file" name="upload"></p>

        </fieldset>
        <div align="center"><input type="submit" class="buttons" name="submit" value="Submit"></div>

    </form>-->
    <form enctype="multipart/form-data" method="post" action="signature.php" class="sigPad" name="sigForm">
        <!--<label for="name">Print your name</label>
    <input type="text" name="name" id="name" class="name">
    <p class="typeItDesc">Review your signature</p>-->
        <p class="drawItDesc">Draw your signature</p>
        <ul class="sigNav">
            <!--<li class="drawIt"><a href="#draw-it" >Draw It</a></li>-->
            <li class="clearButton"><a href="#clear">Clear</a></li>
        </ul>
        <div class="sig sigWrapper">
            <div class="typed"></div>
            <canvas class="pad" width="400" height="150"></canvas>
            <input type="hidden" name="output" class="output">
        </div>
        <input type="submit" class="buttons" type="submit">
    </form>

    <script src="./signature/jquery.signaturepad.js"></script>
    <script>
        $(document).ready(function() {
            $('.sigPad').signaturePad();
        });
    </script>
    <script src="../signature/assets/json2.min.js"></script>
</div>