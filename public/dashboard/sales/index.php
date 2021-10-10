<?php
require_once '../../../private/initialize.php';
$page_title = 'Sales';
$scripts    = [
    'sale',
];
?>

<!-- #####=START Header=##### -->
<?php require_once SHARED_PATH . '/dashboard_header.php'; ?>
<!-- #####=END Header=##### -->

<!-- #####=START Sidebar=##### -->
<?php require_once SHARED_PATH . '/dashboard_sidebar.php'; ?>
<!-- #####=END Sidebar=##### -->

<!-- Main Content goes here -->
<div class="card-body">
    Daily Sales:
<input onchange="viewDailySales()" id="dailySale" type="date" class="btn btn-default btn-sm" value="<?= date('Y-m-d'); ?>">

    <div id="daily-sales" class="mt-3">
        <!-- ____________________________
            #= All sales goes here
        ____________________________ -->
    </div>
</div>
<!-- /.card-body -->

<!-- ########## START: MODALS ########## -->
<?php include_once PRIVATE_PATH . '/modals/orders/order_details.php' ?>
<!-- ########## END: MODALS ########## -->

<!-- #####=START FOOTER=##### -->
<?php require_once SHARED_PATH . '/dashboard_footer.php'; ?>
<!-- #####=END FOOTER=##### -->
