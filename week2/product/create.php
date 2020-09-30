<?php include('function.php');
// include('../database1.php');


if (!isLoggedIn()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: ../login.php');
    } ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="header">
        <h2 align="center">Create</h2>
    </div>
    <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success" >
                <h3>
                    <?php 
                        echo $_SESSION['success']; 
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
           <?php  if (isset($_SESSION['user'])) : ?>
    
    <form method="post" action="create.php" enctype="multipart/form-data">

        <?php echo display_error(); ?>
    <div class="input-group">
            <label>Category name</label>
<select class="form-control custom-select" multiple name="category[]" required style="width: 96.5%;border-radius: 5px;
">
<option value="">Select category</option>
<?php
    $db = new Databases();

$ret=$db->select('tbl_category');
foreach ($ret as $row) 
   
{?>
<option value="<?php echo $row['id'];?>"><?php echo $row['v_name'];?></option>
<?php } ?>
</select>            
        </div>
         <div class="input-group">
            <label>Name</label>
            <input type="text" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>">
            
        </div>
         <div class="input-group">
            <label>Main image</label>
            <input type="file" name="main_image"  accept="image/*" multiple required >
        </div>
        <div class="input-group">
            <label>Ohter image</label>
            <input type="file" name="image_name[]"  accept="image/*" multiple required >
        </div>
      
        </div>
        <div class="input-group">
            <label>Product Code</label>
            <input type="text" name="product_code" value="<?php echo isset($_POST['product_code']) ? $_POST['product_code'] : ''; ?>">
        </div>
         <div class="input-group">
            <label>Price</label>
            <input type="number" name="price" value="<?php echo isset($_POST['price']) ? $_POST['price'] : ''; ?>">
        </div>
         <div class="input-group">
            <label>Sale price</label>
            <input type="number" name="sale_price" value="<?php echo isset($_POST['sale_price']) ? $_POST['sale_price'] : ''; ?>">
        </div>
         <div class="input-group">
            <label>Quantity</label>
            <input type="number" name="quantity" value="<?php echo isset($_POST['quantity']) ? $_POST['quantity'] : ''; ?>">
        </div>

         <div class="input-group">
            <label>Order</label>
            <input type="number" name="order" value="<?php echo isset($_POST['order']) ? $_POST['order'] : ''; ?>">
        </div>
        <div class="">
            <label>Status</label>
            <input type="radio" name="status" value="1" <?php echo (isset($_POST['status']) && $_POST['status'] == '1') ?  'checked':'';      ?>>Active
            <input type="radio" name="status" value="0" <?php echo (isset($_POST['status']) && $_POST['status'] == '0') ?  'checked':'';      ?>>InActive


        </div>
        <div class="input-group">
            <button class="btn" type="submit" name="save" >Save</button>
        </div>
    </form>
</body>
                    <?php endif ?>

<script type="text/javascript">
    
</script>
</html>