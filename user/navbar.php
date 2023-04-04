
<?php 



include_once './connect.php';
include_once './helper.php';



?>


<nav class="navbar navbar-expand-lg bg-secondary">
  <div class="container">
    <a class="navbar-brand" href="home.php"><i class="fa-solid fa-utensils"></i> Fast Food</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
      <form class="d-flex" role="search">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        <?php 

        if(!isset($_SESSION['auth'])){

        echo  '<li class="nav-item dropdown">';
        echo '<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              To be A Member
              </a>';
        echo  '<ul class="dropdown-menu">
            <li><a class="dropdown-item" href="register.php">Register</a></li>
            <li><a class="dropdown-item" href="login.php">Login</a></li>
            
          </ul>';

        }else{

          echo '';
        }

        ?>


      <li class="nav-item">
        <?php 

            if(!isset($_SESSION['auth'])): 

              unset($_SESSION['auth']['id']);
        ?>

           <?php 
           
              elseif(isset($_SESSION['auth'])):
              $id = $_SESSION['auth']['id'];
              $sql = "SELECT * FROM users where `id` = '$id'";
              $result = mysqli_query($conn, $sql);
              $user = mysqli_fetch_assoc($result);   
           ?>

          <li class="nav-item"><a class="nav-link active" aria-current="page" href="userprofile.php"><i class="fa-solid fa-user"></i><?php  echo $user['name'] ?></a></li>

          <li class="nav-item"><a class="nav-link active" aria-current="page" href="logout.php">Logout</a></li>
          <li class="nav-item"><a class="nav-link active" aria-current="page" href="userfeedback.php">Feedback</a></li>
          <li class="nav-item"><a class="nav-link active" aria-current="page" href="cart.php"><i class="fa-solid fa-cart-shopping"></i>Cart</a></li>
         

             <?php endif ?>
          
        </li>
       
        
       
       
        </li>
      </ul>
      </form>
    </div>
  </div>
</nav>

