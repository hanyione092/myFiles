<?php
    $conn = new mysqli("localhost", "root", "", "thesislibrary");

    $acceptedFile = array("pdf", "docx");

    $file_name = $_FILES['file']['name'];
    $file_tmp =$_FILES['file']['tmp_name'];

    $tmp = explode('.', $file_name);
    $file_extension = end($tmp);
    $new_filename = strtolower($file_name);
    $validator = "";


    if (!in_array($file_extension, $acceptedFile)){
        $validator .= "File not Supported!";
    }else{
        $validator .= "File Supported!";
        $file_title = $_POST['title'];

        $sqlread = mysqli_query($conn, "SELECT * from formstbl WHERE title = '$file_title'");

       if (!$sqlread || mysqli_num_rows($sqlread) == 0){

        $sqlInsert = mysqli_query($conn, "INSERT INTO formstbl (title, file) VALUES ('$file_title', '$new_filename')");

        move_uploaded_file($file_tmp,'uploads/'.$new_filename);
        
       }else {
        $validator .= "Existing!";
       }

    }
    echo json_encode($validator);
?>