<?php
$servername="localhost";
$username="root";
$password="";
$database="thesislibrary";


$con=mysqli_connect($servername, $username, "", $password);
mysqli_select_db($con,$database);

if(!$con){
	die('Could not connect'.mysqli_error());
}
/*----------------------------------------------------------------------------------------*/
?>
<!doctype html>
<html lang="en">

<head>
  <title>R&E</title>
  <link rel="icon" href="images/RElogo.png" type="image/gif" sizes="16x16">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
<h1>Hi!</h1>
<div style = "background-color: green" id = "update-table">
</div>
<form action = "load-tablev2.php" method = "POST">
<?php
            include'dbconfig1.php';
            $result=mysqli_query($con, "SELECT * from infotbl");
            echo "<div id = 'remove-table'>";
            echo "<select name ='delete-field'>";
            while ($row = mysqli_fetch_assoc($result)) 
                  {
                        echo "<option value = ".$row["fields"].">".$row['fields']."</option>";
                    }
            echo "</select>";
            echo "</div>";
?>
  <button name = "remove-field">Remove</button>
</form>
<form action = "load-tablev2.php" method = "POST">
  <input type = "text" placeholder = "Enter New Field">
  <button name = "new-field">Insert</button>
</form>
</body>
</html>
<script>
    function update(){
        xmlhttp = new XMLHttpRequest ();
        xmlhttp.open("GET", "load-tablev2.php", false);
        xmlhttp.send(null);
        document.getElementById("update-table").innerHTML = xmlhttp.responseText;
    }
    function remove(){
        xmlhttp = new XMLHttpRequest ();
        xmlhttp.open("POST", "remove-field.php", false);
        xmlhttp.send(null);
        document.getElementById("remove-table").innerHTML = xmlhttp.responseText;
    }
    update();
    remove();

    setInterval (function(){
        update();
        remove();
    }, 2000);
  </script>