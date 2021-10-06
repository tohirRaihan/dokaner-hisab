<?php
require_once '../../../private/initialize.php';
$page_title = 'Orders';
$scripts    = [
    'order',
];
?>

<!-- #####=START Header=##### -->
<?php require_once SHARED_PATH . '/dashboard_header.php';?>
<!-- #####=END Header=##### -->

<!-- #####=START Sidebar=##### -->
<?php require_once SHARED_PATH . '/dashboard_sidebar.php';?>
<!-- #####=END Sidebar=##### -->

<!-- Main Content goes here -->
<div class="card-body">
    <button
        type="button"
        class="btn bg-gradient-success btn-sm"
        data-toggle="modal"
        data-target="#new-order"
    >
        New Order <i class="fa fa-plus-circle ml-1" aria-hidden="true"></i>
    </button>
    <button
        type="button"
        class="btn bg-gradient-purple btn-sm"
    >
        Claim <i class="fa fa-check-circle ml-1" aria-hidden="true"></i>
    </button>
    <button type="button" class="btn bg-gradient-danger btn-sm">
        Delete <i class="fa fa-trash ml-1" aria-hidden="true"></i>
    </button>
    <div id="all-orders" class="mt-3">
        <!-- ____________________________
            #= All orders goes here
        ____________________________ -->
    </div>
</div>
<!-- /.card-body -->

<!-- ########## START: MODALS ########## -->
<?php include_once PRIVATE_PATH . '/modals/items/create_item.php'?>
<?php include_once PRIVATE_PATH . '/modals/items/edit_item.php'?>
<!-- ########## END: MODALS ########## -->

<!-- #####=START FOOTER=##### -->
<?php require_once SHARED_PATH . '/dashboard_footer.php';?>
<!-- #####=END FOOTER=##### -->
