
<?php 

    include_once './file.php';
            
?>


<?php 

    
    $sql = "SELECT * FROM menu";
    $result = mysqli_query($conn, $sql);
    $menus = mysqli_fetch_all($result,MYSQLI_ASSOC);
    

?>


<div class="container">
    <div class="row d-flex text-box-row nav-bg">

	<div class="col-sm-12 col-md-12 col-lg-6">
            <img src="../foodimage/burger.png" alt="" class="w-100" >
	</div>

        <div class="col-sm-12 col-md-12 col-lg-6">
            <p class="fs-1 text-box-header mb-0 text-danger">Wake up Early,</p> 
            <p class="fs-1 text-box-header">Eat Fresh & Healthy</p>
            <p class="text-wrap">Aside from their natural good taste and great crunchy texture alongside wonderful colors and fragrances, eating a large serving of fresh.</p>

            <nav class="navbar col-sm-12 col-md-12 col-lg-6 search-nav">
                <div class="">
					
                    <form class="d-flex shadow-lg form-bg" role="search" method="post">
                    <input class="form-control search-input" name="search" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-danger search-btn rounded-0 " type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>

	<?php
	
		if($_SERVER['REQUEST_METHOD'] == 'POST'){

				$data = $_POST['search'];
				$sql = "SELECT * FROM menu where name like '%$data%'";
				$search = mysqli_query($conn, $sql);
				$foods = mysqli_fetch_all($search,MYSQLI_ASSOC);
				

		} 
	  
 	?>
					
                    </form>
                </div>
            </nav>
        </div>
        
    </div>
	<div class="row">
	<div class="col-12">
		<h1>
		   Food Definition and classification
		</h1>
			<p>
			Food is any substance consumed by an organism for nutritional support. Food is usually of plant, animal, or fungal origin, and contains essential nutrients, such as carbohydrates, fats, proteins, vitamins, or minerals. The substance is ingested by an organism and assimilated by the organism's cells to provide energy, maintain life, or stimulate growth. Different species of animals have different feeding behaviours that satisfy the needs of their metabolisms that have evolved to fill a specific ecological niche within specific geographical contexts.
			</p>
		</div>
	</div>
</div>

    
    <div class="container">
        <div class="row mt-3 d-flex">
          <p class="text-danger fs-3">
            Avaiable Menus
          </p>

		  <?php if(isset($search)): ?>

			<?php foreach($foods as $food): ?>
			<div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card mb-4 rounded-4 shadow-lg bg-color border-0">
                    
                    <div class="card-body text-center">
                        <img src="../foodimage/<?php echo $food['photo'] ?>" alt="" width="200" height="200" >
                        <div class="card-header pt-2 pb-0 bg-0">
                          <h5 class=""> <?php echo $food['name'] ?></h5>  
                        </div>
                       <span class="font-monospace"> <?php echo number_format($food['price'])?> mmk</span>
                        <a href="add_to_cart.php?id=<?php echo $food['id']?>" class="btn btn-danger col-12 float-end mt-2" name ="add_menu"> Add to Card <i class=" fa-solid fa-cart-plus"></i></a>
                    </div>
                </div>              
            </div>

			<?php endforeach ?>

			<?php else: ?>

				<?php foreach($menus as $menus): ?>

			<div class="col-lg-3 col-md-4 col-sm-12">
				<div class="card mb-4 rounded-4 shadow-lg bg-color border-0">
					
					<div class="card-body text-center">
						<img src="../foodimage/<?php echo $menus['photo'] ?>" alt="" width="200" height="200" >
						<div class="card-header pt-2 pb-0 bg-0">
						<h5 class=""> <?php echo $menus['name'] ?></h5>  
						</div>
					<span class="font-monospace"> <?php echo number_format($menus['price'])?> mmk</span>
						<a href="add_to_cart.php?id=<?php echo $menus['id']?>" class="btn btn-danger col-12 float-end mt-2" name ="add_menu"> Add to Card <i class=" fa-solid fa-cart-plus"></i></a>
					</div>
				</div>              
			</div>

	<?php endforeach ?>

	<?php endif ?>





    </div>
</div>
</div>

<footer class="footer-area ">
		<div class="container-fluid">
			<div class="row footer-bg mt-5 py-5">
				<div class="col-lg-3 col-md-6">
					<h5>About Us</h5>
					<p><i>We are trying to better. The first thing we make is to be customer pleasure. We are trying to better. The first thing we make is to be customer pleasure.We are trying to better. The first thing we make is to be customer pleasure.We are trying to better. The first thing we make is to be customer pleasure.We are trying to better. The first thing we make is to be customer pleasure.. </i></p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h5>Opening hours</h5>
					<p><i class="text-color">Monday: </i>Closed</p>
					<p><i class="text-color">Tue-Wed :</i> 9:Am - 10PM</p>
					<p><i class="text-color">Thu-Fri :</i> 9:Am - 10PM</p>
					<p><i class="text-color">Sat-Sun :</i> 5:PM - 10PM</p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h5>Contact information</h5>
					<p class="lead"><i>Somewhere on the earth</i></p>
					<p class=""><a href="#" class="text-danger text-decoration-none">+959123123456</a></p>
					<p><a href="#" class="text-danger text-decoration-none"> myemail@gmail.com</a></p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h5 class="mb-3">Subscribe</h5>
					<div class="subscribe_form">
						<input type="text" class="form-control mb-3">
						<button class="btn btn-danger w-100 mb-3">Subscribe</button>
					</div>
					<ul class="list-inline f-social">
						<li class="list-inline-item"><a href="#"><i class="fa-brands fa-facebook text-white"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa-brands fa-twitter text-white"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa-brands fa-linkedin text-white"></i></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa-brands fa-google text-white"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa-brands fa-instagram text-white"></i></a></li>
					</ul>
				</div>

				<div class=" col-sm-12 col-md-12 col-lg-12 text-center">
						<p class="company-name"><i>All Rights Reserved. &copy; 2023 </i><span><i>Fast Food</i></span>  
					
					</div>
			</div>
		</div>




        
	</footer>






