<?php 
include('function.php') ; 
  $db = new Databases();
  $where = array(  
           'id'     =>    $_GET["id"] ,  
      );
$select_query = $db->select_where("*","tbl_category", $where);
foreach ($select_query as $row) {

    ?> 
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="header">
        <h2 align="center">Edit Category</h2>
    </div>
    
    <form method="post" action="update.php" enctype="multipart/form-data">
        
         <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>


         <div class="input-group">
            <label>Name</label>
            <input type="text" name="name" value="<?php echo $row['v_name']; ?>">
            
        </div>
     <div class="input-group">
            <label>image</label>
            <input type="file" name="image" value="<?php echo $row['v_image'] ?>"><img src="../images/category/<?php echo $row['v_image']; ?>" width="150px" height="100px">
        
        </div> 
    
        </div>
        <div class="input-group">
            <label>Order</label>
            <input type="number" name="order" value="<?php echo $row['i_order']; ?>">
        </div>
        <div class="">
            <label>Status</label>
            <input type="radio" name="status" value="1" <?php echo $row['b_status']==1? 'checked':''
                # code...
             ?>>Active
            <input type="radio" name="status" value="0"  <?php echo $row['b_status']==0? 'checked':''?>>InActive
        </div>
        <div class="input-group">
            <button class="btn" type="submit" name="Edit" >Edit</button>
        </div>
    </form>
<?php }?>
</body>
<script type="text/javascript">
    
</script>
</html>