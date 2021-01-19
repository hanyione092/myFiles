<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "thesislibrary"; 

$conn = new mysqli($servername, $username, $password, $database);

function connected(){
    echo "connected successfully!</br>";
}
function disconnected(){
    echo "connection error!";
}

if ($conn->connect_error){
    die("Connection failed:". $conn->connect_error);
}else{
    connected();
}


//*--------------HOW TO SELECT DATA-----------------*//

$count = 0;

$sqlread = mysqli_query($conn, "SELECT * from admintbl");
while($row = mysqli_fetch_assoc($sqlread))
{
    echo "First Name:".$row['firstname']."<br/>";
    echo "Last Name:".$row['lastname']."<br/>";
    $count += 1;
    
}
    echo $count;



//*----------HOW TO INSERT DATA---------------*//

$sqlInsert = mysqli_query($conn, "INSERT INTO admintbl (firstname, lastname) VALUES ('Anathan', 'Kalembang')");


//*-----------HOW TO UPDATE DATA---------*//

$sqlUpdate = mysqli_query($conn, "UPDATE admintbl SET firstname = 'TALAKITUK', lastname = 'TAETAE' where accountno = 44");


//*---------HOW TO DELETE DATA*//

$sqlDelete = mysqli_query($conn, "DELETE FROM admintbl where firstname = 'Anathan'");


?>
