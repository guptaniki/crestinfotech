<?php



include('../database1.php');
  $db = new Databases();
$sql = "DELETE FROM tbl_category WHERE id='" . $_GET["id"] . "'";
$del=$db->delete($sql);

                header("location: list.php");
?>