<?php
// PHP $GLOBALS
echo " PHP GLOBALS"."<br>";

$x = 65;
$y = 95;
 
function addition() {
  $GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];
}
 
addition();
echo "addition=	",$z."<br>"; 

// PHP $_SERVER
echo "PHP SERVER"."<br>";
echo $_SERVER['PHP_SELF'];
echo "<br>";
echo $_SERVER['SERVER_NAME'];
echo "<br>";
echo $_SERVER['HTTP_HOST'];
echo "<br>";
echo $_SERVER['HTTP_REFERER'];
echo "<br>";
echo $_SERVER['HTTP_USER_AGENT'];
echo "<br>";
echo $_SERVER['SCRIPT_NAME'];

// PHP $_REQUEST
echo "PHP REQUEST"."<br>";

?>

<!DOCTYPE html>
<html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Name: <input type="text" name="fname">
  <input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $name = htmlspecialchars($_REQUEST['fname']);
    if (empty($name)) {
        echo "Name is empty"."<br>";
    } else {
        echo $name."<br>";
    }
}
?>

</body>
</html>
<?php
// PHP $_POST
echo "PHP POST"."<br>";

?>

<!DOCTYPE html>
<html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Name: <input type="text" name="fname">
  <input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $name = $_POST['fname'];
    if (empty($name)) {
        echo "Name is empty"."<br>";
    } else {
        echo $name."<br>";
    }
}
?>

</body>
</html>
<?php
// PHP $_GET
echo "PHP GET"."<br>";

?>

<!DOCTYPE html>
<html>
<body>

<form method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Name: <input type="text" name="fname">
  <input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // collect value of input field
    $name = $_GET['fname'];
    if (empty($name)) {
        echo "Name is empty"."<br>";
    } else {
        echo $name."<br>";
    }
}
?>

</body>
</html>

