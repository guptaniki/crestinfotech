<?php include('function.php');
if (!isLoggedIn()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: ../login.php');
    }
// include('../database1.php');
 $db = new Databases();

   $wh="";

 if((isset($_POST['value'])&&$_POST['value'] == '0') || (isset($_POST['value'])&&$_POST['value'] == '1'))
{

    $valueTostatus = $_POST['value'];
    $wh .= " AND b_status = $valueTostatus";

}


if(isset($_POST['valueToname'])&&$_POST['valueToname'])
{

    $valueToname = $_POST['valueToname'];
    $wh .= " AND v_product_name = '$valueToname'";

}
if((isset($_POST['min'])&&$_POST['min']) && (isset($_POST['max'])&&$_POST['max'])){
    $min =$_POST['min'];
    $max =$_POST['max'];

    $wh .= " AND i_price  BETWEEN '$min' AND '$max'";
}
if((isset($_POST['minqty'])&&$_POST['minqty']) && (isset($_POST['maxqty'])&&$_POST['maxqty'])){
    $min =$_POST['minqty'];
    $max =$_POST['maxqty'];

    $wh .= " AND i_price  BETWEEN '$min' AND '$max'";
}
if(isset($_POST['pordering']) && !empty($_POST['pordering']))
{
    if ($_POST['pordering'] == 'priceorderasc') $wh .= " ORDER BY  i_price , i_sale_price  ASC";
    if ($_POST['pordering'] == 'priceorderdesc') $wh .= " ORDER BY i_price,i_sale_price DESC";

}
if(isset($_POST['qordering']) && !empty($_POST['qordering']))
{
   if ($_POST['qordering'] == 'qtyorderasc') $wh .= " ORDER BY f_quantity  ASC";
   if ($_POST['qordering'] == 'qtyorderdesc') $wh .= " ORDER BY  f_quantity DESC";
   
}


 $q="SELECT p.* FROM tbl_product as p WHERE 1 ".$wh."";
   $list=$db->query($q);
  
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="header">
        <h2 align="center">Index</h2>
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
    <a href="http://localhost/crest%20infotech/week2/product/create.php" type="submit" class="btn" align="right"> Create Product</a>
     <form action="" method="post" style="width:100%;">
            <table style="width: 100%">
                <td>
            <select name="value" style="width: 10.5%;height: 30px;">
                    <option name="status" value="">all</option>
                    <option name="status" value="1">Active</option>
                    <option name="status" value="0">Inactive</option>
                </select>
            <input type="text" name="valueToname" placeholder="Value To name">

            <input type="submit" name="search" value="Filter"><br><br>
            <input type="text" name="min" placeholder="minmun Price">
            <input type="text" name="max" placeholder="maxmum Price">
            <input type="submit" name="Filter" value="Price Filter"><br><br>
            <input type="text" name="minqty" placeholder="minmun Quantity">
            <input type="text" name="maxqty" placeholder="maxmum Quantity">
            <input type="submit" name="Filter" value="Quantity Filter "><br><br>
        </td>
            <td>
            Sort By price :
            <input type="radio" name="pordering" value="priceorderasc">Lowest price
            <input type="radio" name="pordering" value="priceorderdesc">Higest price

            <input name="priceordring " type="submit" value="price order" class="moreinfobutton" /><br><br>
             Sort By Quantity :
            <input type="radio" name="qordering" value="qtyorderasc">Lowest Quantity
            <input type="radio" name="qordering" value="qtyorderdesc">Higest Quantity

            <input name="qtyordring " type="submit" value="Quantity order" class="moreinfobutton" />
        </td>
            </table>
            </form>
             <?php  if (isset($_SESSION['user'])) : ?>
<?php

                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>category id</th>";
                                        echo "<th>Name</th>";    
                                        echo "<th>prodcut Code</th>";
                                        echo "<th>Price</th>";
                                        echo "<th>Sale Price</th>";
                                        echo "<th>Quantity</th>";
                                        echo "<th>order</th>";
                                        echo "<th>Add Date</th>";
                                        echo "<th>Modify Date</th>";
                                        echo "<th>status</th>";
                                        echo "<th>Product Image</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                // var_dump($list);
                                foreach ($list as $row) {
                                    # code...
                                
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        $pro_id=$row['id'];
                                        
                                         $where_condition = array(  
                                                'i_product_id'     =>    $pro_id,
                                                               );
                                          $db = new Databases();
                                        $list =$db->select_where('i_category_id','tbl_product_category',$where_condition);
                                        echo "<td>" ;
                                        foreach ($list as $row1) {
                                    
                                        echo $row1['i_category_id'] .",";
                                      
                                        }
                                        echo "</td>";
                                        echo "<td>" . $row['v_product_name'] . "</td>";
                                        echo "<td>" . $row['i_product_code'] . "</td>";
                                        echo "<td>" . $row['i_price'] . "</td>";
                                        echo "<td>" . $row['i_sale_price'] . "</td>";
                                        echo "<td>" . $row['f_quantity'] . "</td>";
                                        echo "<td>" . $row['i_order'] . "</td>";
                                        echo "<td>" . date('d-m-Y h:i:s', strtotime($row['t_added_date'])). "</td>";
                                        echo "<td>" . date('d-m-Y h:i:s', strtotime($row['t_modified_date'])). "</td>";
                                        if($row['b_status'] == '1'){

                                        echo "<td> Active </td>";

                                        }
                                        else
                                        {
                                        echo "<td> InActive </td>";

                                        }

                                        echo "<td>";
                                        $pro_id=$row['id'];
                                        
                                         $where_condition = array(  
                                                'f_product_id'     =>    $pro_id,
                                                    'i_main'       =>1           );
                                          $db = new Databases();
                                        $list =$db->select_where('*','tbl_product_image',$where_condition);
                                          


                                        foreach ($list as $row2) {
                                            # code...
                                        
                                        
                                        $image=$row2 ['v_name'];
                                      
                                        echo '<img src="../images/product/'.$image.'" width="360" height="150">';

                                        }
                                        echo "</td>";
                                        echo "<td>";
                                            echo "<a href='edit.php?id=". $pro_id ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip' name='del' class=remove><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                     
                    ?>

    
</body>

                <?php endif ?>

<script type="text/javascript">

    $(".remove").click(function(){

        var id = $(this).parents("tr").attr("id");


        if(confirm('Are you sure to remove this record ?'))

        {

            $.ajax({

               url: '/delete.php',

               type: 'GET',

               data: {id: id},

               error: function() {

                  alert('Something is wrong');

               },

               success: function(data) {

                    $("#"+id).remove();

                    alert("Record removed successfully");  

               }

            });

        }

    });


</script>
</html>