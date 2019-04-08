<?php
/*
    Autor: BoJaKoX <bojakox2@gmail.com>
    Automatyczny sklep w języku PHP dodający usługę premium w MySQL
    Plik: system.php - Dane do bazy danych MySQL, funkcje i klasy
	GitHub: https://github.com/BoJaKoX/mta-shop
*/

function Db($query)
{

    $db_host = 'mysql_host';
    $db_user = 'mysql_user';
    $db_pass = 'mysql_pass';
    $db_name = 'mysql_db_name';

    $db = new mysqli($db_host, $db_user, $db_pass, $db_name);

    $db->set_charset("utf8");
    
    $zapytanie = $db->query($query);

    return $zapytanie;

}

function NadajZakup($zapytanie)
{

    $db_host = 'mysql_host';
    $db_user = 'mysql_user';
    $db_pass = 'mysql_pass';
    $db_name = 'mysql_db_name';

    $db_nadawanie = new mysqli($db_host, $db_user, $db_pass, $db_name);

    $db_nadawanie->set_charset("utf8");
    
    $nadaj_zakup = $db_nadawanie->query($zapytanie);

    return true;

}

function CheckAccount($login)
{

    $send = Db("SELECT * FROM `gracze` WHERE nick = '$login'");

    $ile = mysqli_num_rows($send);

    if($ile == 1)
    {
        
        return $status = 'ok';

    }
    elseif($ile < 1)
    {

        return $status = 'fail';

    }
    elseif($ile > 1)
    {

        return $status = 'error';

    }

}

function GetAccountData($login)
{

    $get = Db("SELECT * FROM `gracze` WHERE nick = '$login'");

    $data = json_encode(mysqli_fetch_assoc($get));

    return $data;

}

?>