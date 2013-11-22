<?php
require_once 'kirjasto/toiminnot.php';
require_once 'kirjasto/elokuva.php';
saakoNahdaSivun();

$haettava = $_GET["id"];
$hakusana = $_GET["haku"];
$tulos = elokuva::haeElokuvaMuokattavaksi($haettava);
$ohjaajat = elokuva::haeOhjaajatMuokattavaksi($haettava);
$nayttelijat = elokuva::haeNayttelijatMuokattavaksi($haettava);
naytaNakyma("muokkausLomake.php", array('tulos' => $tulos,'hakusana' => $hakusana, 'ohjaajat' => $ohjaajat, 'nayttelijat' => $nayttelijat));
?>
