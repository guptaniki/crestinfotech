<?php
$t = date("H");
echo $t."<br>";
echo"if condition"."<br>";


if ($t < "20") {
  echo "Have a good day!"."<br>";
}
echo "if else condition"."<br>";

if ($t < "20") {
  echo "Have a good day!"."<br>";
} else {
  echo "Have a good night!"."<br>";
}
echo "if else if condition"."<br>";

if ($t < "8") {
  echo "Have a good morning!"."<br>";
} elseif ($t < "10") {
  echo "Have a good day!"."<br>";
} else {
  echo "Have a good night!"."<br>";
}
echo "switch case condition"."<br>";
$favcolor = "pink";

switch ($favcolor) {
  case "red":
    echo "Your favorite color is red!"."<br>";
    break;
  case "pink":
    echo "Your favorite color is pink!"."<br>";
    break;
  case "green":
    echo "Your favorite color is green!"."<br>";
    break;
  default:
    echo "Your favorite color is neither red, blue, nor green!"."<br>";
}


echo "while loop"."<br>";
$x=0;
	while($x <= 5) {
  echo "The number is: $x <br>";
  $x++;
} 
echo "do while loop"."<br>";
do {
  echo "The number is: $x <br>";
  $x++;
} while ($x <= 5);
echo "for loop"."<br>";	

for ($x = 0; $x <= 10; $x++) {
  echo "The number is: $x <br>";
}
echo "foreach loop "."<br>";
$colors = array("red", "green", "blue", "yellow");

foreach ($colors as $value) {
  echo "$value <br>";
}

echo "break keyword "."<br>";
for ($x = 0; $x < 10; $x++) {
  if ($x == 4) {
    break;
  }
  echo "The number is: $x <br>";
}
echo "connection keyword"."<br>";
for ($x = 0; $x < 10; $x++) {
  if ($x == 4) {
    continue;
  }
  echo "The number is: $x <br>";
}
?>
