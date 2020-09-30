<?php
	include('../confunction.php');

include('../database1.php');
    $db = new Databases();
    	$db1 = mysqli_connect('localhost', 'root', '', 'crestweek2');


if(count($_POST)>0) {


		$id=$_POST['id'];

		$cat_id=$_POST['category'];
		$name =$_POST['product_name'];	
		$product_code=$_POST['product_code'];
		$sale_price=$_POST['sale_price'];
		$price=$_POST['price'];
		$quantity=$_POST['quantity'];
		$order=$_POST['order'];
		$status=$_POST['status'];
	  $file_name = $_FILES["image_name"]["name"];
    $file_tmp = $_FILES["image_name"]["tmp_name"];
    $imag_name = $_FILES["other_image"]["name"];
    $imag_tmp = $_FILES["other_image"]["tmp_name"];

	if($name!=''&&$product_code!=''&&$sale_price!=''&&$price!=''&&$quantity!=''&&$order!=''&&$status!='')
	{


		$update_data = array(  
           'v_product_name'     => mysqli_real_escape_string($db->con, $_POST['product_name']),
           'i_product_code'     => mysqli_real_escape_string($db->con, $_POST['product_code']),
			     'i_sale_price'     => mysqli_real_escape_string($db->con, $_POST['sale_price']),
			     'i_price'     => mysqli_real_escape_string($db->con, $_POST['price']),
			     'f_quantity'     => mysqli_real_escape_string($db->con, $_POST['quantity']),
			     'i_order'     => mysqli_real_escape_string($db->con, $_POST['order']),
			     'b_status'     => mysqli_real_escape_string($db->con, $_POST['status']),
		
      );  

      $where_condition = array(  
           'id'     =>     $_POST['id']
      );
      		$query =$db->update("tbl_product", $update_data, $where_condition);
      	
     }

     if($category!='')
     {
$sql = "DELETE FROM tbl_product_category  WHERE i_product_id='" .$_POST['id']  . "'";
				$del=$db->delete($sql);

       foreach ($_POST['category'] as $category)  
            {
                	  
        $insert_data = array(  
            
           'i_category_id'     =>   mysqli_real_escape_string($db->con, $category) ,  
           'i_product_id'     => mysqli_real_escape_string($db->con, $_POST['id']),
			
      );
 $incat=$db->insert("tbl_product_category",$insert_data);
 

        } 
      }
     
if ($file_name!='') {

   $con =new confunction();
        $ima=$con->isImage($file_name);

$filename = basename($file_name,$ima);


$newFileName = $filename.time().".".$ima;
 $where = array(  
                      'f_product_id'     =>    $id,  
                        'i_main'=>1,
                   );
                  
     $image=$db->select_where("*","tbl_product_image",$where);
      foreach ($image as $row) 
      {
  
          $img_id=$row['id'];  
	        $imag=$row ['v_name'];
      }

$sql ="delete from tbl_product_image where id = '" . $img_id ."'";
$del=$db->delete($sql);
    $old="../images/product/".$imag; 

    if(unlink($old))                             
    {
		echo"file delete";
	}	
	else 
	{
	echo"file is not delete";
	}
	 $insert_data = array(  
           'f_product_id'     =>   mysqli_real_escape_string($db->con,$id) ,  
           'v_name'     => mysqli_real_escape_string($db->con,$newFileName),
           'i_main'     => mysqli_real_escape_string($db->con,1),
			
      );
 $insimg=$db->insert("tbl_product_image",$insert_data);
	 $uploadFolder = '../images/product/';

         $image=$con->uploadFile($file_tmp,$uploadFolder,$newFileName);

}
 		if ($imag_name!='') {

   $con =new confunction();
        $ima=$con->isImage($imag_name);

$filename = basename($imag_name,$ima);


$newFileName = $filename.time().".".$ima;
 $where = array(  
                      'f_product_id'     =>    $id,  
                        'i_main'=>0,
                   );
                  
     $image=$db->select_where("*","tbl_product_image",$where);

foreach ($image as $row)
 {
    $img_id=$row['id'];  
    $imag=$row ['v_name'];
}

$sql ="delete from tbl_product_image where id = '" . $img_id ."'";
$del=$db->delete($sql);

    $old="../images/product/".$imag; 

    if(unlink($old))                             
    {
    echo"file delete";
  } 
  else 
  {
  echo"file is not delete";
  }
   $insert_data = array(  
           'f_product_id'     =>   mysqli_real_escape_string($db->con,$id) ,  
           'v_name'     => mysqli_real_escape_string($db->con,$newFileName),
           'i_main'     => mysqli_real_escape_string($db->con,0),
      
      );
 $insimg=$db->insert("tbl_product_image",$insert_data);
   $uploadFolder = '../images/product/';

         $image=$con->uploadFile($imag_tmp,$uploadFolder,$newFileName);




}

	$message = "Record Modified Successfully";
                header("location:list.php");
}
?>