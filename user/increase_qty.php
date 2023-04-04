<?php 

    include_once './file.php';

    $id = $_GET['id'];
    $_SESSION['cart'][$id]++;
    
    redirect('cart.php');

?>