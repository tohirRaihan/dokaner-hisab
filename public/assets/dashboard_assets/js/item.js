//function for data fetching
const fetchedData = async (url) => {
    const response = await fetch(url);
    const data = await response.text();
    return data;
};
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
