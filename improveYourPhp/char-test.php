<?php
if (isset($_POST['btn-submit'])){
    $frmfile = "Forms\\".$_POST['user']."";

    echo $frmfile;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action = "char-test.php" method = "POST">
    <input type = "text" name = "user">
    <button name = "btn-submit">submit</button>
    </form>
</body>
</html>