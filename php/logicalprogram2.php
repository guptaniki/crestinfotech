<?php

function parttem($num)
{
	for ($i=0; $i <$num ; $i++) {
	for ($j=0; $j <=$i ; $j++) {
	echo "* "; 
	 	# code...
	 } 
	 echo "<br>";
	# code...
}
}
$num=6;
parttem($num);
?>