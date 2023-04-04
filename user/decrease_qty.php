<?php 


    include_once './file.php';

    $id = $_GET['id'];

    if($_SESSION['cart'][$id] == 1){

        unset($_SESSION['cart'][$id]);
    }
    else{

        $_SESSION['cart'][$id]--;

    }

    redirect('cart.php');
?>