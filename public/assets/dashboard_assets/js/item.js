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

// find item with id ------------------------------------------------------
const findItem = (id) => {
    fetch(`../../data/items/find_item.php?id=${id}`)
        .then((res) => res.json())
        .then((data) => {
            const { name, price, unit_name } = data[0];
            document.querySelector('#edit-item #item-name').value = name;
            document.querySelector('#edit-item #item-price').value = price;
            document.querySelector('#edit-item #item-unit-name').value =
                unit_name;
        });
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
                .then((data) => console.log(data));
        });
};

// Events
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
