<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" type="text/css" href="../jquery-ui-1.10.4.custom/css/ui-lightness/jquery-ui-1.10.4.custom.min.css">

        <script src="../js/jquery-1.11.0.min.js"></script>
        <script src="../jquery-ui-1.10.4.custom/js/jquery-ui-1.10.4.custom.min.js"></script>

    </head>
    <body>
        <form name="search" method="post" action="processRequests.php">
            Search for: <input type="text" name="find" /> in
            <select name="field">
                <option value=""></option>
                <option value="title">Title</option>
                <option value="edition">Edition</option>
                <option value="author">Author</option>
                <option value="price">Price</option>
                <option value="subject_number">Subject</option>
                <option value="class_number">Class</option>
                <option value="isbn">ISBN Number</option>
            </select>
            <input type="hidden" name="searching" value="yes" />
            <input type="submit" name="search" value="Search" />
        </form>
    </body>
</html>
