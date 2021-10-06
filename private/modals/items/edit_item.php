<div class="modal fade" id="edit-item">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="item-name">Name</label>
                        <input type="text" name="item_name" class="form-control" id="item-name" placeholder="Item name" value="test">
                    </div>
                    <div class="form-group">
                        <label for="item-price">Price</label>
                        <input type="text" name="item_price" class="form-control" id="item-price" placeholder="Item price">
                    </div>
                    <div class="form-group">
                        <label for="item-unit-name">Unit name</label>
                        <input type="text" name="item_unit_name" class="form-control" id="item-unit-name" placeholder="Item unit name">
                    </div>
                </div>
                <!-- /.modal-body -->

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn bg-gradient-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-primary">Edit</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
