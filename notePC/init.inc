<?php
//
// カードid読むとこなどは、共用なので、インクルードして使おう。
//
$handle = fopen("/tmp/nfcid", "r");
$nfcid = substr(fgets($handle),-16);
fclose($handle);
$sei = htmlspecialchars($_POST['sei']);
$mei = htmlspecialchars($_POST['mei']);
$penname = htmlspecialchars($_POST['penname']);
$mail = htmlspecialchars($_POST['mail']);
$tel = mb_convert_kana(htmlspecialchars($_POST['tel']),"arns");
$age = mb_convert_kana(htmlspecialchars($_POST['age']),"arns");
$sex = htmlspecialchars($_POST['sex']);
$birthy = htmlspecialchars($_POST['birthy']);
$place = htmlspecialchars($_POST['place']);
$postal = htmlspecialchars($_POST['postal']);
?>
