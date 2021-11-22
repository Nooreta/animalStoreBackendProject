<?php
require_once("inc/header.php");
use animalsStore\classes\models\category;
$cat=new category;
$cats=$cat->selectAll("id,name");
?>

    <div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Add Admin</h3>
                <div class="card">
                    <div class="card-body p-5">
                        <form method="post" action="<?= AURL ?>handlers/add-admin.php" enctype="multipart/form-data">
                            <div class="form-group">
                              <label>Name</label>
                              <input type="text" name="name" class="form-control">
                            </div>

                            <div class="form-group">
                              <label>Email</label>
                              <input type="text" name="email" class="form-control">
                            </div>

                            <div class="form-group">
                              <label>Password</label>
                              <input type="password" name="password" class="form-control">
                            </div>
                            

                            <div class="form-group">
                                <label>Is Super</label>
                                <input type="text" name="isSuper" class="form-control">
                            </div>
                              
                            <div class="text-center mt-5">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-dark" href="<?= AURL ?>admins.php">Back</a>
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