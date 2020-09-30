 <?php
 echo"normal constant"."<br>";
define("GREETING", "Welcome to crest Infotech!");
echo GREETING."<br>";
echo "array constant"."<br>";
define("cars", [
  "Alfa Romeo",
  "BMW",
  "Toyota"
]);
echo cars[0]."<br>";
echo "golbal constant"."<br>";
define("crest", "Welcome to crest Infotech!");

function myTest() {
  echo crest;
}
 
myTest();
?> 