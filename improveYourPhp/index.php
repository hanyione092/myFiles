<?php
$con = new mysqli("localhost", "root", "", "thesislibrary");
/*----------------------------------------------------------------------------------------*/
$updateAuthor = "";
$updateAffiliation = "";
$updatedArrayFinal = "";
$updatedAffiliationFinal = "";

$result1 = mysqli_query($con, "SELECT * FROM manuscripttbl where id = 216");
while ($row = mysqli_fetch_assoc($result1)) {
    $updateAuthor = $row['author1'];
    $updateAffiliation = $row['affiliation'];
  }
$updatedAuthorArray = (explode(", ",$updateAuthor));
$updatedAffiliationArray = (explode(", ",$updateAffiliation));

$countAuthorArray = count($updatedAuthorArray);
$countAffiliationArray = count($updatedAffiliationArray);

for ($i=0; $i < $countAuthorArray ; $i++) { 
    $updatedArrayFinal .= $updatedAuthorArray[$i];
    if ($i == $countAuthorArray-1){
    break;
    }else{
        $updatedArrayFinal .= ", ";
    }
}
echo "<h1>Course</h1>".$updatedArrayFinal;
for ($j=0; $j < $countAffiliationArray ; $j++) { 
    $updatedAffiliationFinal .= $updatedAffiliationArray[$j];
    if ($j == $countAffiliationArray-1){
    break;
    }else{
        $updatedAffiliationFinal .= ", ";
    }
}
echo "<h1>Affiliation</h1>".$updatedAffiliationFinal ."<br/><br/>";

for ($k=0; $k < $countAuthorArray; $k++) { 
    ?>
	<div class="product-item float-clear" style="clear:both;">
		<input type="text" placeholder="Author" name="author[]" value = "<?php echo $updatedAuthorArray[$k]; ?>" /> • <input type="text" placeholder="Course" name="affiliation[]" value = "<?php echo $updatedAffiliationArray[$k]; ?>" />
	</div>
    <?php
}
?>

</div>