<?php
// interger function
echo "interger function";
$a=10;
var_dump(is_int($a));
var_dump(is_integer($a));
var_dump(is_long($a));
$b=10.11;
var_dump(is_int($b));
var_dump(is_integer($b));
var_dump(is_long($b));

// float function
echo "float function";
$c=10.40;
var_dump(is_float($c));
var_dump(is_double($c));
$d=10;
var_dump(is_float($d));
var_dump(is_double($d));

// infinite/finite function
echo "infinite/finite function";
$x = 1.9e411;
var_dump($x);

// pi function
echo"pi";
echo(pi())."<br>";

// min and max function
echo"min";
echo(min(0, 150, 30, 20, -8, -200) . "<br>");
echo"max";
echo(max(0, 150, 30, 20, -8, -200)."<br>");

// absolute function
echo"absolute";
echo(abs(-6.7)."<br>");

// sqrt function
echo"sqrt";
echo(sqrt(64)."<br>"); 

// round fuction
echo "round";
echo(round(0.60)."<br>");  
echo(round(0.49)."<br>");  

// randam fuction
echo"rand";
echo(rand()."<br>");
echo(rand(10, 100)."<br>");
?>