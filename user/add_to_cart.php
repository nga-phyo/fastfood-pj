

<?php 

    include_once './file.php';

    if(!isset($_SESSION['auth'])){

        redirect('login.php');

    }else { 
        
        $id = $_GET['id'];
        $_SESSION['cart'][$id]++;
        redirect('home.php');

    }


?>