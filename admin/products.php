<?php
require_once("inc/header.php");
use animalsStore\classes\models\product;
$pr=new product;
$prs=$pr->selectAll("animalproducts.id as prodId,animalproducts.name as prodName,category.name as catName,animalImg,price,animalNo,animalproducts.created_at as prodCreated");
?>

    <div class="container-fluid py-5">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>All Products</h3>
                    <a href="<?= AURL ?>add-product.php" class="btn btn-success">
                        Add new
                    </a>
                </div>

                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Aniaml Image</th>
                        <th scope="col">Animal Number</th>
                        <th scope="col">Price</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    
                    <?php foreach($prs as $index=>$prod):   ?>
                      <tr>
                        <th scope="row"><?= $index+1  ?></th>
                        <td><?= $prod['prodName'] ?></td>
                        <td><?= $prod['catName'] ?></td>
                        <td>
                            <img src="<?= URL ?>upload/<?= $prod['animalImg'] ?>" width="200" height="200"  alt="animalImg">
                        </td>
                        <td><?= $prod['animalNo'];  ?></td>
                        <td>$<?= $prod['price']; ?></td>
                        <td><?= $prod['prodCreated']  ?></td>
                        <td>
                            <!-- <a class="btn btn-sm btn-primary" href="#">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a class="btn btn-sm btn-info" href="#">
                                <i class="fas fa-edit"></i>
                            </a> -->
                            <a class="btn btn-sm btn-danger" href="<?= AURL  ?>handlers/delete-product.php?id=<?= $prod['prodId'] ?>">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <?php
require_once("inc/footer.php");
?>