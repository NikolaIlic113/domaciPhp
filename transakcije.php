<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <title>Transakcije</title>
</head>

<body>

    <input type="hidden" value="">

    <div class="body-transakcije">

        <h3 id="transakcije-heading">TRANSAKCIJE</h3>
        <a href="dodaj_transakciju.php"><button class="btn btn-info" id="buttonadd">DODAJ</button></a>

        <div class="table-transakcije">
            <table class="table table-bordered border-info table-striped mt-3">
                <thead>
                    <tr class="text-center table-info">
                        <th>DATUM</th>
                        <th>TIP</th>
                        <th>VALUTA</th>
                        <th>IZNOS</th>
                        <th> </th>
                    </tr>
                </thead>

                <tbody class="text-center">

                    <?php
                    require('connection.php');

                    $clan = $_COOKIE['clan'];
                    $query = "SELECT * FROM transakcije WHERE transakcije.clan_id='" . $clan . "'";
                    $transakcije = $db_conn->query($query);


                    while ($transakcija = mysqli_fetch_array($transakcije)) {
                    ?>
                        <tr class="text-center">
                            <td><?php echo $transakcija['datum']; ?></td>
                            <td><?php echo $transakcija['tip'];  ?></td>
                            <td><?php echo $transakcija['valuta'];  ?></td>
                            <td><?php echo $transakcija['iznos'];  ?></td>
                            <td><button id="izbrisi_transakcijabutton" class="btn btn-info" transakcija_id="<?php echo $transakcija['id']; ?>">IZBRISI</button></td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>

            </table>
        </div>


    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>

<script>
    $(document).ready(function() {

        document.cookie = "clan = " + localStorage.clan

        if (window.localStorage) {
            if (!localStorage.getItem('firstLoad')) {
                localStorage['firstLoad'] = true;
                window.location.reload();
            } else
                localStorage.removeItem('firstLoad');
        }
    });
</script>