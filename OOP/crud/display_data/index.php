<?php 
include_once('oop.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <?php

        $DisplayData = new Person;
        echo $DisplayData->DisplayData();

        ?>
    </ul>
</body>
</html>