<?php

    $conn = new mysqli("localhost", "root", "", "thesislibrary");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Array</title>
</head>
<style>

input {
    margin-top: ;
    margin-bottom: .8rem;
}

    </style>
<body>
    
<?php

$finalAuthor = "";
$finalAffiliation = "";

$sqlread = mysqli_query($conn, "SELECT * FROM manuscripttbl WHERE id > 216");

while ($row = mysqli_fetch_assoc($sqlread)){

    $id = $row['id'];
    $author = $row['author1'];
    $affiliation = $row['affiliation'];

    $ArrayAuthor = (explode(", ",$author));
    $countAuthor = count($ArrayAuthor);

    $ArrayAffiliation = (explode(", ", $affiliation));
    $countAffiliation = count($ArrayAffiliation);

    if ($countAuthor >= $countAffiliation){
        $finalCount = $countAuthor;
    }else{
        $finalCount = $countAffiliation;
    }
    

    echo "<h3>author:</h3>".$row['author1'];
    echo "<h3>affiliation:</h3>".$row['affiliation']. "</br>";
    echo "</br>";

    ?>
        <form action = "updateArray.php" method = "POST">
            <input type = "text" name = "getID" value = "<?php echo $id; ?>" hidden>
            <?php
            
                for ($i=0; $i < $finalCount; $i++) { 
                    ?>
                    <div class="product-item float-clear" style="clear:both;">
                        <input type="text" placeholder="Author" name="author[]" value = "<?php echo $ArrayAuthor[$i]; ?>" /> • <input type="text" placeholder="Course" name="affiliation[]" value = "<?php echo $ArrayAffiliation[$i]; ?>" />
                    </div>
                    <?php
                }
            ?>
            <button name = "button">Update</button>
</form>
    <?php

}
if (isset($_POST['button'])){

    $updateID = $_POST['getID'];
    $countUpdateAuthor = count($_POST['author']);
    $countUpdateAffiliation = count($_POST['affiliation']);

    for ($i=0; $i < $countUpdateAuthor; $i++) { 
        $finalAuthor .= $_POST['author'][$i];
        if($i == $countUpdateAuthor-1){
        break;
        }else{
            $finalAuthor .= ", ";
        }
    }

    for ($k=0; $k < $countUpdateAffiliation; $k++) { 
        $finalAffiliation .= $_POST['affiliation'][$k];
        if ($k == $countUpdateAffiliation-1){
        break;
        }else{
            $finalAffiliation .= ", ";
        }
    }

    echo $finalAffiliation;
    echo $finalAuthor;
    echo $updateID;

    $sqlUpdate = mysqli_query($conn, "UPDATE manuscripttbl SET author1 = '$finalAuthor', affiliation = '$finalAffiliation' WHERE id = '$updateID'");
}
?>

</body>
</html>