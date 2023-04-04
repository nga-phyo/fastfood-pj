
<?php 

    include_once './file.php';
            
?>


<?php 

    
    $sql = "SELECT * FROM menu";
    $result = mysqli_query($conn, $sql);
    $menus = mysqli_fetch_all($result,MYSQLI_ASSOC);
    

?>



    
    <div class="container">
        <div class="row mt-4">

         <div class="col-4">
         <?php include_once './sidebar.php' ?>
         </div>


         <div class="col-8">

            <?php foreach($menus as $menus): ?>

            <div class="row float-start">
                <div class="col mx-4 my-3">


                <div class="card">
                    <div class="card-header">
                      <h3> <?php echo $menus['name'] ?></h3>  
                    </div>

                    <div class="card-body">
                        <img src="../foodimage/<?php echo $menus['photo'] ?>" alt="" width="200" height="200"><br><br>
                       <i> <?php echo $menus['price']?> mmk</i>
                        <a href="add_to_cart.php?id=<?php echo $menus['id']?>" class="btn btn-warning float-end mt-2" name ="add_menu"> Add <i class="fa-sharp fa-solid fa-plus"></i></a>
                    </div>
                </div>

                </div>
            </div>

            <?php endforeach ?>


         </div>


    </div>
</div>
    

    

    

   


</div>






