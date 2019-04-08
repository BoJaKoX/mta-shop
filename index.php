<?php
/*
    Autor: BoJaKoX <bojakox2@gmail.com>
    Automatyczny sklep w języku PHP dodający usługę premium w MySQL
    Plik: index.php
    GitHub: https://github.com/BoJaKoX/mta-shop
*/

include 'header.php';
include 'system.php';

$error = '';

if($_POST['check_acc'])
{

    $login = htmlspecialchars($_POST['login']);

    $wynikZmysql = CheckAccount($login);

    if($wynikZmysql == 'ok')
    {

        $pobierz_teraz_konto = json_decode(GetAccountData($login), true);

        ?>
        <center>
        <div id="konto">

            <p class="nav-text"> Konto: <?php echo $pobierz_teraz_konto['nick']; ?> </p>

            <p class="text"> Punktów premium: <?php echo $pobierz_teraz_konto['pp']; ?> </p>

            <p class="text"> Premium do: <?php echo $pobierz_teraz_konto['premium']; ?> </p>

            <form method="POST" action="kup.php">

                <input type="hidden" name="login" value="<?php echo $pobierz_teraz_konto['nick']; ?>">

                <input type="submit" class="btn" name="to_pay" value="Doładuj konto">

            </form>

        </div>
        </center>
        <?php

    }
    else
    {
    echo '<center><p class="alert error"> Nie ma takiego użytkownika w bazie danych.</p></center>';
    echo '<head><meta http-equiv="refresh" content="2; URL=index.php"></head>';
    }
}
else
{
?>
<body>

    <div id="main">

        <p class="nav-text">Nazwa serwera / logo</p>

        <p class="text"> Witaj w naszym sklepie premium! </p>

        <div id="auth">

            <p class="text">Wpisz swój login aby odnaleźć konto w bazie danych.</p>
            
            <div id="form">

                <form action="" method="POST">
                 
                    <input type="text" class="textbox" id="login" name="login" placeholder="Wpisz login" required><br>

                    <input type="submit" class="btn" id="check_acc" name="check_acc" value="Szukaj">

                </form>

            </div>

        </div>

    </div>

</body>
<?php

}
?>
</html>