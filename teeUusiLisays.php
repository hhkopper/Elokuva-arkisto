<?php
require_once "kirjasto/kayttaja.php";
require_once "kirjasto/elokuva.php";
require_once "kirjasto/toiminnot.php";

	if(empty($_POST["nimi"])) {
		naytaNakyma("lomake.php", array('virhe' => "Pakollisia merkintöjä puuttuu, tallentaminen ei onnistunut!"));
	} else {
		$numero = etsiNumero($_POST['numero']);
		$kesto = etsiNumero($_POST['kesto']);
		$ikaraja = etsiNumero($_POST['ikaraja']);
		$vuosi = etsiNumero($_POST['vuosi']);
		
		$elokuva = elokuva::asetaElokuvanTiedot($numero, $kesto, $ikaraja, $vuosi);
		elokuva::asetaHenkilo($_POST['nayttelija1'], $elokuva);
		elokuva::asetaHenkilo($_POST['nayttelija2'], $elokuva);
		elokuva::asetaHenkilo($_POST['nayttelija3'], $elokuva);
		elokuva::asetaHenkilo($_POST['nayttelija4'], $elokuva);
		elokuva::asetaHenkilo($_POST['nayttelija5'], $elokuva);

		header('Location: paasivu.php');
	}
