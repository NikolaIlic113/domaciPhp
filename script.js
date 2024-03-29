$(function () {
    login();
    izbrisiTransakcija();
    pretraziTransakcija();
    sortiraj();
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

function izbrisiTransakcija() {

    $(document).on('click', '#izbrisi_transakcijabutton', function () {

        $.ajax({
            url: 'ajax/izbrisi_transakciju.php',
            method: 'POST',
            data: {
                transakcija_id: $(this).attr('transakcija_id'),
            }
        })
    })

}

function pretraziTransakcija() {

    $(document).on('keyup', '#datum_input', function () {

        $.ajax({
            url: 'ajax/pretrazi_transakciju.php',
            method: 'POST',
            data: {
                datum: $(this).val(),
                clan_id: localStorage.getItem('clan')
            },
            success: function (data) {
                $('#body_tabela').html(data)
            }
        })
    })

}

function sortiraj() {

    $(document).on('click', 'th', function () {

        if (($(this).attr("sortiranje"))) {

            $.ajax({
                url: 'ajax/sortiraj_transakcije.php',
                method: 'POST',
                data: {
                    datum: $(this).val(),
                    clan_id: localStorage.getItem('clan'),
                    sortiranje: $(this).attr("sortiranje")
                },
                success: function (data) {
                    $('#body_tabela').html(data)
                }
            })
        } else {
            alert("Sortiranje je moguce samo po iznosu!")
        }

        $(this).attr("sortiranje") == "DESC" ? $(this).attr("sortiranje", "ASC") : $(this).attr("sortiranje", "DESC")

    })

}