<?php 

    include_once './file.php';

    if($_SESSION['auth']){
        unset($_SESSION['auth']);
       
    }

    redirect('home.php');

?>