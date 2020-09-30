<?php
// is_integer
$a=10;
echo "interger=",$a."<br>";
var_dump($a);
// string
$b="abd";
echo "string=",$b."<br>";
var_dump($b);
// float
$c=10.3;
echo "float=",$c."<br>";
var_dump($c);	
// array
$d = array("abs","mng","asp");
var_dump($d);

// object

class company  
{
	public $name="creat infotech";
	function info()
	{
		return $this->name;
	}
}

$company=new company();

echo "company name=",$company->name;
var_dump($company);

// null

$e="hello crest infotech";
$e=null;
var_dump($e);
?>