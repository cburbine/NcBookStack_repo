<?php

#method taken from http://php.about.com/od/phpwithmysql/ss/php_search.htm
#provieded the general outlint on how to do this method, some issues with the 
#exact methid had to be modified

include 'index.php';
require "userpass.php";

if (isset($_POST['searching']) && isset($_POST['find']) && isset($_POST['field'])) {

    $searching = $_POST['searching'];
    $find = $_POST['find'];
    $field = $_POST['field'];

    if ($searching == "yes") {
        echo '<h2>Found: </h2><p>';

        if ($find == "") {
            echo '<p>Search field empty';
            exit();
        }
        if ($field == "") {
            echo 'Please select what to search by';
            exit();
        }
        mysql_connect("localhost", "root", "root") or
                die(mysql_error());
        mysql_select_db("book_slice1") or die(mysql_error());

        $find = strtoupper($find);
        $find = strip_tags($find);
        $find = trim($find);

        $data = mysql_query("SELECT * FROM bookslice1 WHERE $field LIKE'%$find%'");

        echo '<form method="post" action="checkbox_test.php" name="boxform">';
        echo '<input type="submit" name="addall" value="Add Selected"><br><br>';
        while ($result = mysql_fetch_array($data)) {
            echo '<input type="checkbox" name="boxes[]" value="'.$result['index'].'"/>';
            echo '<br>';
            echo 'Title: ' . $result['title'];
            echo '<br>';
            echo 'Edition number: ' . $result['edition'];
            echo '<br>';
            echo 'Author(s): ' . $result['author'];
            echo '<br>';
            echo 'Price: $' . $result['price'];
            echo '<br>';
            echo 'Subject number: ' . $result['subject_number'];
            echo '<br>';
            echo 'Class number: ' . $result['class_number'];
            echo '<br>';
            echo 'ISBN number: ' . $result['isbn'];
            echo '<br>';
            #added an echo to display teh blob image
            echo '<img src="data:image/jpeg;base64,' . base64_encode($result['image']) . '" />';
            echo '<br>';
            echo '<br>';
        }
        echo '</form>';
        

        $anymatches = mysql_num_rows($data);
        if ($anymatches == 0) {
            echo 'Request not found<br><br>';
        }
        #echo '<b>Searched for:</b> '.$find;
    }
}
?>

