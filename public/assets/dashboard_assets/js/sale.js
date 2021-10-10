const viewDailySales = () => {
    const date = document.getElementById('dailySale').value;
    console.log(date);
    fetch(`../../data/sales/daily_sales.php?date=${date}`, {
        method: 'GET'
    })
        .then((res) => res.text())
        .then((data) => {
            console.log(data);
        })
        .catch((error) => Swal.fire('Something went wrong', '', 'warning'));
};
viewDailySales();
