$(function () {
    login();
});

function login() {

    $(document).on('click', '#loginbutton', function () {

        $.ajax({
            url: 'ajax/login.php',
            method: 'POST',
            data: {
                username: $('#username').val(),
                password: $('#password').val()
            },
            success: function (data) {
                data = JSON.parse(data)

                if (data.result == 1) {
                    alert("Uspesan login!")
                    localStorage.setItem('clan', data.clan)
                    window.location.href = "transakcije.php";
                }
                else {
                    alert("Neuspesan login!")
                }
            }
        })
    })

}