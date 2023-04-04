<?php 

    include_once './file.php';


    $id = $_GET['id'];
    unset($_SESSION['cart'][$id]);

    redirect('cart.php');
  
?>