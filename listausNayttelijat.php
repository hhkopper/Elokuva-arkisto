<?php
require_once "kirjasto/kayttaja.php";
require_once "kirjasto/toiminnot.php";
require_once "kirjasto/elokuva.php";
saakoNahdaSivun();

$haettava = $_GET["hakuNayttelija"];
if(empty($haettava)) {
	naytaNakyma("pääsivu.php", array('tyhjaHaku'=> "Haku ei tuottanut yhtään tulosta tai hakusana puuttuu."));
} else {
	$elokuvat = elokuva::haeElokuvatNayttelijanMukaan($haettava);
	if($elokuvat != null) {
		naytaNakyma("hakuNayttelija.php", array('tulos' => $elokuvat, 'hakusana' => $haettava, 'kayttaja' => $_SESSION['kirjautunut']->getKayttajaId()));
	} else {
		naytaNakyma("pääsivu.php", array('tyhjaHaku' => "Haku ei tuottanut yhtään tulosta, koska tietokanta ei sisällä vastaavaa näyttelijän nimeä."));
	}
}
