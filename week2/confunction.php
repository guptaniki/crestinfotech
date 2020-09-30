<?php
/**
 * 
 */
class confunction
{
	
	// function __construct(argument)
	// {
	// 	# code...
	// }



	function isImage($filname){

   $supported_image = array('jpg','jpeg','png');
    $text = pathinfo($filname, PATHINFO_EXTENSION);

	if(in_array($text, $supported_image)) 
		return $text;
	else 
	return false;
}




function uploadFile( $tempPath,$path, $filname){

	if(move_uploaded_file($tempPath, $path.$filname)){
		return $filname;
	}
	else
	{
	return '';
}
}
function uploadFilethum( $tempPath,$filname){

	if(move_uploaded_file($tempPath,$filname)){
		return $filname;
	}
	else
	{
	return '';
}
}



}



?>