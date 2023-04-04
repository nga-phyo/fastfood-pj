<?php 


include_once '../user/connect.php';
include_once '../user/helper.php';

if($_SESSION['auth']){
    unset($_SESSION['auth']);
   
}

redirect('login.php');


?>