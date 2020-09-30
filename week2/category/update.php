<?php
 include('../database1.php');
            include('../confunction.php');
if(count($_POST)>0) {

// print_r($_FILES);
// exit();
	            $db = new Databases();

    $id=$_POST['id'];
	$name =$_POST['name'];
	$order=$_POST['order'];
	$status=$_POST['status'];

                  
     $image4=$db->select("tbl_category");
foreach ($image4 as $row) {
    $img_id=$row['id'];  

	$image5=$row ['v_image'];


	
}
$old="../images/category/".$image5; 

    if(unlink($old))                             
    {
		echo"file delete";
	}	
	else 
	{
	echo"file is not delete";
	}
	$image1= $_FILES['image']['name'];
	// var_dump($image);
	// exit();
$image_temp=$_FILES['image']['tmp_name'];

	if($name!=''&& $order!=''&& $status!='')
	{
		// echo 'here';
				$update_data = array(  
           'v_name'     =>   mysqli_real_escape_string($db->con, $_POST['name']) , 
			'i_order'     => mysqli_real_escape_string($db->con, $_POST['order']),
			'b_status'     => mysqli_real_escape_string($db->con, $_POST['status']),
			

      );  

      $where_condition = array(  
           'id'     =>     $_POST['id']
      );
      		$query =$db->update("tbl_category", $update_data, $where_condition);



	}
	




	   $con =new confunction();
        $image2=$con->isImage($image1);
        var_dump($image1);
	 	 $uploadFolder = '../images/category/';

 
if($image_temp != '')
{
	 $image3=$con->uploadFile($image_temp,$uploadFolder,$image1);


$update_data = array(  
           'v_image'     =>   mysqli_real_escape_string($db->con, $_FILES['image']['name']) , 
			
			

      );  

      $where_condition = array(  
           'id'     =>     $_POST['id']
      );
      		$query =$db->update("tbl_category", $update_data, $where_condition);
      		
     	
     		
}

	$message = "Record Modified Successfully";
                header("location:list.php");
}
?>