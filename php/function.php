<?php
// user define function
echo "user define function"."<br>";
function crest()
{
	echo "hello crest infotech"."<br>";

}
crest();

// user define functon with argument 
echo "user define functon with argument"."<br>";
function crest_infotech($name)
{
	echo "$name is file"."<br>";
}
crest_infotech("doc file");


// defalut agrument fucntion
echo "defalut agrument function"."<br>";
function setHeight(int $minheight = 50) {
  echo "The height is : $minheight <br>";
}

setHeight(350);
setHeight(); 
setHeight(135);
setHeight(80);
// function return value
echo "function return value"."<br>";
function sum(int $a,int $b)
{
	$c=$a+$b;
	return $c;
}

echo "sum =".sum(10,2)."<br>";
// return type decalration 
echo "return type decalration"."<br>";

function addNumbers(float $a, float $b) : float {
  return $a + $b;
}
echo addNumbers(1.2, 5.2)."<br>"; 

// Passing Arguments by Reference
echo "Passing Arguments by Reference"."<br>";
function add_five(&$value) {
  $value += 5;
}

$num = 2;
add_five($num);
echo $num;
?>