<?php
require_once "kirjasto/kayttaja.php";
require_once "kirjasto/elokuva.php";
require_once "kirjasto/toiminnot.php";

	if(empty($_POST["nimi"])) {
		$lomake = (object)$_POST;
		
		naytaNakyma("lomake.php", array('virhe' => "Pakollisia merkintöjä puuttuu, tallentaminen ei onnistunut!", "lomake" => $lomake));
	} else {
		$numero = etsiNumero($_POST['numero']);
		$kesto = etsiNumero($_POST['kesto']);
		$ikaraja = etsiNumero($_POST['ikaraja']);
		$vuosi = etsiNumero($_POST['vuosi']);
		
		$elokuva = elokuva::asetaElokuvanTiedot($numero, $kesto, $ikaraja, $vuosi);
		elokuva::asetaNayttelija($_POST['nayttelija1'], $elokuva);
		elokuva::asetaNayttelija($_POST['nayttelija2'], $elokuva);
		elokuva::asetaNayttelija($_POST['nayttelija3'], $elokuva);
		elokuva::asetaNayttelija($_POST['nayttelija4'], $elokuva);
		elokuva::asetaNayttelija($_POST['nayttelija5'], $elokuva);

		elokuva::asetaOhjaaja($_POST['ohjaaja1'], $elokuva);
		elokuva::asetaOhjaaja($_POST['ohjaaja2'], $elokuva);
		elokuva::asetaOhjaaja($_POST['ohjaaja3'], $elokuva);
		elokuva::asetaOhjaaja($_POST['ohjaaja4'], $elokuva);
		elokuva::asetaOhjaaja($_POST['ohjaaja5'], $elokuva);

		header('Location: paasivu.php');
	}
?>
