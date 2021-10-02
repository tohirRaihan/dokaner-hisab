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
    <div id="all-items">
        <!-- ____________________________
            #= All items goes here
        ____________________________ -->
    </div>
</div>
<!-- /.card-body -->

<?php
$custom_script = '
    <script>
        $(function() {
            $("#items-table").DataTable({
                "responsive": true,
                "autoWidth": false,
                language: {
                    searchPlaceholder: "Search...",
                    sSearch: "",
                    lengthMenu: "_MENU_ Items/page",
                }
            })
        });
    </script>
';
?>

<!-- #####=START FOOTER=##### -->
<?php require_once(SHARED_PATH . '/dashboard_footer.php'); ?>
<!-- #####=END FOOTER=##### -->
