<?php
// array 
echo "array"."<br>";
	$color= array("black", "red","green");
	echo "i like".$color[0].",".$color[1]."and".$color[2]."<br>";

// array length function
	echo"array length function"."<br>";
		echo count($color)."<br>";
// indexed array  and loop through an indexed array
	echo"indexed array  and loop through an indexed array"."<br>";
	$arraylength=count($color);
	for($x=0;$x<$arraylength;$x++)
	{
		echo $color[$x];
		echo "<br>";

	}
	// Associative  array  
	echo "Associative  array"."<br>";
	$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
	echo "Peter is " . $age['Peter'] . " years old."."<br>";
// Associative array  and loop through an Associative array
	echo"Associative array  and loop through an Associative array"."<br>";

foreach($age as $x => $x_value) {
  echo "Key=" . $x . ", Value=" . $x_value;
  echo "<br>";
}
// Multidimensional   array  
	echo "Multidimensional   array"."<br>";
	
$cars = array (
  array("Volvo",22,18),
  array("BMW",15,13),
  array("Saab",5,2),
  array("Land Rover",17,15)
);
  
echo $cars[0][0].": In stock: ".$cars[0][1].", sold: ".$cars[0][2].".<br>";
echo $cars[1][0].": In stock: ".$cars[1][1].", sold: ".$cars[1][2].".<br>";
echo $cars[2][0].": In stock: ".$cars[2][1].", sold: ".$cars[2][2].".<br>";
echo $cars[3][0].": In stock: ".$cars[3][1].", sold: ".$cars[3][2].".<br>";
// Multidimensional  array  and loop through an Multidimensional  array
	echo"Multidimensional  array  and loop through an Multidimensional  array"."<br>";

for ($row = 0; $row < 4; $row++) {
  echo "<p><b>Row number $row</b></p>";
  echo "<ul>";
  for ($col = 0; $col < 3; $col++) {
    echo "<li>".$cars[$row][$col]."</li>";
  }
  echo "</ul>";
}
// sort   array  
	echo "sort array"."<br>";
	echo "Sort Array in Ascending Order"."<br>";
sort($color)."<br>";
	$clength = count($color);
for($x = 0; $x < $clength; $x++) {
  echo $color[$x];
  echo "<br>";
}
	echo "Sort array number in Ascending order"."<br>";
	$numbers = array(4, 6, 2, 22, 11);
sort($numbers);

$arrlength = count($numbers);
for($x = 0; $x < $arrlength; $x++) {
  echo $numbers[$x];
  echo "<br>";
}
// Sort Array in Descending Order - rsort()
	echo "Sort Array in Descending Order"."<br>";
	rsort($color);

$clength = count($color);
for($x = 0; $x < $clength; $x++) {
  echo $color[$x];
  echo "<br>";
}
echo "Sort array number in Descending order"."<br>";
	$numbers = array(4, 6, 2, 22, 11);
rsort($numbers);

$arrlength = count($numbers);
for($x = 0; $x < $arrlength; $x++) {
  echo $numbers[$x];
  echo "<br>";
}
// Sort Array (Descending Order), According to Value 
echo "Sort Array (Descending Order), According to Value "."<br>";
$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
arsort($age);

foreach($age as $x => $x_value) {
  echo "Key=" . $x . ", Value=" . $x_value;
  echo "<br>";
}
// Sort Array (Descending Order), According to Key
echo"Sort Array (Descending Order), According to Key"."<br>";
$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
krsort($age);

foreach($age as $x => $x_value) {
  echo "Key=" . $x . ", Value=" . $x_value;
  echo "<br>";
}
?>