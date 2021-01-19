<?php
while ($n != 0){
	$remainder = $n%10;
  $rev_num = $rev_num*10 + $remainder;
  $n = floor($n/10);
}
?>