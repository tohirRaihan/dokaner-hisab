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
