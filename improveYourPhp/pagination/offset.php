<html>
   
   <head>
      <title>Paging Using PHP</title>
   </head>
   
   <body>
      <?php

         
         $rec_limit = 10;
         $conn = new mysqli("localhost", "root", "", "thesislibrary");
         
         if(! $conn ) {
            die('Could not connect: ' . mysql_error());
         }
         
         /* Get total number of records */

         $sql = mysqli_query($conn, "SELECT * FROM manuscripttbl");
         $rec_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM manuscripttbl"));
         
         
         if( isset($_GET{'page'} ) ) {
            $page = $_GET{'page'} + 1;
            $offset = $rec_limit * $page ;
         }else {
            $page = 0;
            $offset = 0;
         }
         
         $left_rec = $rec_count - ($page * $rec_limit);
            
         $retval = mysqli_query($conn,"SELECT * FROM manuscripttbl LIMIT $offset, $rec_limit");
         
         if(! $retval ) {
            die('Could not get data: ' . mysql_error());
         }
         
         while ($row = mysqli_fetch_assoc($retval)){
            echo "<p>".$row['title']."</p>";
        }
         
         if( $page > 0 ) {
            $last = $page - 2;
            echo "<a href = \"offset.php?page = $last\">Last 10 Records</a> |";
            echo "<a href = \"offset.php?page = $page\">Next 10 Records</a>";
         }else if( $page == 0 ) {
            echo "<a href = \"offset.php?page = $page\">Next 10 Records</a>";
         }else if( $left_rec < $rec_limit ) {
            $last = $page - 2;
            echo "<a href = \"offset.php?page = $last\">Last 10 Records</a>";
         }
         
      ?>
      
   </body>
</html>