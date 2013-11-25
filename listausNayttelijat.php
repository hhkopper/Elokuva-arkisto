<?php
require_once "kirjasto/kayttaja.php";
require_once "kirjasto/toiminnot.php";
require_once "kirjasto/elokuva.php";
saakoNahdaSivun();

$haettava = $_GET["hakuNayttelija"];
if(empty($haettava)) {
	naytaNakyma("pääsivu.php", array('tyhjaHaku'=> "Haku ei tuottanut yhtään tulosta tai hakusana puuttuu."));
} else {
	$elokuvat = elokuva::haeNimellaNayttelijat($haettava);
	if(empty($elokuvat)) {
		naytaNakyma("pääsivu.php", array('tyhjaHaku'=> "Haku ei tuottanut yhtään tulosta tai hakusana puuttuu."));
	} else {
		naytaNakyma("hakuNimella.php", array('elokuvat' => $elokuvat, 'hakusana'=>$haettava));
	}
}
