
<?php 

    include_once './file.php';


    if(isset($_SESSION['auth'])):
        $id = $_SESSION['auth']['id'];
        $sql = "SELECT * FROM users where `id` = '$id'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);  
        
    endif;

    
?>

<a class="nav-link active" aria-current="page" href="userprofile.php"><i class="fa-solid fa-user"></i><?php  echo $user['name'] ?></a>
<a class="nav-link active" aria-current="page" href="cart.php"><i class="fa-solid fa-cart-shopping"></i>Cart</a>


<?php 
   
   
   foreach($_SESSION['cart'] as $id => $qty):
                    
    
    $sql = "SELECT * FROM menu where `id` = '$id'";
    $result = mysqli_query($conn, $sql);
    $answer = mysqli_fetch_assoc($result);

    $total += $answer['price']*$qty;

  
    
    
 ?>


   <?php echo $answer['name'] ?>


  <?php endforeach ?>

