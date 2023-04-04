


<?php 


error_reporting(0);

session_start();

include_once '../user/connect.php';
include_once '../user/helper.php';

$id = $_GET['id'];

$sql = "DELETE FROM orders where `order_id` = '$id'";

$result = mysqli_query($conn, $sql);

if($result){

    
    redirect('order_detail.php');
}


?>