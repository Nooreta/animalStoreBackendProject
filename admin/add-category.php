<?php
require_once("inc/header.php");
?>

    <div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Add Category</h3>
                <div class="card">
                    <div class="card-body p-5">
                        <form action="<?= AURL ?>handlers/add-category.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                              <label>Name</label>
                              <input name="name" type="text" class="form-control">
                            </div>
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose Image</label>
                            </div>
                            <div class="text-center mt-5">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-dark" href="<?= AURL;  ?>categories.php">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
 <?php 
 require_once("inc/footer.php");
 ?>