</div>
<!-- /.card -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- ########## START: MODALS ########## -->
<?php include_once PRIVATE_PATH . '/modals/users/change_password.php' ?>
<!-- ########## END: MODALS ########## -->

<footer class="main-footer text-center">
    <strong>Copyright &copy; <?= date('Y') ?> <a href="#">Dokaner Hisab</a></strong> All rights reserved. Developed by <strong><a target="_blank" href="https://github.com/tohirRaihan">Tohir Raihan</a></strong>
</footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= url_for('assets/dashboard_assets/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= url_for('assets/dashboard_assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- Data table -->
<script src="<?= url_for('assets/dashboard_assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= url_for('assets/dashboard_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<!-- Sweet alert 2 -->
<script src="http://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= url_for('assets/dashboard_assets/js/adminlte.min.js') ?>"></script>
<!-- Custom Script -->
<script src="<?= url_for('assets/dashboard_assets/js/custom.js') ?>"></script>
<!-- File specific Scripts -->
<?php
if (isset($scripts)) {
    load_scripts(url_for('assets/dashboard_assets/js/'), $scripts);
}
?>

</body>

</html>
