// get all orders ---------------------------------------------------------
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
                    <select class="select-item form-control item-name" name="item_name[]">
                        <option disabled selected>Select an item</option>
                        ${data.map(
                            (single) =>
                                `<option value=${single.id}>${single.name} (&#2547; ${single.price} / ${single.unit_name})</option>`
                        )}
                    </select>
                </div>
                <div class="col-4">
                    <div class="input-group">
                        <input type="text" name="item_quantity[]" class="form-control item-quantity" placeholder="Quantity">
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
    const element = event.target.closest('.form-row');
    element.parentNode.removeChild(element);
};

// place a new order ------------------------------------------------------
const addNewOrder = (event) => {
    event.preventDefault();
    const customerName = document.getElementById('customer-name');
    const itemNames = document.querySelectorAll('.item-name');
    const itemQuantitys = document.querySelectorAll('.item-quantity');

    // loop through to get all ordered items as an array of object
    const orderedItems = [];
    for (let i = 0; i < itemNames.length; i++) {
        orderedItems[i] = {
            itemId: itemNames[i].value,
            itemQuantity: itemQuantitys[i].value
        };
    }
    // making an object of all necessary data for the fetch method
    const data = {
        customerName: customerName.value,
        orderedItems: orderedItems
    };

    // the fetch method to make the ajax call and insert data into database
    fetch('../../data/orders/create_order.php', {
        method: 'POST',
        body: JSON.stringify(data),
        headers: {
            'Content-type': 'application/json' // sent request
        }
    })
        .then((res) => res.json())
        .then((data) => {
            console.log(data);
            if (data.status === 'success') {
                document.getElementById('order-items').textContent = '';
                customerName.value = '';
                getAllOrders();
                Swal.fire({
                    icon: 'success',
                    title: 'Item has beed added successfully'
                });
                $('#new-order').modal('hide');
            }
        })
        .catch((error) => Swal.fire('Something went wrong', '', 'warning'));
};
