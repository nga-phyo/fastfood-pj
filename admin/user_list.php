<?php 


    error_reporting(0);

    session_start();


    include_once '../user/connect.php';
    include_once '../user/header.php';
    include_once '../user/helper.php';
  

    // if(!isset($_SESSION['auth']['admin'])){
    //     redirect('login.php');
    // }

   
    $sql = "SELECT * FROM users where `role` = 'user'";
    $result = mysqli_query($conn, $sql);

    $users = mysqli_fetch_all($result,MYSQLI_ASSOC);

    // dd($users);


?>

         
    <?php include './header.php' ?>
    <?php include './navbar.php' ?>


                <div class="container-fluid">
                    <!-- <h3 class="text-dark mb-4">Registered Customers</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Total Registration List</p> -->
                    <div class="row">
                        <div class="col-sm-12">
                        <table class="table table-striped">

<tr>
    <th>Name</th>
    <th>Email</th>
    <th>Register date</th>
    <th>Action</th>
</tr>


<?php foreach($users as $user): ?>
    
    <tr>
        <td><?php echo $user['name'] ?></td>
        <td><?php echo $user['email'] ?></td>
        <td><?php echo $user['date'] ?></td>


        <td>

        <?php if($user['ban'] == 0): ?>

            <a href="user_ban.php?id=<?php echo $user['id'] ?> &ban=1" class="btn btn-danger" onclick="return confirm('Are you ban this user')">Ban</a>

        <?php else: ?>

            <a href="user_ban.php?id=<?php echo $user['id'] ?> &ban=0" class="btn btn-warning" onclick="return confirm('Are you accept this user!')">Accept</a>
            <a href="user_del.php?id=<?php echo $user['id'] ?>" class="btn btn-danger" onclick="return confirm('are you sure')">Delete</a>

        <?php endif ?>

        </td>
    </tr>

    <?php endforeach ?>



</table>

                        </div>
                    </div>

            
                            
                        </div>
                        <div class="card-body">
						<div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
						

                            
                            </div>
                            <div class="row">
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        

     
            <?php include './footer.php' ?>