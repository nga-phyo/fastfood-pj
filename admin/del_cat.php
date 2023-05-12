

<?php 


 error_reporting(0);

    session_start();

    include_once '../user/connect.php';
    
    include_once '../user/helper.php';
   

    $id = $_GET['id'];


    $sql = "DELETE FROM category where `cat_id` = '$id'";
    $result = mysqli_query($conn, $sql);

    redirect('category.php');



?>