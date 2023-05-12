
<?php 
    include_once './file.php';
   

    
 ?>

<?php
$errors = [];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $email = $_POST['email'];
        $password = $_POST['password'];

        $password = md5($password);
        $password = sha1($password);
        $password = crypt($password, $password);
       

        if(!$email){
            $errors['email'] = "Email is required";
        }

        if(!$password){
            $errors['password'] = "Password is required";
        }
      

        if(count($errors) == 0){

            $sql = "SELECT * FROM users where `email` = '$email' and `password` = '$password'";
            $result = mysqli_query($conn, $sql);
        
            if($user = mysqli_fetch_assoc($result)){

                $ban = $user['ban'];
          
                $_SESSION['auth'] = [
                    'id' => $user['id'],
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'ban' => $user['ban'],
                   
                
                ];

                if($ban == 1){

                    $_SESSION['ban']['message'] = ' This User Account is Ban! ';

                }else{

                    redirect('home.php');
                }

             } 


            else if($result){

                $_SESSION['message'] = 'User not fount sir!';
            }
        
        }


    }


    
?>

<div class="container-fluid">
    <div class="row d-flex justify-content-center login-row pt-4">
        <div class="text-center mt-5 col-md-12 col-sm-12 col-lg-5">
            <p class="login-img-txt col-sm-12">Join Our Community</p>
            <img src="./img/undraw_thought_process_re_om58.svg" class="col-sm-12 w-100" alt="">
        </div>
           
				<div class="col-sm-12 col-md-12  col-lg-3 bg-light shadow-lg login-bg">
                <?php if(isset($_SESSION['message'])): ?>

                    <div class='alert alert-danger alert-dismissible fade show position-absolute col-3' role='alert'>
                    <strong>Sorry!</strong> 
                    <?php 
                    echo $_SESSION['message'] ;
                    unset($_SESSION['message'])
                    ?>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>

                    <?php elseif(isset($_SESSION['ban']['message'])): ?>

                    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Sorry!</strong> 
                    <?php 
                    echo $_SESSION['ban']['message'] ;
                    unset($_SESSION['ban']['message'])
                    ?>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>

                    <?php endif ?>
				<p class="text-center mb-3 mt-4 text-primary fw-bold login-font">Login Now</p>

                 <form action="" method="POST">
                  

                        

                        <div class="mb-4">
							<input type="text" name="email" id="" class="form-control login-input rounded-pill <?php if(isset($errors['email'])): ?> is-invalid <?php endif ?>" placeholder="Email">
                                <?php if(isset($errors['email'])): ?>
                                        <div class="invalid-feedback"><?php echo $errors['email'] ?></div>
                                    <?php endif ?>
					    </div>

                        <div class="mb-5">	
                            <input type="password" name="password" id="" class="form-control login-input rounded-pill  <?php if(isset($errors['password'])): ?>  is-invalid <?php endif ?>" placeholder="Password">
                                <?php if(isset($errors['password'])): ?>
                                        <div class="invalid-feedback"><?php echo $errors['password'] ?></div>
                                    <?php endif ?>
                        </div>

                            
                        
                        <button class="btn btn-primary w-100 mb-4 login-input rounded-pill">Login</button>
					    <button class="btn btn-primary w-100 mb-4 login-input rounded-pill"><i class="fa-brands fa-facebook  "></i> Login with Facebook</button>
					    <button class="btn btn-danger w-100 mb-5 login-input rounded-pill"><i class="fa-brands fa-google "></i> Login with Google</button>


                   </div>
                 </form>
                </div>

        </div>
    </div>
</div>