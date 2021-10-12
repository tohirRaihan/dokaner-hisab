// change password --------------------------------------------------------
const changePassword = (event) => {
    event.preventDefault();
    // setting url for ajax call
    const location = window.location.href;
    const url = location.substring(0, location.lastIndexOf('public') + 7)+'data/users/change_password.php';

    const newPassword = document.getElementById('new-password').value;
    const confirmPassword = document.getElementById('confirm-password').value;

    if (newPassword === confirmPassword) {
        fetch(url, {
            method: 'POST',
            body: newPassword,
            headers: {
                'Content-type': 'application/json' // sent request
            }
        })
            .then((res) => res.json())
            .then((data) => {
                if (data.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Password Changed Successfully!'
                    });
                    $('#change-password').modal('hide');
                }
            })
            .catch((error) => Swal.fire('Something went wrong', '', 'warning'));
    } else {
        swal.fire("Password didn't match!", '', 'warning');
    }
};
