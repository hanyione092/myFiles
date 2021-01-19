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

      $finalvalue = $_POST['finalValue'];
  
      $deletetbl="DELETE FROM infotbl WHERE fields = '$finalvalue'";
      $deleted = mysqli_query($con, $deletetbl);
  

      include'dbconfig1.php';
      $result=mysqli_query($con, "SELECT * from infotbl");
      echo "<select id ='delete-field'>";
      while ($row = mysqli_fetch_assoc($result)) 
            {
                  echo "<option value = ".$row["fields"].">".$row['fields']."</option>";
              }
      echo "</select>";
      ?>
      <script>
      alert("successfully deleted!");
      </script>
      <?php

?>