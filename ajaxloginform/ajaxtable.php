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
            var commentCount = 15;
            $("button").click(function(){
                commentCount = commentCount + 2;
                $("#patrick").load("load-table.php", {
                    commentNewCount: commentCount
                });
            });
            $( "button" ).trigger( "click" );
        });
  </script>
</head>

<body>
<h1>Hi!</h1>
<div style = "background-color: green" id = "patrick">
<ul>
<?php
            include'dbconfig1.php';
            $result=mysqli_query($con, "SELECT * from infotbl LIMIT 2");

            while ($row = mysqli_fetch_assoc($result)) 
                  {
                        echo "<li>" .$row['fields']. "</li>";
                    }

                ?>
</ul>
</div>
<button>Show More!</button>
</body>

</html>