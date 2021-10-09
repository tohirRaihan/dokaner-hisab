<?php

require_once '../../../private/initialize.php';

use App\Order;

$orders = Order::all();
$count  = 1;

?>
<table id="orders-table" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th></th>
            <th>#</th>
            <th>Customer Name</th>
            <th class="text-center">Order Date</th>
            <th class="text-center">Amount</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orders as $order) : ?>
            <tr>
                <td class="text-center"><input type="checkbox" value="<?= $order['id'] ?>"></td>
                <td><?= $count++ ?></td>
                <td><?= $order['customer_name'] ?></td>
                <td class="text-center"><?= $order['created_at'] ?></td>
                <td class="text-center"><?= $order['ordered_amount'] ?></td>
                <td class="text-center">
                    <div class="btn-group" role="group">
                        <button class="btn btn-xs bg-gradient-primary" onclick="orderDetails(<?= $order['id'] ?>)">
                            Details
                        </button>
                        <button class="btn btn-xs bg-gradient-warning" data-toggle="modal" data-target="#edit-order" onclick="editOrder(<?= $order['id'] ?>)">

                            Edit
                        </button>

                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
