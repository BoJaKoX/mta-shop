<?php

if ($_SERVER['REMOTE_ADDR'] !== '94.23.88.237') {
die('Brak uprawnień');
}

include 'system.php';

$data = filter_input_array(INPUT_POST);

$from_webhook = json_decode($data['description'], true);

$punkty_zamowione = $from_webhook['punkty'];

$kto_zamowil = $from_webhook['nick'];

$zapytanie = "UPDATE `gracze` SET `pp` = `pp` + '$punkty_zamowione' WHERE `nick` = '$kto_zamowil';"; // jeżeli używasz własną bazę danych zmień zapytanie :)

$wykonaj = NadajZakup($zapytanie);