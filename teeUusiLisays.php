<?php
require_once "kirjasto/kayttaja.php";
require_once "kirjasto/elokuva.php";
require_once "kirjasto/toiminnot.php";

	$lomake = (object)$_POST;
	if(empty($_POST["nimi"])) {
		
		
		naytaNakyma("lomake.php", array('virhe' => "Pakollisia merkintöjä puuttuu, tallentaminen ei onnistunut!", "lomake" => $lomake));
	} else {
		$numero = etsiNumero($_POST['numero']);
		$kesto = etsiNumero($_POST['kesto']);
		$ikaraja = etsiNumero($_POST['ikaraja']);
		$vuosi = etsiNumero($_POST['vuosi']);
		
		if(($numero == null and $_POST['numero'] != '') OR ($ikaraja == null and $_POST['ikaraja'] != '')  OR ($vuosi == null and $_POST['vuosi'] != '') OR ($kesto == null and $_POST['kesto'] != '')) {
			naytaNakyma("lomake.php", array('virhe' => "Numero, ikäraja, valmistusvuosi ja kesto täytyy ilmaista numeroilla.", "lomake" => $lomake));
		}
		
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
