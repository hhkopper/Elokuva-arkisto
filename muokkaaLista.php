<?php
require_once 'kirjasto/toiminnot.php';
require_once 'kirjasto/elokuva.php';
saakoNahdaSivun();

$hakusana = false;
$haettava = $_GET["id"];
$tulos = elokuva::haeElokuvaMuokattavaksi($haettava);
$ohjaajat = elokuva::haeOhjaajatMuokattavaksi($haettava);
$nayttelijat = elokuva::haeNayttelijatMuokattavaksi($haettava);

naytaNakyma("muokkausLomake.php", array('tulos' => $tulos, 'ohjaajat' => $ohjaajat, 'nayttelijat' => $nayttelijat, 'hakusana' => $hakusana));
?>
