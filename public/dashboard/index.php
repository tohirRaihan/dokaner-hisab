<?php
require_once '../../private/initialize.php';

use App\Order;
use App\User;

User::auth();
$page_title = 'Dashboard';

$last_day_orders   = Order::lastDayOrders();
$last_month_orders = Order::lastMonthOrders();
?>

<!-- #####=START Header=##### -->
<?php require_once SHARED_PATH . '/dashboard_header.php'; ?>
<!-- #####=END Header=##### -->

<!-- #####=START Sidebar=##### -->
<?php require_once SHARED_PATH . '/dashboard_sidebar.php'; ?>
<!-- #####=END Sidebar=##### -->

<!-- Main Content goes here -->
<div class="card-body">
    <div class="row">
        <div class="col-md-3">
            <div class="small-box bg-lightblue">
                <div class="inner">
                    <h3><?= $last_day_orders['last_day_orders'] ?></h3>

                    <p>Last day Orders</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-pink">
                <div class="inner">
                    <h3>&#2547; <?= $last_day_orders['last_day_total'] ?></h3>
                    <p>Last day Amount</p>
                </div>
                <div class="icon">
                    <i class="ion ion-cash"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-olive">
                <div class="inner">
                    <h3><?= $last_month_orders['last_month_orders'] ?></h3>

                    <p>Last month Orders</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3>&#2547; <?= $last_month_orders['last_month_total'] ?></h3>

                    <p>Last month Amount</p>
                </div>
                <div class="icon">
                    <i class="ion ion-cash"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- /.card-body -->

<!-- #####=START FOOTER=##### -->
<?php require_once SHARED_PATH . '/dashboard_footer.php'; ?>
<!-- #####=END FOOTER=##### -->
