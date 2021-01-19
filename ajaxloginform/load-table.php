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

            $commentNewCount = $_POST["commentNewCount"];

            $result=mysqli_query($con, "SELECT * from infotbl LIMIT $commentNewCount");

            echo "<ul>";

            while ($row = mysqli_fetch_assoc($result)) 
                  {
                        echo "<li>" .$row['fields']. "</li>";
                    }
            echo "</ul>";
?>