<?php 
require_once("inc/header.php");
//التأكد من البضاعة التي سوف نضيفها للسلة 
use animalsStore\classes\models\product;
use animalsStore\classes\models\category;


if($request->getHas('id'))
{
  $id=$request->get("id");
}
else {$id=1;
}
// $pr=$prod->selectId($id);  
// echo "<pre>";
// print_r($pr);
// echo "</pre>";
$prod=new product;
$prods=$prod->selectAll("animalproducts.id as prodId,description,animalproducts.name as prodName,animalNo,animalImg,category.id,category.name as catName,price");
$prodd=$prod->selectId($id,"animalproducts.id as prodId,description,animalproducts.name as prodName,animalNo,animalImg,category.id,category.name as catName,price");


?>

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Animals</strong></div>
        </div>
      </div>
    </div>  

    <form action="<?= URL; ?>handler/add-cart.php" method="GET">
    <div class="site-section">
      <div class="container">
        <div class="row">
         
          <div class="col-md-6">
            <img src="<?= URL ?>upload/<?= $prodd['animalImg']  ?>" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-6">
          <h1 class="text-black"><?=  $prodd['catName'];  ?></h1>
            <h2 class="text-black"><?=  $prodd['prodName'];  ?></h2>
            <p class="mb-4 "><?= $prodd['description'];  ?></p>
            <p><strong class="text-primary h4">Animal available number:<?= $prodd['animalNo'];   ?></strong></p>
            <p><strong class="text-primary h4">$<?= $prodd['price'];   ?></strong></p>
           
            <div class="mb-5">
              <div class="input-group mb-3" style="max-width: 120px;">
              <div class="input-group-prepend">
                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
              </div>
              <input type="text" class="form-control text-center" value="1" name="quantity" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
              <div class="input-group-append">
                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
              </div>
            </div>

            </div>
               <?php if($cart->hasId($prodd['prodId'])): ?>
							  <div class="button_container">
                    <button type="submit" name="" class="button cart_button buy-now btn btn-sm btn-primary">This product is already added to the cart!!</button>
                  </div>
                <?php else: ?>
                    <div class="button_container">
                    <button type="submit" name="submit" class="button cart_button buy-now btn btn-sm btn-primary">Add to cart</button>
                  </div>
               
                <?php endif; ?>
								
                     
               
									
								
            <input type="hidden" name="prodId" value="<?= $prodd['prodId']; ?>  ">
            <input type="hidden" name="prodName" value="<?= $prodd['prodName']; ?>">
            <input type="hidden" name="catName" value="<?= $prodd['catName']; ?>  ">
            <input type="hidden" name="description" value="<?= $prodd['description']; ?> ">
            <input type="hidden" name="price" value="<?= $prodd['price']; ?>  ">
            <input type="hidden" name="animalImg" value="<?= $prodd['animalImg']; ?> ">
            <input type="hidden" name="animalNo" value="<?= $prodd['animalNo']; ?>  ">
         

            
          
          </div>
        </div>
      </div>
    </div>
    </form>
    <div class="site-section block-3 site-blocks-2 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Featured Products</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="nonloop-block-3 owl-carousel">
            <?php  foreach($prods as $prod): ?>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="<?= URL ?>upload/<?= $prod['animalImg'];  ?>" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="<?= URL; ?>shop-single.php?id=<?= $prod['prodId'] ?>"><?= $prod['prodName'];  ?></a></h3>
                    <p class="mb-0 text-primary font-weight-bold"><?=  $prod['description'];  ?></p>
                    <p class="text-primary font-weight-bold">Animal Number is: <?=  $prod['animalNo'];  ?></p>
                    <p class="text-primary font-weight-bold">Aniaml Price is: $<?=  $prod['price'];  ?></p>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
           
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="h3 mb-3 text-black">Get In Touch</h2>
          </div>
          <div class="col-md-7">
    <form action="<?= URL;?>handler/order.php" method="post">
              
              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_fname" class="text-black">Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_fname" name="name">
                  </div>
                  <!-- <div class="col-md-6">
                    <label for="c_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_lname" name="c_lname">
                  </div> -->
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_email" class="text-black">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="c_email" name="email" placeholder="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_subject" class="text-black">Address </label>
                    <input type="text" class="form-control" id="c_subject" name="address">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_subject" class="text-black">Phone </label>
                    <input type="text" class="form-control" id="c_subject" name="phone">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-lg-12">
                    <input type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value="Submit Order">
                  </div>
                </div>
              </div>
            </form>

            </div>
          <div class="col-md-5 ml-auto">
            <div class="p-4 border mb-3">
              <span class="d-block text-primary h6 text-uppercase">New York</span>
              <p class="mb-0">203 Fake St. Mountain View, San Francisco, California, USA</p>
            </div>
            <div class="p-4 border mb-3">
              <span class="d-block text-primary h6 text-uppercase">London</span>
              <p class="mb-0">203 Fake St. Mountain View, San Francisco, California, USA</p>
            </div>
		<div class="panel"></div>
    </div>

    <footer class="site-footer border-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="row">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Navigations</h3>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="#">Sell online</a></li>
                  <li><a href="#">Features</a></li>
                  <li><a href="#">Shopping cart</a></li>
                  <li><a href="#">Store builder</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="#">Mobile commerce</a></li>
                  <li><a href="#">Dropshipping</a></li>
                  <li><a href="#">Website development</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="#">Point of sale</a></li>
                  <li><a href="#">Hardware</a></li>
                  <li><a href="#">Software</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
            <h3 class="footer-heading mb-4">Promo</h3>
            <a href="#" class="block-6">
              <img src="<?= URL ?>assets/images/bg.jpg" alt="Image placeholder" class="img-fluid rounded mb-4">
              <h3 class="font-weight-light  mb-0">Finding Your Perfect Animals</h3>
              <p>Promo from  nuary 15 &mdash; 25, 2019</p>
            </a>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Contact Info</h3>
              <ul class="list-unstyled">
                <li class="address">203 Fake St. Mountain View, San Francisco, California, USA</li>
                <li class="phone"><a href="tel://23923929210">+2 392 3929 210</a></li>
                <li class="email">emailaddress@domain.com</li>
              </ul>
            </div>

            <div class="block-7">
              <form action="#" method="post">
                <label for="email_subscribe" class="footer-heading">Subscribe</label>
                <div class="form-group">
                  <input type="text" class="form-control py-4" id="email_subscribe" placeholder="Email">
                  <input type="submit" class="btn btn-sm btn-primary" value="Send">
                </div>
              </form>
            </div>  
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" class="text-primary">Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
          
        </div>
      </div>


     
    
    </footer>
 



  <?php 
require_once("inc/footer.php");
  ?>