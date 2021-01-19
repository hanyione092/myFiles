<!DOCTYPE html>
<html>
<body>
<?php
$name = "Patrick";

echo "<a href = 'request.php?name=$name'>Click Me</a>";

if (isset($_REQUEST['name'])){

    echo $_REQUEST['name'];
    
}

?>
</body>
</html>
