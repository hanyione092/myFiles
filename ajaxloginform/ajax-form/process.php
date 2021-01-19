<?php 

$title = $_POST['title'];

if ($title == "patrikck"){
    $response = "yes!";
}

// Return response 
echo json_encode($response);

?>