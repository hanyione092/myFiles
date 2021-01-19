<?php

$conn = new mysqli("localhost", "root", "", "reserviceportal");

if (isset($_POST['btn-submit'])){

    $info_holder = '';
    $acceptedFile = array("pdf");
    $array_check = array();
    $extension_array = array();
    $array_count = COUNT($_FILES['file']['name']);

    for ($i=0; $i < $array_count; $i++) { 
        $extension_array[] = pathinfo($_FILES['file']['name'][$i], PATHINFO_EXTENSION);        
    }

    
    for ($j=0; $j < $array_count; $j++) { 
        if (!in_array($extension_array[$j], $acceptedFile)){
            $array_check[] = $_FILES['file']['name'][$j];
          }
    }

    if (!EMPTY($array_check)){
        $info_holder .= '
        <h4>Check your file Extension</h4>';
        for ($k=0; $k < COUNT($array_check); $k++) { 
            $info_holder .= '
            <a>'.$array_check[$k].'</a>
            ';
        }
    }else{

    }
    echo $info_holder;



    for ($i=0; $i < $array_count; $i++) {

        $filename = $_FILES['file']['name'][$i];
        $sqlSelect = mysqli_query($conn, "SELECT * FROM tbl_transactionfiles WHERE filename = '$filename'");
        $hit_files = mysqli_num_rows($sqlSelect);
        if ($hit_files == 0){
            move_uploaded_file($_FILES['file']['tmp_name'][$i],'uploads/'.$filename);
            $sqlFile = mysqli_query($conn, "INSERT INTO tbl_transactionfiles (hit_filename, filename) VALUES ('$filename', '$filename')");
            echo "uploaded";
        }else{

            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $basename = pathinfo($filename, PATHINFO_FILENAME);
            $counter = $hit_files + 1;
            $hit_filename = $basename." (".$counter.").".$extension;

            move_uploaded_file($_FILES['file']['tmp_name'][$i],'uploads/'.$hit_filename);

            $sqlFile = mysqli_query($conn, "INSERT INTO tbl_transactionfiles (hit_filename, filename) VALUES ('$hit_filename', '$filename')");

            if ($sqlFile){
                echo $hit_filename;
            }

        }

    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>

*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
.container{
    width: 100%;
    height: 100vh;
    background: beige;
    display: flex;
    align-items: center;
    justify-content: center;
}

</style>
<body>
<div class="container">
<form action = "index.php" method = "POST" enctype = "multipart/form-data">
    <input type = "file" name = "file[]" multiple/>
    <input type = "file" name = "file[]" multiple/>
    <button name = "btn-submit">Upload</button>
    </form>
</div>

</body>
</html>

<?php
if (isset($_POST['submit-feedback'])){
    $feedback = mysqli_real_escape_string($link, $_POST['agency-feedback']);
    $sender = $_POST['get-sender'];
    $empno = $_POST['get-empno'];
    $tempno = $_POST['get-tempno'];
    $main_tempno = $_POST['get-main-tempno'];
    $ref_no = $_POST['get-ref-no'];
    $tranno = $_POST['get-tranno'];
    $url = $_POST['get-url'];
    $status = $_POST['get-status'];
  
    if ($_POST['new-status'] == $status){
      $new_status = $status;
      $action = "";
    }else{
      $new_status = $_POST['new-status'];
  
      $sqlStatus1 = mysqli_query($link, "SELECT * FROM tbl_status WHERE statno = '$status'");
      while ($rowStatus1 = mysqli_fetch_array($sqlStatus1)){
        $from_status = $rowStatus1['statdesc'];
      }
  
      $sqlStatus2 = mysqli_query($link, "SELECT * FROM tbl_status WHERE statno = '$new_status'");
      while ($rowStatus2 = mysqli_fetch_array($sqlStatus2)){
        $to_status = $rowStatus2['statdesc'];
      }
  
      $action = strtolower(''.$sender.' has changed the status from '.$from_status.' to '.$to_status.'');
    }
  
  
    date_default_timezone_set('Asia/Manila');
    $today = strtotime(date("y-m-d h:i:sa"));
  
    $sqlSelect = mysqli_query($link, "SELECT * FROM tbl_transactionlist WHERE tempno = '$tempno'");
     $main_tempno = (mysqli_num_rows($sqlSelect)) + 1;
  
   $sqlAcc = mysqli_query($link, "SELECT * FROM tbl_acct WHERE empno = '$empno'");
   while ($row_acc = mysqli_fetch_array($sqlAcc)){
     $receiver = $row_acc['fullname'];
   }
  
  //  data insert process
  
  $filename = $_FILES['file']['name'];
  
  if ($filename[0] == false){
    //insert data only
  
    $sqlInsert = mysqli_query($link, "INSERT INTO tbl_transactionlist (empno, tranno, tempno, main_tempno, tranref, trandate, feedback, sender, receiver, verifier, statno, status_action) VALUES ('$empno', '$tranno', '$tempno', '$main_tempno', '$ref_no', '$today', '$feedback', '$sender', '$receiver', 1, '$new_status', '$action')");
  
         //final statno start
         $sql_final_statno = mysqli_query($link, "SELECT * FROM `tbl_transactionlist` WHERE tempno = '$tempno' GROUP BY tempno");
         while ($row_final_statno = mysqli_fetch_array($sql_final_statno)){
           $sql_final_tempno = $row_final_statno['tempno']; // for validation only
           $sql_final_trandate = $row_final_statno['trandate']; //for validation only
         }
         $update_final_statno = mysqli_query($link, "UPDATE tbl_transactionlist SET final_statno = '$new_status' WHERE tempno = '$sql_final_tempno' AND trandate = '$sql_final_trandate'");
          //final statno end  
  
    if ($sqlInsert && $update_final_statno){
  
      if ($_POST['get-checkbox']){
  
        $get_deadline = mysqli_query($link, "SELECT * FROM tbl_transaction WHERE tranno = '$tranno'");
        while ($row_deadline = mysqli_fetch_array($get_deadline)){
          $plus_deadline = $row_deadline['time'];
        }
  
        date_default_timezone_set('Asia/Manila');
        $deadline = strtotime("now + ".$plus_deadline."");
  
        $SelectRef = mysqli_query($link, "SELECT * FROM tbl_transaction WHERE tranno = '$tranno'");
    
        while ($get_ref = mysqli_fetch_array($SelectRef)){
    
          $ref = $get_ref['trancode'];
          $counter = $get_ref['tranctr'] + 1;
        }
        $pad_length = 3;
        $pad_char = 0;
    
        $str = str_pad($counter, $pad_length, $pad_char, STR_PAD_LEFT);
    
        $reference_no = "".$ref."-".date("Y")."-".$str."";
    
        $update_ref = mysqli_query($link, "UPDATE tbl_transactionlist SET tranref = '$reference_no', deadline = '$deadline' WHERE tempno = '$tempno'");
    
        if ($update_ref){
          $sqlUpdate = mysqli_query($link, "UPDATE tbl_transaction SET tranctr = '$counter' WHERE tranno = '$tranno'");
    
          if ($sqlUpdate){
            echo "<script>window.location.href = '".$url."';</script>";
          }else{
            echo "<script>alert('there's a problem with incrementing the reference number')</script>";
            echo "<script>window.location.href = '".$url."';</script>";
          }
        }else{
          echo "<script>alert('there's a problem giving the reference number')</script>";
          echo "<script>window.location.href = '".$url."';</script>";
        }
    
    
      }else{
        echo "<script>window.location.href = '".$url."';</script>";
      }
  
     }else{
       echo "<script>alert('error in uploading file')</script>";
       echo "<script>window.location.href = '".$url."';</script>";
     }
  
  }else{
    //insert data and file/s
  
    $array = array();
    $countfiles = COUNT($_FILES['file']['name']);
   
    for($i=0;$i<$countfiles;$i++){
        $filename = $_FILES['file']['name'][$i];
   
      if (file_exists("Archive/".$filename."")){
        $array[] = '"» '.$filename.'\n"+ ';
        clearstatcache();
      }
    }
    
       if (EMPTY($array)){
         
         for($i=0;$i<$countfiles;$i++){
           $filename = $_FILES['file']['name'][$i];
   
               move_uploaded_file($_FILES['file']['tmp_name'][$i],'Archive/'.$filename);
   
               $sqlFile = mysqli_query($link, "INSERT INTO tbl_transactionfiles (empno, tranref, main_tranref, filename, frmno, frmdate) VALUES ('$empno', '$tempno','$main_tempno', '$filename','0','0000-00-00')");
  
       }
   
         $sqlInsert = mysqli_query($link, "INSERT INTO tbl_transactionlist (empno, tranno, tempno, main_tempno, tranref, trandate, feedback, sender, receiver, verifier, statno, status_action) VALUES ('$empno', '$tranno', '$tempno', '$main_tempno', '$ref_no', '$today', '$feedback', '$sender', '$receiver', 1, '$new_status', '$action')");
  
         //final statno start
        $sql_final_statno = mysqli_query($link, "SELECT * FROM `tbl_transactionlist` WHERE tempno = '$tempno' GROUP BY tempno");
        while ($row_final_statno = mysqli_fetch_array($sql_final_statno)){
          $sql_final_tempno = $row_final_statno['tempno']; // for validation only
          $sql_final_trandate = $row_final_statno['trandate']; //for validation only
        }
        $update_final_statno = mysqli_query($link, "UPDATE tbl_transactionlist SET final_statno = '$new_status' WHERE tempno = '$sql_final_tempno' AND trandate = '$sql_final_trandate'");
         //final statno end
         
         if ($sqlInsert && $update_final_statno){
  
          if ($_POST['get-checkbox']){
  
              $get_deadline = mysqli_query($link, "SELECT * FROM tbl_transaction WHERE tranno = '$tranno'");
              while ($row_deadline = mysqli_fetch_array($get_deadline)){
                $plus_deadline = $row_deadline['time'];
              }
  
              date_default_timezone_set('Asia/Manila');
              $deadline = strtotime("now + ".$plus_deadline."");
      
            $SelectRef = mysqli_query($link, "SELECT * FROM tbl_transaction WHERE tranno = '$tranno'");
        
            while ($get_ref = mysqli_fetch_array($SelectRef)){
        
              $ref = $get_ref['trancode'];
              $counter = $get_ref['tranctr'] + 1;
            }
            $pad_length = 3;
            $pad_char = 0;
        
            $str = str_pad($counter, $pad_length, $pad_char, STR_PAD_LEFT);
        
            $reference_no = "".$ref."-".date("Y")."-".$str."";
        
            $update_ref = mysqli_query($link, "UPDATE tbl_transactionlist SET tranref = '$reference_no', deadline = '$deadline' WHERE tempno = '$tempno'");
        
            if ($update_ref){
              $sqlUpdate = mysqli_query($link, "UPDATE tbl_transaction SET tranctr = '$counter' WHERE tranno = '$tranno'");
        
              if ($sqlUpdate){
  
                echo "<script>window.location.href = '".$url."';</script>";
              }else{
                echo "<script>alert('there's a problem with incrementing the reference number')</script>";
                echo "<script>window.location.href = '".$url."';</script>";
              }
            }else{
              echo "<script>alert('there's a problem giving the reference number')</script>";
              echo "<script>window.location.href = '".$url."';</script>";
            }
        
        
          }else{
            echo "<script>window.location.href = '".$url."';</script>";
          }
  
         }else{
           echo "<script>alert('error in uploading data')</script>";
           echo "<script>window.location.href = '".$url."';</script>";
         }
       }else {
         $implode = (implode("", $array));
      echo '<script>alert("File already exists. Change the following file name.\n\n" + '.$implode.' "")</script>';
         echo "<script>window.location.href = '".$url."';</script>";   
       }
  }
  
  
  }
?>