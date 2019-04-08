<?php

$ile_punktow_zamawia = $_POST['punkty'];

$zamawiajacy = $_POST['login'];
/*
Tutaj możesz ustalić cenę punktów 
*/
$cena_koncowa = 0.25 * $ile_punktow_zamawia; // 0.25 cena punktow

$dane_platnosci = json_encode(array(
    'punkty' => $ile_punktow_zamawia,
    'nick' => $zamawiajacy, 
));

$curl = curl_init();

$amount = $cena_koncowa;
$api_key = "klucz_api";
$method = $_POST['method_pay'];
$return_url = "adres strony jeżeli płatność się powiedzie";
$cancel_url = "adres strony jeżeli płatność zostanie anulowana";
$description = $dane_platnosci;

$request = compact("amount","api_key","method","return_url","cancel_url", "description");

curl_setopt_array($curl, array(
CURLOPT_URL => "https://admin.serverproject.eu/api/public/wallet/togate",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_POSTFIELDS => json_encode($request),
CURLOPT_HTTPHEADER => array("Cache-Control: no-cache", "Content-Type: application/json"),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
die("cURL Error #:".$err);
}
$result = json_decode($response);
if (isset($result->url)) {
header('Location: '.$result->url);
die();
}
echo $response;