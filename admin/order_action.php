


<?php 


error_reporting(0);

session_start();
include_once '../user/connect.php';
include_once '../user/helper.php';


    $id =$_GET['id'];
    $accept = $_GET['accept'];


   if($accept == 1){

    $sql = "UPDATE orders set `accept` = 1 , `send_date` = now() where `order_id` = '$id'";
    $result = mysqli_query($conn, $sql);

    redirect('order_detail.php');

   }else{

        $sql = "UPDATE orders set `accept` = 0 where `order_id` = '$id'";
        $result = mysqli_query($conn, $sql);

        redirect('order_detail.php');

   }
    
?>