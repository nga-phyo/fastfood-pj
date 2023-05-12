

<?php

    include_once './file.php';

 

        $id = $_SESSION['auth']['id'];

        $sql = "SELECT * FROM users where `id` = '$id'";
        $result = mysqli_query($conn, $sql);

        while($user = mysqli_fetch_assoc($result)){

            $name = $user['name'];
            $email = $user['email'];
            $phone = $user['phone'];
            
        }

?>


<?php

    
    

    $errors = [];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $id = $_SESSION['auth']['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $card = $_POST['card'];
        $address = $_POST['address'];

      

        if(!$name){
            $errors['name'] = "Name is required";

        }else if(strlen($name) < 6){
            $errors['name'] = "Name must be long ";
        }

        if(!$email){
            $errors['email'] = "Email is required";
        }

        if(!$phone){
            $errors['phone'] = "Phone is required";
        }

        if(!$address){
            $errors['address'] = "Address is required";
        }

     
       

     if(count($errors) == 0){


        $sql = "INSERT INTO orders(`coustomer_id`,`coustomer_name`,`coustomer_email`,`coustomer_phone`,`coustomer_address`) Values('$id','$name','$email','$phone','$address')";
       
        
        $result = mysqli_query($conn, $sql);
        
        echo $result ? "<script>window.alert('success')</script>" :  "<script>window.alert('fail')</script>";
     }

     $order_id = mysqli_insert_id($conn);

    

     foreach($_SESSION['cart'] as $id => $qty){


         $sql = "SELECT * FROM menu where `id` = '$id'";
         $result = mysqli_query($conn, $sql);

         while($menu = mysqli_fetch_assoc($result)){

             $price = $menu['price'];
           
         
         }
 
         $amount = $price * $qty;

         $sql = "INSERT INTO order_detail(`order_id`,`menu_id`,`qty`,`amount`) Values('$order_id','$id','$qty','$amount')";

         $result = mysqli_query($conn, $sql);

         
        }

        $_SESSION['order_id'] = $order_id;
        unset($_SESSION['cart']);
        redirect('success.php');
     

      }

    
       

    ?>





<div class="container form-color p-4 my-3 border-1 shadow-sm bg-light shadow-lg login-bg w-50">
    <div class="row justify-content-center align-items-center my-5 ">
        <div class="col-7">
            
            <form action="" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    
                    <input type="text" name="name" class="form-control <?php if(isset($errors['name'])): ?>  is-invalid <?php endif ?>" placeholder="Name" value="<?php echo $name ?>">
                        <?php if(isset($errors['name'])): ?>
                            <div class="invalid-feedback"><?php echo $errors['name'] ?></div>
                        <?php endif ?>
                </div><br>

                <div class="form-group">
                    
                    <input type="email" name="email" class="form-control <?php if(isset($errors['email'])): ?>  is-invalid <?php endif ?>" placeholder="Email" value="<?php echo $email ?>">
                        <?php if(isset($errors['email'])): ?>
                            <div class="invalid-feedback"><?php echo $errors['email'] ?></div>
                        <?php endif ?>
                </div><br>


                <div class="form-group">
                   
                    <input type="text" name="phone" class="form-control <?php if(isset($errors['phone'])): ?>  is-invalid <?php endif ?>" placeholder="Phone" value="<?php echo $phone ?>">
                        <?php if(isset($errors['phone'])): ?>
                            <div class="invalid-feedback"><?php echo $errors['phone'] ?></div>
                        <?php endif ?>
                </div><br>

                <div class="form-group">
                    
                    <input type="text" name="address" class="form-control <?php if(isset($errors['address'])): ?>  is-invalid <?php endif ?>" placeholder="Address">
                        <?php if(isset($errors['address'])): ?>
                            <div class="invalid-feedback"><?php echo $errors['address'] ?></div>
                        <?php endif ?>
                </div><br>

                <div class="form-group">
                    
                    <select name="card" id="" class="form-control">
                        <option value="credit">--Credit card--</option>
                        <option value="gold">--Gold card--</option>
                        <option value="dimond">--Dimond card--</option>
                    </select>
                </div><br>

                <div class="">
                <button type="submit" class="btn btn-primary w-100">Register</button>
                </div>


            </form>


        </div>
    </div>
</div>



<?php 

       
    //  $order_id = mysqli_insert_id($conn);

    //  foreach($_SESSION['cart'] as $id => $qty){


    //      $sql = "SELECT * FROM menu where `id` = '$id'";
    //      $result = mysqli_query($conn, $sql);

    //      while($menu = mysqli_fetch_assoc($result)){

    //          $price = $menu['price'];
         
    //      }

         

    //      $amount = $price * $qty;
    //      $sql = "INSERT INTO order_detail(`order_id','menu_id','qty','amount') Values('$order_id','$id','$qty','$amount')";

    //      $result = mysqli_query($conn, $sql);

         
    //  }

    //  $_SESSION['order_id'] = $order_id;
    //  unset($_SESSION['cart']);



?>