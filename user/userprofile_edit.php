
<?php 
   
   include_once './file.php';

   
//  $id = $_SESSION['auth']['id'];

//  $sql = "SELECT * FROM users where `id` = '$id' ";
//  $result = mysqli_query($conn, $sql);

//  $user = mysqli_fetch_assoc($result);



?>

<?php 

    $errors = [];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $id = $_SESSION['auth']['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];

        if(!$name){
            $errors['name'] = "Name is required";
        }

        if(!$email){
            $errors['email'] = "Email is required";
        }

        if(!$password){
            $errors['password'] = "Password is required";
        }

        if(!$phone){
            $errors['phone'] = "Phone is required";
        }

       if(count($errors) == 0){

        $sql = "UPDATE users set `name` = '$name', `email` = '$email', `password` = '$password', `phone` = '$phone' where `id` = '$id'";
        $answer = mysqli_query($conn, $sql);
      

        redirect('userprofile.php');
     
       }
            

    }
?>


<div class="containter">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-4">

            <div class="">
                <div class="r">
                  <h3 class="text-center">  Edit About User</h3>
                </div>
                <div class="card-body">
                    
                    <form action="" method="POST">

                        <div class="form-group">
                            
                            <input type="text" name="name" class="form-control rounded-pill <?php if(isset($errors['name'])): ?>  is-invalid <?php endif ?>" placeholder="Name" value="">
                                <?php if(isset($errors['name'])): ?>
                                    <div class="invalid-feedback"><?php echo $errors['name'] ?></div>
                                <?php endif ?>
                        </div><br>

                        <div class="form-group">
                            
                            <input type="email" name="email" class="form-control rounded-pill <?php if(isset($errors['email'])): ?>  is-invalid <?php endif ?>" placeholder="Email" value="">
                                <?php if(isset($errors['email'])): ?>
                                    <div class="invalid-feedback"><?php echo $errors['email'] ?></div>
                                <?php endif ?>
                        </div><br>

                        <div class="form-group">
                            
                            <input type="password" name="password" class="form-control rounded-pill <?php if(isset($errors['password'])): ?>  is-invalid <?php endif ?>" placeholder=" Passowrd" value="">
                                <?php if(isset($errors['password'])): ?>
                                    <div class="invalid-feedback"><?php echo $errors['password'] ?></div>
                                <?php endif ?>
                        </div><br>

                        <div class="form-group">
                            
                            <input type="text" name="phone" class="form-control rounded-pill <?php if(isset($errors['phone'])): ?>  is-invalid <?php endif ?>" placeholder="Phone" value="">
                                <?php if(isset($errors['phone'])): ?>
                                    <div class="invalid-feedback"><?php echo $errors['phone'] ?></div>
                                <?php endif ?>
                        </div><br>

                        <button type="submit" class="btn btn-success w-100 rounded-pill  mb-2">Update</button>
                        <a href="userprofile.php" class="btn btn-danger w-100 rounded-pill">Cancle</a>
                       

                    </form>

                </div>
            </div>


        </div>
    </div>
</div>