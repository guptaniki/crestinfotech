<?php 
include('function.php') ; 
  $db = new Databases();
  $where = array(  
           'id'     =>    $_GET["id"] ,  
      );
$select_query = $db->select_where("*","tbl_product", $where);

foreach ($select_query as $row) {
    # code...

    ?> 
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="header">
        <h2 align="center">Edit Product</h2>
    </div>
    
    <form method="post" action="update.php" enctype="multipart/form-data">
        
         <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>

<div class="form-row">
<div class="col-md-6 mb-10">

  <label for="validationCustom03">Category</label>
 <select class="form-control custom-select" multiple name="category[]" required style="width: 96.5%;border-radius: 5px;
">
 <?php 
$new_array=array();
$db1 = mysqli_connect('localhost', 'root', '', 'crestweek2');
$ret=mysqli_query($db1,"select * from tbl_product_category");
while( $row2 = mysqli_fetch_array( $ret))
{
$new_array[$row2['i_category_id']] = $row2['i_category_id']; 
}
$sql="select id,v_name from tbl_category";
$cat = $db->query($sql);
foreach ($cat as $row2) 
{
if (in_array($row2['id'], $new_array))
{
?>
 <option value="<?php echo $row2['id'];?>" selected><?php echo $row2['v_name'];?></option>
<?php
}
else
{
?>
<option value="<?php echo $row2['id'];?>"><?php echo $row2['v_name'];?></option>
<?php }

}?>
</select>
</div>
</div>
         <div class="input-group">
            <label>Name</label>
            <input type="text" name="product_name" value="<?php echo $row['v_product_name']; ?>">
            
        </div>
     
    <div class="input-group">
            <label>Product Code</label>
            <input type="text" name="product_code" value="<?php echo $row['i_product_code']?>">
        </div>
         <div class="input-group">
            <label>Price</label>
            <input type="number" name="price" value="<?php echo $row['i_price'] ?>">
        </div>
         <div class="input-group">
            <label>Sale price</label>
            <input type="number" name="sale_price" value="<?php echo  $row['i_sale_price']?>">
        </div>
         <div class="input-group">
            <label>Quantity</label>
            <input type="number" name="quantity" value="<?php echo $row['f_quantity'] ?>">
        </div>
        <div class="input-group">
            <label>Order</label>
            <input type="number" name="order" value="<?php echo $row['i_order']; ?>">
        </div>
        <div class="">
            <label>Status</label>
            <input type="radio" name="status" value="1"<?php echo $row['b_status']==1? 'checked':''
                # code...
             ?>>Active
            <input type="radio" name="status" value="0" <?php echo $row['b_status']==0? 'checked':''
                # code...
             ?>>InActive
        </div>
        <div class="input-group">
            <label>Main Image</label>
                                          <?php 

                                        $pro_id=$row['id'];
                                            $where = array(  
                                         'f_product_id'     =>    $pro_id,  
                                         'i_main'=>1,
                                            );
                                
                                         $image=$db->select_where("*","tbl_product_image",$where);

                                        foreach ($image as $row1) {
                                        
                                        $image=$row1['v_name'];
                                       
                                    echo '<input type="file" name="image_name" value="'.$row1['v_name'].'">';

                                        echo '<img src="../images/product/'.$image.'" width="360" height="150">';

                                        
                                        }
                                        echo"<br>";

                                       

                                      }
                                        ?>
        
        </div> 
         <div class="input-group">
            <label>Other Image </label>
            <?php
                                        $pro_id=$row['id'];

                                       $where = array(  
                                         'f_product_id'     =>    $pro_id,  
                                         'i_main'=>0,
                                            );
                                
                                         $image=$db->select_where("*","tbl_product_image",$where);
                                          foreach ($image as $row3) {
                                        
                                        $image=$row3['v_name'];
                                       

                                        echo '<img src="../images/product/'.$image.'" width="360" height="150">';

                                        
                                        }
                                        echo '<input type="file" name="other_image" value="'.$row3['v_name'].'">';
            ?>

        </div>
        <div class="input-group">
            <button class="btn" type="submit" name="Edit" >Edit</button>
        </div>
    </form>
  
</body>
<script type="text/javascript">
    
</script>
</html>