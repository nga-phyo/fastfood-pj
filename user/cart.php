
<?php 

    include_once './file.php';

    if(!isset($_SESSION['auth'])){

        redirect('register.php');
        die();
    }


   


?>

<div class="container">
    <div class="row mt-5">
        <div class="col-12">
            

        <?php if(!empty($_SESSION['cart'])): ?>

            <table class="table table-striped">
               
                <tr>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Unit Price</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
 
                
                <?php 
                    $total = 0;
                
                    foreach($_SESSION['cart'] as $id => $qty):
                    
    
                    $sql = "SELECT * FROM menu where `id` = '$id'";
                    $result = mysqli_query($conn, $sql);
                    $answer = mysqli_fetch_assoc($result);

                    $total += $answer['price']*$qty;
                    
                    
                 ?>

                 <tr>
                    <td><?php echo $answer['name'] ?></td>
                    <td>

                    <samp>
                    <a href="increase_qty.php?id=<?php echo $answer['id'] ?>"><i class="fa-solid fa-plus"></i></a>
                    <?php echo $qty ?>
                    <a href="decrease_qty.php?id=<?php echo $answer['id'] ?>"><i class="fa-solid fa-minus"></i></a>
                    </samp>
                
                    </td>

                

                    <td><?php echo $answer['price']?></td>
                    <td><?php  echo $answer['price']*$qty ?></td>
                    <td><img src="../foodimage/<?php echo $answer['photo'] ?>" width="100" height="80"></td>
                    <td><a href="delete.php?id=<?php echo $answer['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure! remove this item')"><i class="fa-solid fa-trash"></i> Trash</a></td>
                   
                 </tr>

                <?php endforeach ?>


                <tr>
                    <td colspan="5" align="right"><b><i>Total</i></b></td>
                    <td><?php echo $total ?></td>
                 </tr>


               
            </table>
            
            <a href="order_submit.php" class="btn btn-success">Order_Submit</a>
            <a href="clear.php" class="btn btn-danger float-end"> Cancle</a>

            <?php elseif(empty($_SESSION['cart'])): ?>

                   <div class="row justify-content-center align-items-center mt-5">
                    <div class="col-6">
                        <div class="card shadow-lg">
                            <div class="card-header" style="text-align:center;color:brown"><h3>You Can Order Now</h3></div>
                            <div class="card-body">
                                <a href="./home.php" class="btn btn-success float-end">Order Now</a>
                            </div>
                        </div>
            
                    </div>
                   </div>
        <?php endif ?>
       
        </div>
    </div>
</div>