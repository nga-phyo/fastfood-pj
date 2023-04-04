
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
        <div class="col-6">

            <div class="card">
                <div class="card-header">
                  <h3>  Edit About User</h3>
                </div>
                <div class="card-body">
                    
                    <form action="" method="POST">

                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control <?php if(isset($errors['name'])): ?>  is-invalid <?php endif ?>" placeholder="Enter Your Name" value="">
                                <?php if(isset($errors['name'])): ?>
                                    <div class="invalid-feedback"><?php echo $errors['name'] ?></div>
                                <?php endif ?>
                        </div><br>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control <?php if(isset($errors['email'])): ?>  is-invalid <?php endif ?>" placeholder="Enter Your Email" value="">
                                <?php if(isset($errors['email'])): ?>
                                    <div class="invalid-feedback"><?php echo $errors['email'] ?></div>
                                <?php endif ?>
                        </div><br>

                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control <?php if(isset($errors['password'])): ?>  is-invalid <?php endif ?>" placeholder="Enter Your Passowrd" value="">
                                <?php if(isset($errors['password'])): ?>
                                    <div class="invalid-feedback"><?php echo $errors['password'] ?></div>
                                <?php endif ?>
                        </div><br>

                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" name="phone" class="form-control <?php if(isset($errors['phone'])): ?>  is-invalid <?php endif ?>" placeholder="Enter Your Phone" value="">
                                <?php if(isset($errors['phone'])): ?>
                                    <div class="invalid-feedback"><?php echo $errors['phone'] ?></div>
                                <?php endif ?>
                        </div><br>

                        <a href="userprofile.php" class="btn btn-secondary">Cancle</a>
                        <button type="submit" class="btn btn-success float-end">Update</button>
                       

                    </form>

                </div>
            </div>


        </div>
    </div>
</div>