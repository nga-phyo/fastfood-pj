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



<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-6">
            
            <form action="" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control <?php if(isset($errors['name'])): ?>  is-invalid <?php endif ?>" placeholder="Enter Your Name">
                        <?php if(isset($errors['name'])): ?>
                            <div class="invalid-feedback"><?php echo $errors['name'] ?></div>
                        <?php endif ?>
                </div><br>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control <?php if(isset($errors['email'])): ?>  is-invalid <?php endif ?>" placeholder="Enter Your Email">
                        <?php if(isset($errors['email'])): ?>
                            <div class="invalid-feedback"><?php echo $errors['email'] ?></div>
                        <?php endif ?>
                </div><br>

                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control <?php if(isset($errors['password'])): ?>  is-invalid <?php endif ?>" placeholder="Enter Your Passowrd">
                        <?php if(isset($errors['password'])): ?>
                            <div class="invalid-feedback"><?php echo $errors['password'] ?></div>
                        <?php endif ?>
                </div><br>

                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="text" name="phone" class="form-control <?php if(isset($errors['phone'])): ?>  is-invalid <?php endif ?>" placeholder="Enter Your Phone">
                        <?php if(isset($errors['phone'])): ?>
                            <div class="invalid-feedback"><?php echo $errors['phone'] ?></div>
                        <?php endif ?>
                </div><br>

                <div class="form-group">
                    <label for="">Type</label>
                    <select name="type" id="" class="form-control">
                        <option value="admin">--Admin--</option>
                        <option value="user">--User--</option>
                    </select>
                </div>

                <div class="float-end">
                <button type="submit" class="btn btn-primary">Register</button>
                </div>


            </form>


        </div>
    </div>
</div>

