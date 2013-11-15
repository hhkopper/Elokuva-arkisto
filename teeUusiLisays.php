<?php
require_once "kirjasto/kayttaja.php";
require_once "kirjasto/toiminnot.php";

	if(empty($_POST["nimi"])) {
		naytaNakyma("lomake.php", array('virhe' => "Pakollisia merkintöjä puuttuu, tallentaminen ei onnistunut!"));
	} else {
		$numero = $_POST['numero'];
		if (!is_numeric($numero)) $numero = null;
		$kesto = $_POST['kesto'];
		if (!is_numeric($kesto)) $kesto = null;
		$ikaraja = $_POST['ikaraja'];
		if(!is_numeric($ikaraja)) $ikaraja = null;
		$vuosi = $_POST['vuosi'];
		if(!is_numeric($vuosi)) $vuosi = null;
		
		$sql="INSERT INTO elokuva (nimi, numero, kesto, ikaraja, valmistusvuosi, genre, maat, kielet, kayttaja) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?) returning idtunnus";
		$kysely = annaYhteys() ->prepare($sql);
		$kysely->execute(array($_POST['nimi'], $numero, $kesto, $ikaraja, $vuosi, $_POST['genre'], $_POST['maat'], $_POST['kielet'], $_SESSION['kirjautunut']->getKayttajaId()));
		header('Location: paasivu.php');
	}
