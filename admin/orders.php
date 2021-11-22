<?php
require_once("inc/header.php");
use animalsStore\classes\models\order;
$order=new order;
$orders=$order->selectAll("name,email,phone,address,status,created_at");

?>

    <div class="container-fluid py-5">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>All Orders</h3>
                </div>

                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">email</th>
                        <th scope="col">address</th>
                        <th scope="col">Status</th>
                        <th scope="col">Created_at</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                    <?php  foreach($orders as $index=>$order):  ?>
                      <tr>
                        <th scope="row"><?=  $index+1;  ?></th>
                        <td><?= $order['name'];  ?></td>
                        <td><?= $order['phone'];  ?></td>
                        <td><?= $order['email']; ?></td>
                        <td><?= $order['address'];  ?></td>
                        <td><?= $order['status'];  ?></td>
                        <td><?= $order['created_at'];  ?></td>
                       
                      </tr>
                      <?php  endforeach;  ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <?php
require_once("inc/footer.php");
?>