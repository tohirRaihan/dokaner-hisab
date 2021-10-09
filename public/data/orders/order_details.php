<?php
require_once '../../../private/initialize.php';

use App\Item;
use App\Order;

$id    = $_GET['id'];
$order = Order::find($id);

// extracting all data
$customer_name        = $order['customer_name'];
$ordered_total_amount = $order['ordered_amount'];
$ordered_items        = json_decode($order['ordered_items'], true);
?>
<div class="order-detail-info">
    <i class="fa fa-chevron-right text-fuchsia" aria-hidden="true"></i> <span class="lead text-muted"><?= $customer_name ?></span>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Item name</th>
                <th class="text-center">Item price</th>
                <th class="text-center">Item quantity</th>
                <th class="text-center">Amount</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($ordered_items as $ordered_item) :
                $item = Item::find($ordered_item['itemId']);
            ?>
                <tr>
                    <td><?= $item['name'] ?></td>
                    <td class="text-center">
                        <span class="h5">&#2547;</span> <?= $item['price'] ?> <span class="text-muted"> / <?= $item['unit_name'] ?></span>
                    </td>
                    <td class="text-center">
                        <?= $ordered_item['itemQuantity'] ?>
                    </td>
                    <td class="text-center">
                        <span class="h5">&#2547;</span> <?= $item['price'] * $ordered_item['itemQuantity'] ?>
                    </td>
                </tr>
            <?php endforeach ?>

            <tr class="font-weight-bold">
                <td colspan="3" class="text-right">TOTAL</td>
                <td class="text-center">
                    <span class="h5">&#2547;</span> <?= $ordered_total_amount ?>
                </td>

            </tr>
        </tbody>
    </table>
</div>
