
<?php 

        include_once './file.php';

        

     $order_id = $_SESSION['order_id'];



        $sql = "SELECT * FROM orders where `order_id` = '$order_id' ";
        $order = mysqli_query($conn, $sql);
        $ans = mysqli_fetch_assoc($order);
        

       

        

?>  




<div class="container">
    <div class="row mt-4">

        <div class="col-12">

            <h2 class="text-primary">Dear Coustomer, <?php echo $ans['coustomer_name'] ?> </h2>
            <p class="text-success lead">Please! Check Your Infromation And Order Details </p>
            <hr>

        </div>


        <div class="col-4">
           
                    <h3 style="color:brown">Coustomer's Infromation</h3><hr>

                    <p>Coustomer Name <i class="fa-solid fa-user"></i> <?php echo $ans['coustomer_name'] ?> </p>
                    <p>Coustomer Email <i class="fa-solid fa-envelope"></i> <?php echo $ans['coustomer_email'] ?> </p>
                    <p>Coustomer Phone <i class="fa-solid fa-phone-volume"></i> <?php echo $ans['coustomer_phone'] ?> </p>
                    <p>Coustomer Address <i class="fa-solid fa-address-card"></i> <?php echo $ans['coustomer_address'] ?> </p>

        </div>

        <div class="col-8">

                <table class="table table-striped">
            
                         <h4 style="text-align:center;color:darkgreen" >Order Infromation</h4>
                

                    <tr>
                        <th>Menu_Name</th>
                        <th>Menu_Image</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Unit_Price</th>
                    </tr>

                    <?php 

                        $total = 0;
                     
                        $sql = "SELECT menu.*,order_detail.* FROM menu LEFT JOIN order_detail on menu.id = order_detail.menu_id where order_detail.order_id = '$order_id' ";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($result)){

                            $menu_name = $row['name'];
                            $menu_image = $row['photo'];
                            $price = $row['price'];
                            $qty = $row['qty'];
                            $unit_price = $price * $qty;
                            $total += $unit_price;

                            echo "<tr>
                                    <td>{$menu_name}<br></td>
                                    <td><img src='../foodimage/{$menu_image}' alt='' width='100' height='80'></td>
                                    <td>{$price} <br></td>
                                    <td>{$qty} <br></td>
                                    <td>{$unit_price}</td>

                                    </tr>";

                        }

                        ?>

                                    <tr>    
                                        <td colspan="4" align="right">Total Amount is</td>
                                        <td><?php echo $total; ?></td>
                                    </tr>

               </table>
        </div>



    </div>
</div>