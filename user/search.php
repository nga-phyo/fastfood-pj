

<?php 

include_once './file.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $data = $_POST['search'];
    $sql = "SELECT * FROM menu where name like '%$data%'";
    $result = mysqli_query($conn, $sql);
    // $menus = mysqli_fetch_all($result,MYSQLI_ASSOC);
    // dd($menus);
  
        while($menu = mysqli_fetch_assoc($result)):
        
            $id = $menu['id'];
            $name = $menu['name'];
            $price = $menu['price'];
            $photo = $menu['photo'];

            ?>

        
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card mb-4 rounded-4 shadow-lg bg-color border-0">
                    
                    <div class="card-body text-center">
                        <img src="../foodimage/<?php echo $photo ?>" alt="" width="200" height="200" >
                        <div class="card-header pt-2 pb-0 bg-0">
                          <h5 class=""> <?php echo $name ?></h5>  
                        </div>
                       <span class="font-monospace"> <?php echo number_format($price)?> mmk</span>
                        <a href="add_to_cart.php?id=<?php echo $id?>" class="btn btn-danger col-12 float-end mt-2" name ="add_menu"> Add to Card <i class=" fa-solid fa-cart-plus"></i></a>
                    </div>
                </div>              
            </div>
        
        <?php endwhile ?>

        <?php } ?>
        
    

        
        <form class="d-flex shadow-lg form-bg" role="search" method="post">
                    <input class="form-control search-input" name="search" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-danger search-btn rounded-0 " type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>




   



