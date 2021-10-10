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
const addItemField = async (event) => {
    const orderItems = event.target
        .closest('.form-group')
        .querySelector('#order-items');
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
                                `<option value="${single.id}">${single.name} (&#2547; ${single.price} / ${single.unit_name})</option>`
                        )}
                    </select>
                </div>
                <div class="col-4">
                    <div class="input-group">
                        <input type="text" name="item_quantity[]" class="form-control item-quantity" placeholder="Quantity">
                        <button type="button" onclick="removeItemField(event)" class="btn btn-danger rounded-0"><i class="fa fa-minus"></i></button>
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
const removeItemField = (event) => {
    const element = event.target.closest('.form-row');
    element.parentNode.removeChild(element);
};

// place a new order ------------------------------------------------------
const addNewOrder = (event) => {
    event.preventDefault();
    const customerName = document.getElementById('customer-name');
    const itemNames = document.querySelectorAll('#new-order .item-name');
    const itemQuantitys = document.querySelectorAll(
        '#new-order .item-quantity'
    );

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

// find order by id
const findOrder = (id) => {
    fetch(`../../data/orders/find_order.php?id=${id}`)
        .then((res) => res.json())
        .then((data) => {
            const customerName = data.customer_name;
            const orderedItems = JSON.parse(data.ordered_items);
            document.querySelector('#edit-order #customer-name').value =
                customerName;
            // recieving and setting alreaady added items
            const orderItemsContainer = document.querySelector(
                '#edit-order #order-items'
            );
            orderItemsContainer.textContent = '';
            // loopthrough the items
            orderedItems.forEach(async (orderItem) => {
                const div = document.createElement('div');
                div.classList.add('form-row', 'mb-2');
                await fetch('../../data/orders/all_items.php')
                    .then((res) => res.json())
                    .then((data) => {
                        div.innerHTML = `
                            <div class="col-8">
                                <select class="select-item form-control item-name" name="item_name[]">
                                    <option disabled>Select an item</option>
                                    ${data.map(
                                        (single) =>
                                            `<option ${
                                                single.id === orderItem.itemId
                                                    ? 'selected'
                                                    : ''
                                            } value=${single.id}>${
                                                single.name
                                            } (&#2547; ${single.price} / ${
                                                single.unit_name
                                            })</option>`
                                    )}
                                </select>
                            </div>
                            <div class="col-4">
                                <div class="input-group">
                                    <input type="text" name="item_quantity[]" class="form-control item-quantity" placeholder="Quantity" value=${
                                        orderItem.itemQuantity
                                    }>
                                    <button type="button" onclick="removeItemField(event)" class="btn btn-danger rounded-0"><i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                        `;
                    });
                orderItemsContainer.appendChild(div);
                // initialize select2 plugin
                $(document).ready(function () {
                    $('.select-item').select2();
                });
            });
        });
};

// edit order
const editOrder = (id) => {
    findOrder(id);
    // operation for edit orders
    $('#edit-order')
        .off('submit', '**')
        .on('submit', 'form', function (event) {
            event.preventDefault();
            const customerName = document.querySelector(
                '#edit-order #customer-name'
            );
            const itemNames = document.querySelectorAll(
                '#edit-order .item-name'
            );
            const itemQuantitys = document.querySelectorAll(
                '#edit-order .item-quantity'
            );

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
                id: id,
                customerName: customerName.value,
                orderedItems: orderedItems
            };
            // the fetch method to make the ajax call and insert data into database
            fetch('../../data/orders/update_order.php', {
                method: 'PUT',
                body: JSON.stringify(data),
                headers: {
                    'Content-type': 'application/json' // sent request
                }
            })
                .then((res) => res.json())
                .then((data) => {
                    if (data.status === 'success') {
                        getAllOrders();
                        Swal.fire({
                            icon: 'success',
                            title: 'Item has beed edited successfully'
                        });
                        $('#edit-order').modal('hide');
                    }
                })
                .catch((error) =>
                    Swal.fire('Something went wrong', '', 'warning')
                );
        });
};

// claim order with checkbox
const claimOrder = () => {
    const checkedBoxes = document.querySelectorAll(
        'input[type=checkbox]:checked'
    );
    if (!checkedBoxes.length) {
        Swal.fire('Ops!', 'Please select order before claim it', 'error');
        return;
    }
    // confirmation of order claiming
    Swal.fire({
        title: 'Did you claim the orders?',
        icon: 'question',
        showCancelButton: true,
        cancelButtonColor: '#dc3545',
        confirmButtonColor: '#28a745',
        confirmButtonText: 'Yes, claimed it!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            // main delete operation goes here
            checkedBoxes.forEach((checkedBox) => {
                fetch(
                    `../../data/orders/claim_order.php?id=${checkedBox.value}`,
                    {
                        method: 'GET'
                    }
                )
                    .then((res) => res.json())
                    .then((data) => {
                        if (data.status === 'success') {
                            getAllOrders();
                            Swal.fire({
                                title: 'Claimed!',
                                text: 'Your orders has been Claimed.',
                                icon: 'success',
                                confirmButtonColor: '#28a745'
                            });
                        }
                    })
                    .catch((error) =>
                        Swal.fire('Something went wrong', '', 'warning')
                    );
            });
        }
    });
};

// order details ----------------------------------------------------------
const orderDetails = (id) => {
    const orderDetails = document.querySelector('#order-details .modal-body');
    fetch(`../../data/orders/order_details.php?id=${id}`, {
        method: 'GET'
    })
        .then((res) => res.text())
        .then((data) => {
            orderDetails.innerHTML = data;
        })
        .catch((error) => Swal.fire('Something went wrong', '', 'warning'));
};

// delete order with checkbox ---------------------------------------------
const deleteOrder = () => {
    const checkedBoxes = document.querySelectorAll(
        'input[type=checkbox]:checked'
    );
    if (!checkedBoxes.length) {
        Swal.fire('Ops!', 'Please select order before delete', 'error');
        return;
    }
    // confirmation of delete
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#28a745',
        confirmButtonColor: '#dc3545',
        confirmButtonText: 'Yes, delete it!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            // main delete operation goes here
            checkedBoxes.forEach((checkedBox) => {
                fetch(
                    `../../data/orders/delete_order.php?id=${checkedBox.value}`,
                    {
                        method: 'DELETE'
                    }
                )
                    .then((res) => res.json())
                    .then((data) => {
                        if (data.status === 'success') {
                            getAllOrders();
                            Swal.fire({
                                title: 'Deleted!',
                                text: 'Your orders has been deleted.',
                                icon: 'success',
                                confirmButtonColor: '#28a745'
                            });
                        }
                    })
                    .catch((error) =>
                        Swal.fire('Something went wrong', '', 'warning')
                    );
            });
        }
    });
};
