<?php
require_once '../../../private/initialize.php';

use App\Sale;

$date               = $_GET['date'];
$sales              = Sale::dailySales($date);
$daily_sales_amount = 0;
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
            <h1 class="display-5">Daily Sales Report</h1>
            <h2>as of</h2>
            <h3><?= $date ?></h3>
        </div>
        <!-- daily sales report goes here -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th class="text-center">Order Time</th>
                    <th class="text-center">Payment Time</th>
                    <th class="text-center">Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sales as $sale) :
                    // extracting information
                    $order_id       = $sale['order_id'];
                    $customer_name  = $sale['customer_name'];
                    $order_time     = $sale['ordered_at'];
                    $payment_time   = $sale['paid_at'];
                    $ordered_amount = $sale['ordered_amount'];
                    $daily_sales_amount += $ordered_amount;
                ?>
                    <tr>
                        <td><?= $customer_name ?></td>
                        <td class="text-center"><?= $order_time ?></td>
                        <td class="text-center"><?= $payment_time ?></td>
                        <td class="text-center"><span class="h5">&#2547;</span> <?= $ordered_amount ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" class="text-right">TOTAL</th>
                    <th class="text-center">
                        <span class="h5">&#2547;</span> <?= $daily_sales_amount ?>
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- script fot printing options -->
    <script>
        print();
    </script>
</body>

</html>
