<?php 
   


        error_reporting(0);

        session_start();


    include_once '../user/connect.php';
    include_once '../user/header.php';
    include_once '../user/helper.php';
    include_once './navbar.php';


    if(!isset($_SESSION['auth']['admin'])){

        redirect('login.php');
    }


    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $menu_name = $_POST['menu_name'];
        $cat_id = $_POST['cat_id'];
        $price = $_POST['price'];
        $qty = $_POST['qty'];
        $photo = $_FILES['photo']['name'];

        $sql = "INSERT INTO menu(`name`,`cat_id`,`photo`,`price`,`qty`) Values('$menu_name','$cat_id','$photo','$price','$qty')";
        $result = mysqli_query($conn, $sql);


        echo $result ? "<script>window.alert('Success')</script>" : "<script>window.alert('Fail')</script>";
    }

    
   
?>



<div class="container">
    <div class="row justify-content-center align-items-center mt-5">
        <div class="col-6">

           <form action="" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="">Menu Name</label>
                    <input type="text" name="menu_name" class="form-control">
                </div><br>


                <div class="form-group">
                    <label for="">Category</label>
                    <select name="cat_id" id="" class="form-select">
                       <?php 

                        $sql = "SELECT * FROM category";
                        $result = mysqli_query($conn, $sql);
                    
                        while($answer = mysqli_fetch_assoc($result)){

                            $cat_id = $answer['cat_id'];
                            $cat_name = $answer['cat_name'];

                            echo "<option value={$cat_id} selected>{$cat_name}</option>";
                         
                        }

                       ?>
                    </select>
                </div><br>


                <div class="form-group">
                    <label for="">Price</label>
                    <input type="text" name="price" class="form-control">
                </div><br>

                <div class="form-group">
                    <label for="">Photo</label>
                    <input type="file" name="photo" class="form-control">
                </div><br>


                <div class="form-group">
                    <label for="">Qty</label>
                    <input type="text" name="qty" class="form-control">
                </div><br>

                <button type="submit" class="btn btn-success" >Add Menu</button>

           </form>

        </div>
    </div>
</div>


