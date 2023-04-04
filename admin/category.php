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

  $errors = [];

  if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $cat_name = $_POST['cat_name'];

        if(!$cat_name){
            $errors['cat_name'] = 'Category is required';
        }
       

        $sql = "INSERT INTO category(`cat_name`) Values('$cat_name')";
        $result = mysqli_query($conn, $sql);

        echo $result ? "<script>window.alert('success')</script>" : "<script>window.alert('fail')</script>";
  }

 

?>

<div class="container">
    <div class="row">

        <div class="col-4 mt-5 mx-5">

            <form action="" method="POST">
                <label for="">Add Category</label>
                <input type="text" name="cat_name" class="form-control <?php if(isset($errors['cat_name'])): ?>  is-invalid <?php endif ?> mt-2" placeholder="Enter Category Name"><br>
                        <?php if(isset($errors['cat_name'])): ?>
                            <div class="invalid-feedback"><?php echo $errors['cat_name'] ?></div>
                        <?php endif ?>

                        <button type="submit" class="btn btn-success">Submit</button>
            </form>

        </div>

        <div class="col-6 mt-5">

            <ol type="1">
                
                <?php 

                    $sql = "SELECT * FROM category";
                    $result = mysqli_query($conn, $sql);
                   while( $answer = mysqli_fetch_assoc($result)){

                        $cat_name = $answer['cat_name'];

                        echo "<li>$cat_name </li>";
                        }
                  
                ?>

               

            </ol>

        </div>
           
        
    </div>
</div>