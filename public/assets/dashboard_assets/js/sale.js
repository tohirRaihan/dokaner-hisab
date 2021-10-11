// load daily sales in data table -----------------------------------------
const viewDailySales = async () => {
    const date = document.getElementById('dailySale').value;
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

// sale details -----------------------------------------------------------
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

    // print ordered details
    $('#order-details')
        .off('click')
        .on('click', '#print-order-details', () => {
            window.open(
                `../../data/print/order_details.php?id=${id}`,
                'name',
                'width=600,height=400'
            );
        });
};

// print daily sales report -----------------------------------------------
const printDailySales = () => {
    const date = document.getElementById('dailySale').value;
    window.open(
        '../../data/print/daily_sales.php?date=' + date,
        'name',
        'width=600,height=400'
    );
};
