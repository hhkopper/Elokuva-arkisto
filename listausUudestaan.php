<?php
require_once "kirjasto/toiminnot.php";
require_once "kirjasto/elokuva.php";
saakoNahdaSivun();

$hakuTulos = elokuva::haeElokuvat($_GET["hakusana"]);
if(empty($hakuTulos)) {
	naytaNakyma("pääsivu.php", array('tyhjaHaku' => "Haku ei tuottanut tuloksia."));
} else {
	naytaNakyma("hakusivu.php", array('tulos' => $hakuTulos, 'hakusana' => $_GET['hakuSana']));
}
?>
