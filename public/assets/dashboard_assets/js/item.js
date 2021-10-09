// get all items ----------------------------------------------------------
const getAllItems = async () => {
    await fetch('../../data/items/all_items.php')
        .then((res) => res.text())
        .then((data) => {
            document.getElementById('all-items').innerHTML = data;
        });
    // Initiate data tabel for items
    $('#items-table').DataTable({
        responsive: true,
        autoWidth: false,
        language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ Items/page'
        }
    });
};
getAllItems();

// find item by id ------------------------------------------------------
const findItem = (id) => {
    fetch(`../../data/items/find_item.php?id=${id}`)
        .then((res) => res.json())
        .then((data) => {
            const { name, price, unit_name } = data;
            document.querySelector('#edit-item #item-name').value = name;
            document.querySelector('#edit-item #item-price').value = price;
            document.querySelector('#edit-item #item-unit-name').value =
                unit_name;
        });
};

// add new item -----------------------------------------------------------
const addNewItem = (data) => {
    fetch('../../data/items/create_item.php', {
        method: 'POST',
        body: data,
        headers: {
            'Content-type': 'application/json' // sent request
        }
    })
        .then((res) => res.json())
        .then((data) => {
            if (data.status === 'success') {
                getAllItems();
                // alert('Item added successfully!!');
                Swal.fire({
                    icon: 'success',
                    title: 'Item has beed added successfully'
                });
                $('#add-new-item').modal('hide');
            }
        })
        .catch((error) => Swal.fire('Something went wrong', '', 'warning'));
};

// edit item --------------------------------------------------------------
const editItem = (id) => {
    // find item and set the values in input fields
    findItem(id);

    $('#edit-item')
        .off('submit', '**')
        .on('submit', 'form', function (event) {
            event.preventDefault();
            // data in json format
            let data = {
                id: id,
                name: document.querySelector('#edit-item #item-name').value,
                price: document.querySelector('#edit-item #item-price').value,
                unitName: document.querySelector('#edit-item #item-unit-name')
                    .value
            };
            data = JSON.stringify(data);
            // using fetch to edit data
            fetch('../../data/items/update_item.php', {
                method: 'PUT',
                body: data,
                headers: {
                    'Content-type': 'application/json' // sent request
                }
            })
                .then((res) => res.json())
                .then((data) => {
                    if (data.status === 'success') {
                        getAllItems();
                        // alert('Item edited successfully!!');
                        Swal.fire({
                            icon: 'success',
                            title: 'Item has beed edited successfully'
                        });
                        $('#edit-item').modal('hide');
                    }
                })
                .catch((error) =>
                    Swal.fire('Something went wrong', '', 'warning')
                );
        });
};

// delete item ------------------------------------------------------------
const deleteItem = (id) => {
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
            fetch(`../../data/items/delete_item.php?id=${id}`, {
                method: 'DELETE'
            })
                .then((res) => res.json())
                .then((data) => {
                    if (data.status === 'success') {
                        getAllItems();
                        Swal.fire({
                            title: 'Deleted!',
                            text: 'Your item has been deleted.',
                            icon: 'success',
                            confirmButtonColor: '#28a745'
                        });
                    }
                })
                .catch((error) =>
                    Swal.fire('Something went wrong', '', 'warning')
                );
        }
    });
};

// Event for add new item
document
    .querySelector('#add-new-item form')
    .addEventListener('submit', (event) => {
        event.preventDefault();
        const itemName = document.getElementById('item-name');
        const itemPrice = document.getElementById('item-price');
        const itemUnitName = document.getElementById('item-unit-name');
        const data = {
            name: itemName.value,
            price: itemPrice.value,
            unitName: itemUnitName.value
        };
        addNewItem(JSON.stringify(data));
        itemName.value = '';
        itemPrice.value = '';
        itemUnitName.value = '';
    });
