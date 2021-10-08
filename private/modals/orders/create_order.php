<div class="modal fade" id="new-order">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Place a new order</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form onsubmit="addNewOrder(event)">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="customer-name">Customer Name</label>
                        <input type="text" name="customer_name" class="form-control" id="customer-name" placeholder="Customer name">
                    </div>
                    <div class="form-group">
                        <label>
                            Order Items
                            <button type="button" class="btn btn-sm btn-success ml-1" onclick="addItemField()">
                                <i class="fa fa-plus"></i>
                            </button>
                        </label>
                        <div id="order-items">
                            <!-- ________________________________
                                #= All ordered items goes here
                            ________________________________ -->
                        </div>
                    </div>
                </div>
                <!-- /.modal-body -->

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn bg-gradient-secondary" data-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn bg-gradient-primary">
                        Add new order
                    </button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
