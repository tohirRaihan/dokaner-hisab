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

const addNewItem = () => {
    const jsObject = {
        name: 'Tohir',
         age:30
    };
    const jsonData = JSON.stringify(jsObject);
    console.log(jsonData);
    fetch('../../data/items/create_item.php', {
        method: 'POST',
        // mode: 'cors',
        headers: {
            'Content-type': 'application/json', // sent request
            // 'Content-type': 'application/x-www-form-urlencoded', // sent request
            // 'Accept': 'application/json' // expected data sent back
        },
        // body: 'testing'
        body: "email=test@example.com&password=pw"
    })
        .then((res) => res.text())
        .then((data) => console.log(data))
        .catch((error) => console.log(error));

};
document.getElementById('new-item').addEventListener('click', () => {
    addNewItem();
})
