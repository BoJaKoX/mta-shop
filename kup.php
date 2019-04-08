<?php
/*
    Autor: BoJaKoX <bojakox2@gmail.com>
    Automatyczny sklep w języku PHP dodający usługę premium w MySQL
    Plik: kup.php
    GitHub: https://github.com/BoJaKoX/mta-shop
*/

include 'header.php';
include 'system.php';

$login = $_POST['login'];

?>
<body>
<center>
<div id="main2">

    <form action="request_pay.php" method="POST">

        <p class="text"> Wybierz ilość punktów i metodę płatności. </p>

        <input type="hidden" name="nick" value="<?php echo $login; ?>">

        <select name="punkty" class="select">
            <option value="10"> 10 punktów premium </option>
            <option value="20"> 20 punktów premium </option>
            <option value="30"> 30 punktów premium </option>
        </select><br>

        <select name="method_pay" class="select">
            <option value="paypal"> PayPal </option>
            <option value="paysafecard"> PaySafeCard </option>
            <option value="tpay"> Tpay </option>
        </select><br>

        <input type="hidden" name="login" value="<?php echo $login;?>">

        <input type="submit" class="btn" value="Płacę teraz">

    </form>

</div>
</center>
</body>