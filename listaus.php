<?php
require_once "kirjasto/kayttaja.php";
require_once "kirjasto/toiminnot.php";
require_once "kirjasto/elokuva.php";
saakoNahdaSivun();

$haettava = $_GET["hakuSana"];
if(empty($haettava)) {
	naytaNakyma("pääsivu.php", array('tyhjaHaku' => "Haku ei tuottanut tuloksia."));
} else {
	$hakuTulos = elokuva::haeElokuvat($haettava);
	if(empty($hakuTulos)) {
		naytaNakyma("pääsivu.php", array('tyhjaHaku' => "Haku ei tuottanut tuloksia."));
	} else {
		naytaNakyma("hakusivu.php", array('tulos' => $hakuTulos, 'hakusana' => $haettava));
	}
}
?>
