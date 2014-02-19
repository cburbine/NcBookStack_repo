<?php

#method taken from http://php.about.com/od/phpwithmysql/ss/php_search.htm
#provieded the general outlint on how to do this method, some issues with the 
#exact methid had to be modified

include 'index.php';
require "database_info.php";

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
        if($field == ""){
            echo 'Please select what to search by';
            exit();
        }
        mysql_connect(HOST, USERNAME, PASSWORD) or
                die(mysql_error());
        mysql_select_db(DATABASE_NAME) or die(mysql_error());
        
        $find = strtoupper($find);
        $find = strip_tags($find);
        $find = trim($find);
        
        $data = mysql_query("SELECT * FROM `" . TABLE_NAME . "` WHERE $field LIKE'%$find%'");
        
        while ($result = mysql_fetch_array($data)){
            echo 'Index number: '.$result['index'];
            echo '<br>';
            echo 'Title: '.$result['title'];
            echo '<br>';
            echo 'Edition number: '.$result['edition'];
            echo '<br>';
            echo 'Author(s): '.$result['author'];
            echo '<br>';
            echo 'Price: $'.$result['price'];
            echo '<br>';
            echo 'Subject number: '.$result['subject_number'];
            echo '<br>';
            echo 'Class number: '.$result['class_number'];
            echo '<br>';
            echo 'ISBN number: '.$result['isbn'];
            echo '<br>';
            echo '<br>';
        }
        
        $anymatches = mysql_num_rows($data);
        if($anymatches == 0){
            echo 'Request not found<br><br>';
        }
        echo '<b>Searched for:</b> '.$find;
    }
}
?>

