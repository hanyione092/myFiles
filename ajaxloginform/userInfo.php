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

$username = $_POST['username'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$contact = $_POST['contact'];

if ($password == $confirmpassword){

$userquery = "SELECT * FROM admintbl WHERE username = '$username'";
$userresult = mysqli_query($con, $userquery);
$userrow = mysqli_fetch_array($userresult);

$contactquery = "SELECT * FROM admintbl WHERE contact = '$contact'";
$contactresult = mysqli_query($con, $contactquery);
$contactrow = mysqli_fetch_array($contactresult);

if ($userrow > 0) {

    ?>
<script>
alert("username already exists!");
</script>
    <?php

} elseif ($contactrow > 0) {
    
    ?>
<script>
alert("contact already exists!");
</script>
    <?php

}else{
    $sql = "INSERT INTO admintbl (username, password, firstname, lastname, contact) VALUES ('$username', '$password', '$firstname', '$lastname', '$contact')";
    if (mysqli_query($con, $sql)) {
      ?>
      <script>
          alert("Succesfully Created!");
      </script>
              <?php 
    }
}

}else {
    ?>
    <script>
        alert("Password does not match.");
    </script>
            <?php
}


?>
