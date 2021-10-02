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
    <table id="items-table" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th class="text-center">price /kg</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Rice</td>
                <td class="text-center">55</td>
                <td class="text-center">
                    <div class="btn-group" role="group">
                        <button class="btn btn-xs bg-gradient-warning">Edit</button>
                        <button class="btn btn-xs bg-gradient-danger">Delete</button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<!-- /.card-body -->

<?php
$custom_script = '
    <script>
        $(function() {
            $("#items-table").DataTable({
                "responsive": true,
                "autoWidth": false,
            })
        });
    </script>
';
?>

<!-- #####=START FOOTER=##### -->
<?php require_once(SHARED_PATH . '/dashboard_footer.php'); ?>
<!-- #####=END FOOTER=##### -->
