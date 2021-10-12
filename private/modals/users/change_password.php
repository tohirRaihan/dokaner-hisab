<div class="modal fade" id="change-password">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Change user password</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form onsubmit="changePassword(event)">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="new-password">Password</label>
                        <input type="password" name="new-password" class="form-control" id="new-password" placeholder="New password">
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Confirm</label>
                        <input type="password" name="confirm-password" class="form-control" id="confirm-password" placeholder="Confirm password">
                    </div>
                </div>
                <!-- /.modal-body -->

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn bg-gradient-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-success">Save Changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
