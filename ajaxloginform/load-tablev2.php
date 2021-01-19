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
<?php
            include'dbconfig1.php';

            $sql = "INSERT INTO infortbl (fields) VALUES ('')";
            $result=mysqli_query($con, "SELECT * from infotbl");

            echo "<ul>";

            while ($row = mysqli_fetch_assoc($result)) 
                  {
                        echo "<li>" .$row['fields']. "</li>";
                    }
            echo "</ul>";
            if (isset($_POST['remove-field'])){
                  echo "<select name ='delete-fields'>";

                  while ($row = mysqli_fetch_assoc($result)) 
                        {
                              echo "<option value = ".$row["fields"].">".$row['fields']."</option>";
                          }
                  echo "</select>";
            }
?>