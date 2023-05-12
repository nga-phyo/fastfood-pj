
<?php 


 error_reporting(0);

 session_start();

 include_once '../user/connect.php';
 include_once '../user/header.php';
 include_once '../user/helper.php';



 if(!isset($_SESSION['auth']['admin'])){
    redirect('login.php');
}

    

?>


 
    <?php include './header.php' ?>
    <?php include './navbar.php' ?>

                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Ordered Items</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Order List</p>

                <div class="container">
                    <div class="row justify-content-center mt-5">
                        <div class="col-12">

                            <table class="table table-striped">

                                <tr>
                                    <th>No</th>
                                    <th>Customer</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Menu</th>
                                    <th>Order_Date</th>
                                    <th>Send_Date</th>
                                    <th colspan="2">Action</th>
                                </tr>

                                <?php

                                $sql = "SELECT * FROM orders";
                                $order = mysqli_query($conn, $sql);


                                while($ans = mysqli_fetch_assoc($order)){

                                $id = $ans['order_id'];
                                $show = "<tr>";
                                $show  .= "<td>".$ans['order_id']."</td>";
                                $show .= "<td>".$ans['coustomer_name']."</td>";
                                $show .= "<td>".$ans['coustomer_phone']."</td>";
                                $show .= "<td>".$ans['coustomer_address']."</td>";


                                $show .= "<td>";
                                $sql = "SELECT menu.*,order_detail.* FROM menu LEFT JOIN order_detail on menu.id = order_detail.menu_id where order_detail.order_id = '$id' ";
                                $result = mysqli_query($conn, $sql);


                                while($row = mysqli_fetch_assoc($result)){
                                $show.= '<ul>'.$row['name'].'<span style="color:red";>
                                ['.$row['qty'].']</li></ul>';

                                }

                                $show .= '</td>';
                                $show .= "<td>".$ans['order_date']."</td>";



                                if($ans['accept'] == 1){

                                $show .= "<td>".$ans['order_date']."</td>";
                                }
                                else{

                                $show .= "<td>'--/--/----'</td>";
                                }


                                if($ans['accept']){

                                $show .= '<td><a href="order_action.php?id='.$id.' &accept=0" class="btn btn-warning" name="order">Undo</a></td>';

                                }else{
                                $show .= '<td><a href="order_action.php?id='.$id.' &accept=1" class="btn btn-success" name="order">Add</a></td>';

                                }

                                $show .= '<td><a href="order_fail.php?id='.$id.'" onclick="return confirm(\'Are you sure?\')" class="btn btn-danger">Trash</a></td>';


                                $show .= '</tr>';
                                echo $show;

                                }


                                ?>

                            </table>

                        </div>
                    </div>
                </div>


                        </div>
                        <div class="card-body">
						<div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            </div>
                            <div class="row">
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           

     
        <?php include './footer.php' ?>
    