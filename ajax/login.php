<?php


require('../connection.php');


$query = "SELECT * FROM clanovi";
$clanovi = $db_conn->query($query);

$postoji = 0;
$userId = '';

while ($clan = mysqli_fetch_array($clanovi)) {

    if ($clan['username'] == $_POST['username']) {

        if ($clan['password'] == $_POST['password']) {
            $postoji = 1;
            $clanId = $clan['id'];
            break;
        }
    }
}

$res = [
    'result' => $postoji,
    'clan' => $clanId
];

echo json_encode($res);