<?php
        $conn = new mysqli("localhost", "root", "", "thesislibrary");

        // if (isset($_POST['form-submit'])){
        //     $acceptedFile = array("pdf", "docx");

        //     $file_name = $_FILES['file']['name'];
        //     $file_tmp =$_FILES['file']['tmp_name'];

        //     $tmp = explode('.', $file_name);
        //     $file_extension = end($tmp);
        //     $new_filename = strtolower($file_name);


        //     if (!in_array($file_extension, $acceptedFile)){
        //         echo "File not Supported!";
        //     }else{
        //         echo "File Supported!";
        //         $file_title = $_POST['form-title'];

        //         $sqlread = mysqli_query($conn, "SELECT * from formstbl WHERE title = '$file_title'");

        //        if (!$sqlread || mysqli_num_rows($sqlread) == 0){

        //         $sqlInsert = mysqli_query($conn, "INSERT INTO formstbl (title, file) VALUES ('$file_title', '$new_filename')");

        //         move_uploaded_file($file_tmp,'uploads/'.$new_filename);
                
        //        }else {
        //            echo "existing";
        //        }

        //     }
        // }
        if (isset($_POST['update-submit'])){

            $id = $_POST['update-id'];
            $updated_file_name = $_FILES['updatefile']['name'];
            $updated_title = $_POST['update-title'];

            if (EMPTY($updated_file_name)){
                $sqlUpdate = mysqli_query($conn, "UPDATE formstbl SET title = '$updated_title' WHERE id = '$id'");
            }else{
                $acceptedFile = array("pdf", "docx");
                $file_tmp =$_FILES['updatefile']['tmp_name'];

                $tmp = explode('.', $updated_file_name);
                $file_extension = end($tmp);
                $new_filename = strtolower($updated_file_name);

                if (!in_array($file_extension, $acceptedFile)){
                    echo "File not Supported!";
                }else{
                    echo "File Supported!";

                    $sqlread = mysqli_query($conn, "SELECT * from formstbl WHERE title = '$updated_title'");

                    if (!$sqlread || mysqli_num_rows($sqlread) == 0){
     
                        $sqlUpdate = mysqli_query($conn, "UPDATE formstbl SET title = '$updated_title', file = '$new_filename' WHERE id = '$id'");
     
                     move_uploaded_file($file_tmp,'uploads/'.$new_filename);
                     
                    }else {
                        echo "change title to continue";
                    }
            }

        }
    }

        if(isset($_REQUEST['id'])){
            $id = $_REQUEST['id'];
            $sqlDelete = mysqli_query($conn, "DELETE FROM formstbl where id = '$id'");
        }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src = "js/ajax.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="style.css">
    <title>Downloadable Forms</title>


</head>

<body>
    <div class="container">
        <form method="POST" action="download-ajax-form.php" enctype="multipart/form-data">
            <div class="main-search-bar">
                <div class="search-bar">
                    <div class="left-side">
                        <div class="search-title">
                            <input type="text" placeholder="Title" name="title">
                            <input type="file" name="file" accept=".pdf" />
                        </div>
                        <div class="check-box">
                            <div>
                                <input type="checkbox" id="manuscript" name="download-forms[]" value="Manuscript">
                                <label for="manuscript">Manuscript</label>
                            </div>
                            <div>
                                <input type="checkbox" id="designproject" name="download-forms[]"
                                    value="Design Project">
                                <label for="vehicle1">Design Project</label>
                            </div>
                            <div>
                                <input type="checkbox" id="capstone" name="download-forms[]" value="Capstone">
                                <label for="capstone">Capstone</label>
                            </div>
                            <div>
                                <input type="checkbox" id="edp" name="download-forms[]" value="EDP">
                                <label for="edp">EDP</label>
                            </div>
                        </div>
                    </div>
                    <div class="submit-button">
                        <button name="form-submit">Submit</button>
        </form>
    </div>
    </div>
    </div>

    <div class="main-body">
        <table>
            <tr>
                <th>Title</th>
                <th>File</th>
                <th>Action</th>
            </tr>
            <?php
            $sqlSelect = mysqli_query($conn, "SELECT * FROM formstbl");

            while ($row = mysqli_fetch_assoc($sqlSelect)){
                echo '
                    <tr>
                        <td>'.$row['title'].'</td>
                        <td>'.$row['file'].'</td>
                        <td>';
                            ?>
            <button onclick="document.getElementById('<?php echo $row['id']; ?>').style.display= 'block' "
                class="w3-button w3-black">Edit</button></br>
            <?php
                           echo '<a href = "download-form.php?id='.$row['id'].'">Delete</a>
                        </td>
                    </tr>
                ';
                ?>


            <div id="<?php echo $row['id']; ?>" class="w3-modal">
                <div class="w3-modal-content">
                    <header class="w3-container w3-teal">
                        <span onclick="document.getElementById('<?php echo $row['id']; ?>').style.display= 'none'"
                            class="w3-button w3-display-topright">&times;</span>
                        <h2>Modal Header</h2>
                    </header>
                    <div class="w3-container">
                        <form method="POST" action="download-form.php" enctype="multipart/form-data">
                            <input type="text" name="update-id" value="<?php echo $row['id']; ?>" hidden>
                            <input type="text" placeholder="Title" name="update-title"
                                value="<?php echo $row['title']; ?>">
                            <input type="file" name="updatefile" accept=".pdf" />
                            <button name="update-submit">Submit</button>
                        </form>
                    </div>
                    <footer class="w3-container w3-teal">
                        <p>Modal Footer</p>
                    </footer>
                </div>
            </div>

            <?php
            }
            ?>
        </table>

    </div>
    </div>

    <script>
        function modal() {
            document.getElementById('id01').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('id01').style.display = 'none';
        }
    </script>


</body>

</html>