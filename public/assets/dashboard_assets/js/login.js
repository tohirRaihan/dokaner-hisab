
const logIn = (event) => {
    event.preventDefault();
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const data = {
        email: email,
        password: password
    };
    console.log(email, password);

    fetch('../data/users/login.php', {
        method: 'POST',
        body: JSON.stringify(data),
        headers: {
            'Content-type': 'application/json' // sent request
        }
    })
        .then((res) => res.json())
        .then((data) => {
            console.log(data);
            if (data.status === 'success') {
                window.location = data.url;
                Swal.fire({
                    icon: 'success',
                    title: 'Welcome to DOKANER HISAB!'
                });
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Error!',
                    text: 'User email/password does not match'
                });
            }
        })
        .catch((error) => Swal.fire('Something went wrong', '', 'warning'));
};
