<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action = "phpFileHandling.php" method = "POST" enctype='multipart/form-data'>
        <input type = "file" name = "username" accept = ".pdf"/>
        <button name = "button">Button</button>
    </form>
    <?php
        if (isset($_POST['button'])){
            $acceptedFile = array("pdf", "docx");
            $myFile = $_POST['username'];
            $extension = pathinfo($myFile, PATHINFO_EXTENSION);
            echo $extension;

            if (!in_array($extension, $acceptedFile)){
                echo "File not Supported!";
            }else{
                echo "File Supported!";
            }


        }

    ?>
</body>
</html>