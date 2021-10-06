// get all orders ----------------------------------------------------------
const getAllOrders = async () => {
    await fetch('../../data/orders/all_orders.php')
        .then((res) => res.text())
        .then((data) => {
            document.getElementById('all-orders').innerHTML = data;
        });
    // Initiate data tabel for items
    $('#orders-table').DataTable({
        responsive: true,
        autoWidth: false,
        language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ Items/page'
        }
    });
};
getAllOrders();

// add item field in ordered items ----------------------------------------
const addItemField = async () => {
    const orderItems = document.getElementById('order-items');
    const div = document.createElement('div');
    div.classList.add('form-row', 'mb-2');

    await fetch('../../data/orders/all_items.php')
        .then((res) => res.json())
        .then((data) => {
            div.innerHTML = `
                <div class="col-8">
                    <select class="select-item form-control" name="item_name[]">
                        <option disabled selected>Select an item</option>
                        ${data.map(
                            (single) =>
                                `<option value=${single.id}>${single.name} (&#2547; ${single.price} / ${single.unit_name})</option>`
                        )}
                    </select>
                </div>
                <div class="col-4">
                    <div class="input-group">
                        <input type="text" name="item_quantity[]" class="form-control" placeholder="Quantity">
                        <button type="button" onclick="removeItem(event)" class="btn btn-danger rounded-0"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
            `;
        });
    orderItems.appendChild(div);
    // initialize select2 plugin
    $(document).ready(function () {
        $('.select-item').select2();
    });
};

// remove item field from ordered items -----------------------------------
const removeItem = (event) => {
    let element;
    if (event.target.childNodes.length) {
        element = event.target.parentNode.parentNode.parentNode;
    } else {
        element = event.target.parentNode.parentNode.parentNode.parentNode;
    }
    element.parentNode.removeChild(element);
};
