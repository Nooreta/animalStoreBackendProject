<?php
require_once("inc/header.php");
use animalsStore\classes\models\admins;
$admin=new admins;
$admins=$admin->selectAll();

?>

    <div class="container-fluid py-5">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>All Admins</h3>
                    <a href="<?= AURL  ?>add-admins.php" class="btn btn-success">
                        Add new
                    </a>
                </div>

                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Is Super</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($admins as $index=>$admin):    ?>
                      <tr>
                        <th scope="row"><?=  $index+1;  ?></th>
                        <td><?= $admin['name'];   ?></td>
                        <td><?= $admin['email'];  ?></td>
                        <td><?= $admin['is_super'];   ?></td>
                        <td><?= $admin['created_at'];  ?></td>
                        <td>
                        
                            <a class="btn btn-sm btn-danger" href="<?= AURL ?>handlers/delete-admin.php?id=<?= $admin['id'];  ?>">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                      </tr>
                      <?php endforeach;  ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <?php
require_once("inc/footer.php");
?>