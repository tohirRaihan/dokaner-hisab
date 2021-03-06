<?php
require_once('../../../private/initialize.php');

use App\User;

User::auth();
$page_title = 'Items';
$scripts = [
    'item'
];
?>

<!-- #####=START Header=##### -->
<?php require_once(SHARED_PATH . '/dashboard_header.php'); ?>
<!-- #####=END Header=##### -->

<!-- #####=START Sidebar=##### -->
<?php require_once(SHARED_PATH . '/dashboard_sidebar.php'); ?>
<!-- #####=END Sidebar=##### -->

<!-- Main Content goes here -->
<div class="card-body">
    <button id="new-item" type="button" class="btn bg-gradient-success btn-sm" data-toggle="modal" data-target="#add-new-item">
        New Item <i class="fa fa-plus-circle ml-2" aria-hidden="true"></i>
    </button>
    <div id="all-items" class="mt-3">
        <!-- ____________________________
            #= All items goes here
        ____________________________ -->
    </div>
</div>
<!-- /.card-body -->

<!-- ########## START: MODALS ########## -->
<?php include_once PRIVATE_PATH . '/modals/items/create_item.php' ?>
<?php include_once PRIVATE_PATH . '/modals/items/edit_item.php' ?>
<!-- ########## END: MODALS ########## -->

<!-- #####=START FOOTER=##### -->
<?php require_once(SHARED_PATH . '/dashboard_footer.php'); ?>
<!-- #####=END FOOTER=##### -->
