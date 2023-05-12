<?php 



    error_reporting(0);

    session_start();


    include_once '../user/connect.php';
    include_once '../user/header.php';
    include_once '../user/helper.php';
  

   
    
  ?>




<?php
$errors = [];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $email = $_POST['email'];
        $password = $_POST['password'];

        $pass = md5($password);
        $pass = sha1($pass);
        $pass = crypt($pass, $pass);
       

        if(!$email){
            $errors['email'] = "Email is required";
        }

        if(!$password){
            $errors['password'] = "Password is required";
        }

   

        if(count($errors) == 0){
            $sql =  "SELECT * from users where `role` = 'admin' and `email` = '$email' and `password` = '$pass' ";

        $result = mysqli_query($conn,$sql);
        
        if($user = mysqli_fetch_assoc($result)){

          
           $_SESSION['auth']['admin'] = [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            
         
           ];

      redirect('home.php');

        
    } 
    else if($result){

        $_SESSION['message'] = 'User has no permission Admin page!';
    }
   
    }
}


    
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Admin Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Data-Table-1.css">
    <link rel="stylesheet" href="assets/css/Data-Table.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <link rel="stylesheet" href="css/style2.css">
</head>
<body>
    <header class="top-navbar">
      <nav class="navbar navbar-dark align-items-start navbar-expand-lg accordion bg-gradient-primary p-0">
              <div class="container-fluid d-flex flex-column p-0">
                  <a class="navbar-brand d-flex justify-content-center align-items-center m-0" href="#">
                      <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                      <div class="sidebar-brand-text mx-3"><span>Hk Restaurant</span></div>
                  </a>
                </div>
            </nav>
        </div>
    </header>
      <div class="content">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-7">
              <div class="row justify-content-center">
                <div class="col-md-6">
                    <h3 class="text-center  mb-4">Welcome Admin!</h3>
                    
                </div>
                    <div class="col-8">
                    <?php if(isset($_SESSION['message'])): ?>

                        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Sorry!</strong> 
                        <?php 
                        echo $_SESSION['message'] ;
                        unset($_SESSION['message'])
                        ?>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    <?php endif ?>

                      <form class="mb-5" method="POST" id="contactForm" name="contactForm">

                            <div class="row">
                                <div class="col-md-12 form-group">
                                <input type="text" class="form-control <?php if(isset($errors['email'])): ?>  is-invalid <?php endif ?>" name="email" id="email" placeholder="Email">
                                        <?php if(isset($errors['email'])): ?>
                                            <div class="invalid-feedback"><?php echo $errors['email'] ?></div>
                                        <?php endif ?>
                                </div>
                          </div>

                                <div class="row">
                                    <div class="col-md-12 form-group">
                                    <input type="password" class="form-control <?php if(isset($errors['password'])): ?>  is-invalid <?php endif ?> " name="password" id="subject" placeholder="Password">
                                        <?php if(isset($errors['password'])): ?>
                                            <div class="invalid-feedback"><?php echo $errors['password'] ?></div>
                                        <?php endif ?>
                                    </div>
                                </div>

                            <div class="row justify-content-center my-3 px-3">
                                      <input type="submit" name="log in" value="Log In" class="btn btn-primary">
                                      <span class="submitting"></span>    
                            </div>
                             
                      </form>
                    </div>
              </div>
            </div>
          </div>
        </div>
        <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Hk Restaurant © 2023</span></div>
                </div>
            </footer>
      </div>
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/jquery.validate.min.js"></script>
      <script src="js/main.js"></script>
</body>
</html>