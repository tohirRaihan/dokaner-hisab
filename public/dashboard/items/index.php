<?php
require_once('../../../private/initialize.php');
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
    <button id="new-item" type="button" class="btn bg-gradient-success btn-sm font-weight-bold">
        New Item <i class="fa fa-plus-circle ml-2" aria-hidden="true"></i>
    </button>
    <div id="all-items" class="mt-3">
        <!-- ____________________________
            #= All items goes here
        ____________________________ -->
    </div>
</div>
<!-- /.card-body -->

<!-- #####=START FOOTER=##### -->
<?php require_once(SHARED_PATH . '/dashboard_footer.php'); ?>
<!-- #####=END FOOTER=##### -->
