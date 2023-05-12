
<?php

 include_once './file.php';

 $id = $_SESSION['auth']['id'];

 $sql = "SELECT * FROM users where `id` = '$id' ";
 $result = mysqli_query($conn, $sql);

 $user = mysqli_fetch_assoc($result);


 
 ?>



<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-5 mt-5">

            <div class="card shadow-lg rounded-2">
                <div class="card-body">
                    <p class="" ><i class="fa-solid fa-user me-2"></i><?php echo $user['name'] ?></p>
                    <p><i class="fa-sharp fa-solid fa-envelope me-2"></i><?php echo $user['email'] ?></p>
                    <p><i class="fa-solid fa-phone me-2"></i><?php echo $user['phone'] ?></p>
                </div>
                <div class="card-footer text-end">
                    <a href="userprofile.php" class="btn btn-secondary">Cancle</a>
                    <a href="userprofile_edit.php" class=" btn btn-success ">Edit</a>
                </div>
            </div>

        </div>
    </div>
</div>

