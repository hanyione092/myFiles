<?php 

    $conn = new mysqli("localhost", "root", "", "thesislibrary");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <?php

    $limit = 10;
    $word_pagination = "";

    if (isset($_REQUEST['page'])){
        $page = $_REQUEST['page'];
        $offset = $page*$limit;

        $previous_page = $_REQUEST['page'] - 1;
        $next_page = $_REQUEST['page'] + 1;
    }else{
        $offset = 0;
        $previous_page = $offset - 1;
        $next_page = $offset + 1;
    }
    
    $sql = mysqli_query($conn, "SELECT * FROM manuscripttbl LIMIT $offset, $limit");
    $rowcount = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM manuscripttbl"));
    $number_of_pages = ceil($rowcount/$limit);
    echo $number_of_pages. "</br>";
    echo $offset;

    while ($row = mysqli_fetch_assoc($sql)){
        echo "<p>".$row['title']."</p>";
    }

    echo '<div class="pagination">';
       $pagination = "";

       if ($offset == 0){
        $pagination .= "<a href='#' style = 'pointer-events: none'>&laquo;</a>";
       }else{
        $pagination .= "<a href='offset.php?page=$previous_page'>&laquo;</a>";
       }

        if ($offset == ($number_of_pages - 1) * 10){
            $pagination .= "<a href='#' style = 'pointer-events: none'>&raquo;</a>";            
        }else
        $pagination .= "<a href='offset.php?page=$next_page'>&raquo;</a>";
        echo $pagination;

        if (isset($_REQUEST['page'])){

            $mother = $rowcount;
            $validator = $mother - $offset;

            if ($validator < 10){
                $first_page = $offset + 1;
                $last_page = ($offset + $validator);
                $word_pagination .= ''.$first_page.' of '.$last_page.' of '.$last_page.'';
            }else {
                $first_page = $offset + 1;
                $last_page = ($offset + 10);
                $word_pagination .= ''.$first_page.' - '.$last_page.' of '.$mother.'';
            }
            echo $word_pagination;

        }else{
            echo "1 - 10 of ".$rowcount."";
        }    
        ?>
    </div>
</body>

</html>