	<?php 
require_once("inc/header.php");
use animalsStore\classes\models\category;
use animalsStore\classes\models\product;
$cat=new category;
$cats=$cat->selectAll("id,name");
if($request->getHas("keyword"))
{
  $keyword=$request->get("keyword");
}
else{
  $keyword='';
}
$pr=new product;
$prods=$pr->selectWhere("name like '%$keyword%'","id,name,description,price,animalImg,animalNo");

?>
    <!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="assets/images/shop_background.jpg"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title">Search results for:<?= $keyword;  ?> </h2>
		</div>
	</div>

	<!-- Shop -->

	<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">

					<!-- Shop Sidebar -->
					<div class="shop_sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">Categories</div>
							<ul class="sidebar_categories">
                            <?php  foreach($cats as $cat): ?>
								<li><a href="<?= URL; ?>shop.php?id=<?= $cat['id'];  ?>"><?= $cat['name'];   ?></a></li>
								<?php endforeach; ?>
							</ul>
						</div>
						
					</div>

				</div>

				<div class="col-lg-9">
					
					<!-- Shop Content -->

					<div class="shop_content">

						<div class="product_grid">
                        <?php foreach($prods as $prod): ?>
							<div class="product_grid_border"></div>
                          	<!-- Product Item -->
							<div class="product_item">
								<div class="product_border"></div>
								<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="<?= URL; ?>upload/<?= $prod['animalImg']; ?>" alt="Img"></div>
								<div class="product_content text-center">
                                    <div class="product_name text-center "><div><a class="font-bold" href="<?= URL; ?>shop.php?id=<?= $prod['id'];  ?>" tabindex="0"><?= $prod['name']; ?></a></div></div>
									<div class="product_price text-center">Animal price is: $<?= $prod['price'];  ?></div>
                                    <div class="product_price text-center">Animal Number is: <?= $prod['animalNo'];  ?></div>

								</div>
								<div class="product_fav text-center"><i class="fas fa-cart-plus"></i></div>

							</div>
                            <?php endforeach; ?>
                         
					

						</div>

						<!-- Shop Page Navigation -->

						<!-- <div class="shop_page_nav d-flex flex-row">
							<div class="page_prev d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-left"></i></div>
							<ul class="page_nav d-flex flex-row">
								<li><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">...</a></li>
								<li><a href="#">21</a></li>
							</ul>
							<div class="page_next d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-right"></i></div>
						</div> -->

					</div>

				</div>
			</div>
		</div>
	</div>	
	<?php
require_once("inc/footer.php");

?>