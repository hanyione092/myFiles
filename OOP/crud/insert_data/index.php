<?php
include_once('insert-process.php');
$db = new Database();

if(isset($_POST['submit'])) {
    $db->insertData($_POST);
  }

  if (isset($_REQUEST['msg']))
  {
      echo "myaw";
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
    <form action = "index.php" method = "POST">
        <input type = "text" placeholder = "Enter name" name = "name">
        <input type = "text" placeholder = "Enter age" name = "age">
        <input type = "text" placeholder = "Enter address" name = "address">
        <button name = "submit">Submit</button>
    </form>
</body>
</html>