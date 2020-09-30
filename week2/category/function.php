<?php 
	session_start();
        include('../database1.php');
            include('../confunction.php');



	$name = "";
	$order="";
	$status="";

	$errors=array();
	if (isset($_POST['save'])) {
		insert();
	}
    
	
function insert()
{
	global $db, $errors;

		$name =$_POST['name'];	
		$order=$_POST['order'];
		$status=$_POST['status'];
	

  		if (empty($name)) 
  		{ 
			array_push($errors,"name is required"); 
		}
		if (empty($order)) 
		{ 
			array_push($errors,"Order is required"); 
		}
		if (empty($status)) 
		{ 
			array_push($errors,"status is required"); 
		}

            $db = new Databases();

        $where = array(  
                 'v_name'     =>    $name,  
             );
                                
        $result=$db->select_where("*","tbl_category",$where);


   

                foreach ($result as $row) {
                    # code...

        if($row['v_name'] == $name){ 
                        array_push($errors,"Name alrady existing"); 

        }
    }
            
		
	 $uploadFolder = '../images/category/';
	 // $thumbFolder='thimg/';
    
        $imageTmpName = $_FILES['image_name']['tmp_name'];

        $imageName = $_FILES['image_name']['name'];

        $con =new confunction();
        $image=$con->isImage($imageName);

               


			if (count($errors) == 0)
			 {



$insert_data = array(  
           'v_name'     =>   mysqli_real_escape_string($db->con, $_POST['name']) ,  
           'v_image'     => mysqli_real_escape_string($db->con, $_FILES['image_name']['name']),
            'i_order'     => mysqli_real_escape_string($db->con, $_POST['order']),
            'b_status'     => mysqli_real_escape_string($db->con, $_POST['status']),
      );

            $query=$db->insert("tbl_category",$insert_data);




 $image=$con->uploadFile($imageTmpName,$uploadFolder,$imageName);
 var_dump($image);





					// $query=mysqli_query($db, "INSERT INTO tbl_category(v_name,v_image,i_order,b_status) VALUES ('$name','$imageName', '$order','$status')"); 
			
            //   if(!empty($_FILES['image_name']['name']))
            //   {
    
            //     //call thumbnail creation function and store thumbnail name
            //     $upload_img = cwUpload('image_name','images/','',TRUE,'thimg/','200','160');
    
            //     //full path of the thumbnail image
            //     $thumb_src = 'thimg/'.$upload_img;
    
            //     //set success and error messages
            //     $message = $upload_img?"<span style='color:#008000;'>Image thumbnail have been created successfully.</span>":"<span style='color:#F00000;'>Some error occurred, please try again.</span>";
    
            // }else
            // {
    
            //     //if form is not submitted, below variable should be blank
            //     $thumb_src = '';
            //     $message = '';
            //         }
                        $_SESSION['message'] = "data  saved"; 
					header('location: list.php');

				
			}
	else 

		{

	   			array_push($errors,"not image");

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

function cwUpload($field_name = '', $target_folder = '', $file_name = '', $thumb = FALSE, $thumb_folder = '', $thumb_width = '', $thumb_height = ''){

    //folder path setup
    $target_path = $target_folder;
    $thumb_path = $thumb_folder;
    
    //file name setup
    $filename_err = explode(".",$_FILES[$field_name]['name']);

    $filename_err_count = count($filename_err);
    $file_ext = $filename_err[$filename_err_count-1];

    if($file_name != ''){
        $fileName = $file_name.'.'.$file_ext;
    }else{
        $fileName = $_FILES[$field_name]['name'];
    }
         $uploadFolder = 'images/';

    //upload image path
    $upload_image = $target_path.basename($fileName);
    //upload image
            $con =new confunction();

     $image=$con->uploadFile($fileName,$uploadFolder,$upload_image);
     var_dump($image);
      
    if($image)
    {
        //thumbnail creation
    
        if($thumb == TRUE)
        {
            $thumbnail = $thumb_path.$fileName;
            list($width,$height) = getimagesize($upload_image);
            $thumb_create = imagecreatetruecolor($thumb_width,$thumb_height);
            switch($file_ext){
                case 'jpg':
                    $source = imagecreatefromjpeg($upload_image);
                    break;
                case 'jpeg':
                    $source = imagecreatefromjpeg($upload_image);
                    break;

                case 'png':
                    $source = imagecreatefrompng($upload_image);
                    break;
                   default:
                    $source = imagecreatefromjpeg($upload_image);
            }

            imagecopyresized($thumb_create,$source,0,0,0,0,$thumb_width,$thumb_height,$width,$height);
            switch($file_ext){
                case 'jpg' || 'jpeg':
                    imagejpeg($thumb_create,$thumbnail,100);
                    break;
                case 'png':
                    imagepng($thumb_create,$thumbnail,100);
                    break;

                default:
                    imagejpeg($thumb_create,$thumbnail,100);
            }

        }

        return $fileName;
    }
    else
    {
        return false;
    }
}

?>
