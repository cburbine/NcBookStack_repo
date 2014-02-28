<!DOCTYPE html>
<html>
    <head><title>Example</title></head>
    <body>
        
        <?php

        mysql_connect("localhost", "root", "root") or
                die(mysql_error());
        mysql_select_db("book_slice1") or die(mysql_error());

        $_boxValue = $_POST['boxes'];

        if (isset($_POST['boxes']) && !empty($_POST['boxes'])) {

            foreach ($_POST['boxes'] as $_boxValue) {
                echo '<p>Index #'.$_boxValue.' selected.</p>';
            }
        } else {
            echo 'No boxes were selected';
        }
        ?>
        
    </body>
</html>