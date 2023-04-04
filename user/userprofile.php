
<?php

 include_once './file.php';

 $id = $_SESSION['auth']['id'];

 $sql = "SELECT * FROM users where `id` = '$id' ";
 $result = mysqli_query($conn, $sql);

 $user = mysqli_fetch_assoc($result);


 
 ?>



<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-6 mt-5">

            <div class="card">
                <div class="card-body">
                    <h1><i class="fa-solid fa-user"></i>  <?php echo $user['name'] ?></h1>
                    <p><?php echo $user['email'] ?></p>
                </div>
                <div class="card-footer">
                    <a href="userprofile.php" class="btn btn-secondary">Cancle</a>
                    <a href="userprofile_edit.php" class="float-end btn btn-success ">Edit</a>
                </div>
            </div>

        </div>
    </div>
</div>

