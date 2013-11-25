<?php
require_once "kirjasto/elokuva.php";
require_once "kirjasto/toiminnot.php";

if(empty($_POST['nimi'])) {
	$lomake = (object)$_POST;
	$lomake->idtunnus = $lomake->talletettava;
	$ohjaajat = $_POST['ohjaaja'];
	$nayttelijat = $_POST['nayttelija'];
	$hakusana = false;
	
	var_dump($_POST);
	naytaNakyma("muokkausLomake.php", array('virhe' => "Pakollisia merkintöjä puuttuu, tallentaminen ei onnistu! Tarkista tiedot.", 'tulos' => $lomake, 'ohjaajat' => $ohjaajat, 'nayttelijat' => $nayttelijat, 'hakusana' => $hakusana));
} else {

	$numero = etsiNumero($_POST['numero']);
	$ikaraja = etsiNumero($_POST['ikaraja']);
	$vuosi = etsiNumero($_POST['valmistusvuosi']);
	$kesto = etsiNumero($_POST['kesto']);
	$talletettava = $_POST['talletettava'];

	elokuva::tallennaMuokatutElokuvanTiedot($numero, $ikaraja, $vuosi, $kesto, $talletettava);
	elokuva::tallennaMuokatutOhjaajat($_POST['ohjaaja'][0], $_POST['ohjaaja'][1], $_POST['ohjaaja'][2], $_POST['ohjaaja'][3], $_POST['ohjaaja'][4], $_POST['talletettava']);
	elokuva::tallennaMuokatutNayttelijat($_POST['nayttelija'][0], $_POST['nayttelija'][1], $_POST['nayttelija'][2], $_POST['nayttelija'][3], $_POST['nayttelija'][4], $_POST['talletettava']);
	header('Location: paasivu.php');
}
