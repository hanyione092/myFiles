<html>

<?php // How to Connect to Database

    $connect = mysqli_connect("localhost", "root", "", "patrickpogi");

if ($connect->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

?>
</html>

