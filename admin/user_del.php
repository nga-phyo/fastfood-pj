

<?php


error_reporting(0);

session_start();

include_once '../user/connect.php';
include_once '../user/helper.php';



    $id = $_GET['id'];


    $sql = "DELETE FROM users where `id` = '$id'";
    $result = mysqli_query($conn, $sql);

    redirect('user_list.php');
