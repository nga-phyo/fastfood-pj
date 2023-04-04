
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

<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-6">

            <?php if(isset($_SESSION['message'])): ?>

                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
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


                 <form action="" method="POST">
                   <div class="card">

                        <div class="card-header">
                            <h3>Login page</h3>
                        </div>

                        <div class="card-body">
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
                        </div>
                        <div class="card-footer">
                            <div class="float-end">
                            <button type="submit" class="btn btn-success">Login</button>
                            </div>
                        </div>

                   </div>
                 </form>
           

        </div>
    </div>
</div>