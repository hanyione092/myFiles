<?php
$username="root";
$password="";
$database="thesislibrary";
$servername="localhost";

$con=mysqli_connect($servername,$username,$password);
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

  <script>
        $(document).ready(function (){
            $("#btn-remove").click(function(){
                initialValue = $('#delete-field').val();
                $("#patrick").load("load-tablev3.php", {
                    finalValue: initialValue
                });
            });

            $("#btn-insert").click(function(){
                intInsertValue = $('#insert-data').val();
                $("#patrick").load("insert-field.php", {
                    insertValue: intInsertValue
                });
            });

        });
  </script>
</head>
<body>
<div id = "patrick">
<?php
            include'dbconfig1.php';
            $result=mysqli_query($con, "SELECT * from infotbl");
            echo "<select id ='delete-field'>";
            while ($row = mysqli_fetch_assoc($result)) 
                  {
                        echo "<option value = ".$row["fields"].">".$row['fields']."</option>";
                    }
            echo "</select>";
?>
</div>
  <button id = "btn-remove">Remove</button><br/><br/>
  
  <input type = "text" id = "insert-data" onfocus="this.value=''">
  <button id = "btn-insert">Insert</button><br/><br/>
</body>

</html>