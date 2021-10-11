<?php
require_once '../../../private/initialize.php';

use App\Item;
use App\Order;

$id    = $_GET['id'];
$order = Order::find($id);

// extracting all data
$customer_name        = $order['customer_name'];
$ordered_total_amount = $order['ordered_amount'];
$order_received       = $order['created_at'];
$ordered_items        = json_decode($order['ordered_items'], true);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dokaner Hisab</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= url_for('assets/dashboard_assets/css/adminlte.min.css') ?>" />
</head>

<body>

    <div class="container my-5">
        <div class="report-heading text-center">
            <h1 class="display-5">Order Details Report</h1>
            <!-- <h1 class="display-5">OF</h1> -->
            <span class="lead"><?= $customer_name ?></span><br>
            <span class="lead">(<?= $order_received ?>)</span>

        </div>
        <div class="order-detail-info">
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
                        $item           = Item::find($ordered_item['itemId']);
                        $item_name      = $item['name'] ?? 'unknown';
                        $item_price     = (int) ($item['price'] ?? 'unknown');
                        $item_unit_name = $item['unit_name'] ?? 'unknown';
                        $item_quantity  = (int) $ordered_item['itemQuantity'];
                        $item_amount    = $item_price * $item_quantity;
                    ?>
                        <tr>
                            <td><?= $item_name ?></td>
                            <td class="text-center">
                                <span class="h5">&#2547;</span> <?= $item_price == 0 ? 'unknown' : $item_price ?> <span class="text-muted"> / <?= $item_unit_name ?></span>
                            </td>
                            <td class="text-center">
                                <?= $ordered_item['itemQuantity'] ?>
                            </td>
                            <td class="text-center">
                                <span class="h5">&#2547;</span> <?= $item_amount == 0 ? 'unknown' : $item_amount ?>
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


    </div>



    <!-- script fot printing options -->
    <script>
        print();
    </script>
</body>

</html>
