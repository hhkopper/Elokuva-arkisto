<?php
require_once "kirjasto/elokuva.php";
require_once "kirjasto/toiminnot.php";

	$numero = etsiNumero($_POST['numero']);
	$ikaraja = etsiNumero($_POST['ikaraja']);
	$vuosi = etsiNumero($_POST['vuosi']);
	$kesto = etsiNumero($_POST['kesto']);
	$talletettava = $_POST['talletettava'];

	elokuva::tallennaMuokatutElokuvanTiedot($numero, $ikaraja, $vuosi, $kesto, $talletettava);
	elokuva::tallennaMuokatutOhjaajat($_POST['ohjaaja1'], $_POST['ohjaaja2'], $_POST['ohjaaja3'], $_POST['ohjaaja4'], $_POST['ohjaaja5'], $_POST['talletettava']);
	elokuva::tallennaMuokatutNayttelijat($_POST['nayttelija1'], $_POST['nayttelija2'], $_POST['nayttelija3'], $_POST['nayttelija4'], $_POST['nayttelija5'], $_POST['talletettava']);
	header('Location: paasivu.php');
