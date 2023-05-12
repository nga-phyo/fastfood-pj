<?php include_once './file.php' ?>


<?php

    
    // dd($ans);

    $errors = [];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $type = $_POST['type'];

        $pass = md5($password);
        $pass = sha1($pass);
        $pass = crypt($pass, $pass);
       

        if(!$name){
            $errors['name'] = "Name is required";

        }else if(strlen($name) < 6){
            $errors['name'] = "Name must be long ";
        }

        if(!$email){
            $errors['email'] = "Email is required";
        }

       else if($email!=""){

            $sql = "SELECT * FROM users where `email` = '$email'";
            $result = mysqli_query($conn, $sql);
            $ans = mysqli_num_rows($result);
            
            if($ans > 0){
                $errors['email'] = "Email is already used";
            }
           
        }
        

        if(!$password){
            $errors['password'] = "Password is required";

        }else if(strlen($password) <= 5 ){
            $errors['password'] = "Password as least 6 characters";
        }

        if(!$phone){
            $errors['phone'] = "Phone is required";
        }

     
       

     if(count($errors) == 0){


        $sql = "INSERT INTO users(`name`,`email`,`password`,`phone`,`role`) Values('$name','$email','$pass','$phone','$type')";
       
        
        $result = mysqli_query($conn, $sql);
        
        if($result) {

            redirect('login.php');

        }else{

            redirect('register.php');
        }
     }

     



    }


?>



<div class="container form-color p-4 mt-3 border-1 shadow-sm bg-light shadow-lg login-bg w-50">
    <div class="row justify-content-center border-2">

    

        <div class="col-7">
        
            <div class="heading-title text-center">
                <h2 class="fw-bolder">Register</h2>
                <p>If you don't have an account, you can create here!</p>
            </div>
        
            <form action="" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    
                    <input type="text" name="name" class="form-control rounded-pill <?php if(isset($errors['name'])): ?>  is-invalid <?php endif ?>" placeholder="Name">
                        <?php if(isset($errors['name'])): ?>
                            <div class="invalid-feedback"><?php echo $errors['name'] ?></div>
                        <?php endif ?>
                </div><br>

                <div class="form-group">
                    
                    <input type="email" name="email" class="form-control rounded-pill<?php if(isset($errors['email'])): ?>  is-invalid <?php endif ?>" placeholder="Email">
                        <?php if(isset($errors['email'])): ?>
                            <div class="invalid-feedback"><?php echo $errors['email'] ?></div>
                        <?php endif ?>
                </div><br>

                <div class="form-group">
                    
                    <input type="password" name="password" class="form-control rounded-pill<?php if(isset($errors['password'])): ?>  is-invalid <?php endif ?>" placeholder="Passowrd">
                        <?php if(isset($errors['password'])): ?>
                            <div class="invalid-feedback"><?php echo $errors['password'] ?></div>
                        <?php endif ?>
                </div><br>

                <div class="form-group">
                    
                    <input type="text" name="phone" class="form-control rounded-pill<?php if(isset($errors['phone'])): ?>  is-invalid <?php endif ?>" placeholder="Phone">
                        <?php if(isset($errors['phone'])): ?>
                            <div class="invalid-feedback"><?php echo $errors['phone'] ?></div>
                        <?php endif ?>
                </div><br>

                <div class="form-group">
                    
                    <select name="type" id="" class="form-control rounded-pill mb-3">
                        <option value="admin">--Admin--</option>
                        <option value="user">--User--</option>
                    </select>
                </div>

                <div class="col-12">
                <button type="submit" class="btn btn-primary w-100 rounded-pill">Register</button>
                </div>


            </form>


        </div>
    </div>
</div>

