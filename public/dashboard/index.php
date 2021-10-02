<?php require_once('../../private/initialize.php'); ?>

<!-- #####=START Header=##### -->
<?php require_once(SHARED_PATH . '/dashboard_header.php'); ?>
<!-- #####=END Header=##### -->

<!-- #####=START Sidebar=##### -->
<?php require_once(SHARED_PATH . '/dashboard_sidebar.php'); ?>
<!-- #####=END Sidebar=##### -->

<div class="card-body">
    <table id="items-table" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Rendering engine</th>
                <th>Browser</th>
                <th>Platform(s)</th>
                <th>Engine version</th>
                <th>CSS grade</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Trident</td>
                <td>Internet
                    Explorer 4.0
                </td>
                <td>Win 95+</td>
                <td> 4</td>
                <td>X</td>
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
