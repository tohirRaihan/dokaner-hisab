const viewDailySales = async() => {
    const date = document.getElementById('dailySale').value;
    console.log(date);
    await fetch(`../../data/sales/daily_sales.php?date=${date}`, {
        method: 'GET'
    })
        .then((res) => res.text())
        .then((data) => {
            document.getElementById('daily-sales').innerHTML = data;
        })
        .catch((error) => Swal.fire('Something went wrong', '', 'warning'));

    // Initiate data tabel for items
    $('#daily-sales-table').DataTable({
        responsive: true,
        autoWidth: false,
        language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ Items/page'
        }
    });
};
viewDailySales();

const saleDetails = (id) => {
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
