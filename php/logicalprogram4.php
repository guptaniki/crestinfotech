<?php
function print_pattern($num)
{
// Outer loop handles number of rows
for ($i = $num; $i > 0; $i--){
// inner loop handles number of stars
for($j = 0; $j < $i; $j++ )
{
// Print stars
echo "* ";
}
// go to new line after each row pattern is printed
echo "<br>";
}
}
//Call function and send number of lines as parameter
$num = 5;
print_pattern($num);
?>