<?php 
	session_start();
	include('../confunction.php');
	include('../database1.php');

	// $db1 = mysqli_connect('localhost', 'root', '', 'crestweek2');

	$cat_id="";	
	$name = "";
	$product_code="";
	$price="";
	$sale_price="";
	$quantity="";
	$order="";
	$status="";

	$errors=array();
	if (isset($_POST['save'])) {
		insert();
	}
 
	
function insert()
{
	global  $errors;

		$cat_id=$_POST['category'];
		$name =$_POST['name'];	
		$product_code=$_POST['product_code'];
		$sale_price=$_POST['sale_price'];
		$price=$_POST['price'];
		$quantity=$_POST['quantity'];
		$order=$_POST['order'];
		$status=$_POST['status'];

		$ima=$_FILES['image_name']['name'];

  		if (empty($name)) 
  		{ 
			array_push($errors,"Name is required"); 
		}
		if (empty($product_code)) 
  		{ 
			array_push($errors,"Product Code is required"); 
		}
		if (empty($sale_price)) 
  		{ 
			array_push($errors,"Sale Price is required"); 
		}
		if (empty($price)) 
  		{ 
			array_push($errors,"Price is required"); 
		}
		if (empty($quantity)) 
  		{ 
			array_push($errors,"Quantity is required"); 
		}
		if (empty($order)) 
		{ 
			array_push($errors,"Order is required"); 
		}
		if (empty($status)) 
		{ 
			array_push($errors,"Status is required"); 
		}
		

			

if (count($errors) == 0)
			 {

			 	    $db = new Databases();

$insert_data = array(  
           // 'f_category_id'     =>   mysqli_real_escape_string($db->con, $_POST['category']) ,  
           'v_product_name'     => mysqli_real_escape_string($db->con, $_POST['name']),
           'i_product_code'     => mysqli_real_escape_string($db->con, $_POST['product_code']),
			'i_sale_price'     => mysqli_real_escape_string($db->con, $_POST['sale_price']),
			'i_price'     => mysqli_real_escape_string($db->con, $_POST['price']),
			'f_quantity'     => mysqli_real_escape_string($db->con, $_POST['quantity']),
			'i_order'     => mysqli_real_escape_string($db->con, $_POST['order']),
			'b_status'     => mysqli_real_escape_string($db->con, $_POST['status']),
      );
			

			$query=$db->insert("tbl_product",$insert_data);

		
            // Retrieving each selected option 
            var_dump($_POST['category']);
            foreach ($_POST['category']as $category)  
            {
            	  $insert_data = array(  
            
           'i_category_id'     =>   mysqli_real_escape_string($db->con, $category) ,  
           'i_product_id'     => mysqli_real_escape_string($db->con, $query),
			
      );
 $incat=$db->insert("tbl_product_category",$insert_data);

        } 

				
 
	 $uploadFolder = '../images/product/';
 		$mainimgtemp = $_FILES['main_image']['tmp_name'];

        $mainimg = $_FILES['main_image']['name'];

        $con =new confunction();
        $image=$con->isImage($mainimg);

                $image=$con->uploadFile($mainimgtemp,$uploadFolder,$mainimg);
       $insert_data = array(  
           'f_product_id'     =>   mysqli_real_escape_string($db->con, $query) ,  
           'v_name'     => mysqli_real_escape_string($db->con, $mainimg),
           'i_main'     => mysqli_real_escape_string($db->con,1),
			
      );
 $insimg=$db->insert("tbl_product_image",$insert_data);

 
    foreach ($ima as $key => $image1) 
    {
    	
        $imageTmpName = $_FILES['image_name']['tmp_name'][$key];


        $imageName = $_FILES['image_name']['name'][$key];
        $image=$con->isImage($imageName);
  
         $image=$con->uploadFile($imageTmpName,$uploadFolder,$imageName);

			 $insert_data = array(  
           'f_product_id'     =>   mysqli_real_escape_string($db->con, $query) ,  
           'v_name'     => mysqli_real_escape_string($db->con, $imageName),
           'i_main'     => mysqli_real_escape_string($db->con,0),
			
      );
					
					
$insimg=$db->insert("tbl_product_image",$insert_data);
				
    }
    header('location: list.php');

					$_SESSION['message'] = "data  saved"; 
				}

}

function display_error() {
		global $errors;

		if (count($errors) > 0){
			echo '<div class="error">';
				foreach ($errors as $error){
					echo $error .'<br>';
				}
			echo '</div>';
		}
	}
  function isLoggedIn()
    {
        if (isset($_SESSION['user'])) {
            return true;
        }else{
            return false;
        }
    }


?>
