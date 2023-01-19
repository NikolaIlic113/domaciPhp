<?php


require('../connection.php');



$query = "SELECT * FROM transakcije WHERE clan_id=" . $_POST['clan_id'] .
    " ORDER BY iznos " . $_POST['sortiranje'];
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