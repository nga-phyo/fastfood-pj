<?php


error_reporting(0);

session_start();

include_once '../user/connect.php';
include_once '../user/helper.php';



    $id = $_GET['id'];
    $ban = $_GET['ban'];
   

   if($ban == 1){

        $sql = "UPDATE users set `ban` = '1' where `id` = '$id'";
        $result = mysqli_query($conn, $sql);
        redirect('user_list.php');

   }else {

        $sql = "UPDATE users set `ban` = '0' where `id` = '$id'";
        $result = mysqli_query($conn, $sql);

            redirect('user_list.php');
            

          
} 


   

?>