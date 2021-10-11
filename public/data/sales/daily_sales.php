<?php
require_once '../../../private/initialize.php';

use App\Sale;

$date = $_GET['date'];
$sales = Sale::dailySales($date);
$daily_sales_amount = 0;
?>
<table id="daily-sales-table" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Customer Name</th>
            <th class="text-center">Order Received</th>
            <th class="text-center">Payment Received</th>
            <th class="text-center">Amount</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($sales as $sale) :
            // extracting information
            $order_id = $sale['order_id'];
            $customer_name = $sale['customer_name'];
            $order_time = $sale['ordered_at'];
            $payment_time = $sale['paid_at'];
            $ordered_amount = $sale['ordered_amount'];
            $daily_sales_amount += $ordered_amount;
        ?>
            <tr>
                <td><?= $customer_name ?></td>
                <td class="text-center"><?= $order_time ?></td>
                <td class="text-center"><?= $payment_time ?></td>
                <td class="text-center"><span class="h5">&#2547;</span> <?= $ordered_amount ?></td>
                <td class="text-center">
                    <button class="btn btn-xs bg-gradient-primary" data-toggle="modal" data-target="#order-details" onclick="saleDetails(<?= $order_id ?>)">
                        Details
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3" class="text-right">TOTAL</th>
            <th class="text-center">
                <span class="h5">&#2547;</span> <?= $daily_sales_amount ?>
            </th>
            <th></th>
        </tr>
    </tfoot>
</table>
