<?php include('function.php');

if (!isLoggedIn()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: ../login.php');
    }

    $db = new Databases();
    $wh="";
if((isset($_POST['value'])&&$_POST['value'] == '0') || (isset($_POST['value'])&&$_POST['value'] == '1'))
{

 $valueTostatus = $_POST['value'];
    $wh .= " AND c.b_status = $valueTostatus";


}

if(isset($_POST['valueToname'])&&$_POST['valueToname'])
{

    $valueToname = $_POST['valueToname'];
    $wh .= " AND v_name = '$valueToname'";

}

$q="SELECT c.*, COUNT(p.id) AS NumberProducts FROM tbl_category as c
LEFT JOIN  tbl_product as p
ON p.f_category_id=c.id WHERE 1 ".$wh."
GROUP BY c.id";

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
    </div>
    <a href="http://localhost/crest%20infotech/week2/category/create.php" type="submit" class="btn" align="right"> Create Category</a>
          <form action="" method="post" style="width:100%;">
            <select name="value" style="width: 10.5%;height: 30px;">
                    <option name="status" value="">all</option>
                    <option name="status" value="1">Active</option>
                    <option name="status" value="0">Inactive</option>
                </select>
            <input type="text" name="valueToname" placeholder="Value To name"><br><br>

            <input type="submit" name="search" value="Filter"><br><br>
   <?php  if (isset($_SESSION['user'])) : ?>

<?php
                    

                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>category Image</th>";
                                        echo "<th>order</th>";
                                        echo "<th>Add Date</th>";
                                        echo "<th>Modify Date</th>";
                                        echo "<th>status</th>";
                                        echo "<th>No of Product</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                foreach ($list as $row) 
                                {
                                    echo "<tr>";
                                        echo "<td>" .$row['id'] . "</td>";
                                        echo "<td>" . $row['v_name'] . "</td>";
                                        echo '<td><img src="../images/category/'.$row['v_image'].'" height="200" width="200" "  /></td>';
                                        echo "<td>" . $row['i_order'] . "</td>";
                                        echo "<td>" . date('d-m-Y h:i:s', strtotime($row['t_add_date'])). "</td>";
                                        echo "<td>" . date('d-m-Y h:i:s', strtotime($row['t_modify_date'])). "</td>";
                                        if($row['b_status'] == '1')
                                        {
                                        echo "<td> Active </td>";

                                        }
                                        else
                                        {
                                        echo "<td> InActive </td>";

                                        }
                                      
                                        echo"<td>";
                                           
                                          echo ($row['NumberProducts']);
                                        
                                        echo"</td>";
                                        echo"<td>";
                                            
                                            echo "<a href='edit.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip' name='del' class=remove><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                         
                    ?>
</table>
    
                <?php endif ?>
</body>
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