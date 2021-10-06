</div>
<!-- /.card -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0-rc
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
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
<!-- File specific Scripts -->
<?php
if (isset($scripts)) {
    load_scripts(url_for('assets/dashboard_assets/js/'), $scripts);
}
if (isset($custom_script)) {
    load_custom_script($custom_script);
}
?>

</body>

</html>
