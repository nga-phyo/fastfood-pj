
<?php 
  include_once '../user/header.php';
  include_once '../user/footer.php';
?>

<nav class="navbar navbar-expand-lg bg-primary">
  <div class="container">
    <a class="navbar-brand text-white" href="#">Navbar scroll</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
   
      <form class="d-flex" role="search">

      <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="menu.php">Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="category.php">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="order_detail.php">Order Details</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="user_list.php">User List</a>
        </li>
      
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Link
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white" href="feedbackpage.php">User_feedback</a>
        </li>
      
      </ul>
        
      </form>
    </div>
  </div>
</nav>