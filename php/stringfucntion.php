<?php
$e="creat infotech";
echo "string length=";
echo strlen($e)."<br>";
echo "string word count=";
echo str_word_count($e)."<br>";
echo "string Reverse =";
echo strrev($e)."<br>";
echo "string position=";
echo strpos($e, "info")."<br>";
echo "string repalce=";
echo str_replace("infotech", "it Solution", $e)."<br>";
?>
