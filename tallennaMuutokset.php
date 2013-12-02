<?php
require_once "kirjasto/elokuva.php";
require_once "kirjasto/toiminnot.php";

	$lomake = (object)$_POST;
	$lomake->idtunnus = $lomake->talletettava;
	$ohjaajat = $_POST['ohjaaja'];
	$nayttelijat = $_POST['nayttelija'];
	$hakusana = false;
	if(!empty($_POST['hakusana'])) {
		$hakusana = $_POST['hakusana'];
	}


	if(empty($_POST['nimi'])) {
		naytaNakyma("muokkausLomake.php", array('virhe' => "Pakollisia merkintöjä puuttuu, tallentaminen ei onnistu! Tarkista tiedot.", 'tulos' => $lomake, 'ohjaajat' => $ohjaajat, 'nayttelijat' => $nayttelijat, 'hakusana' => $hakusana));
	} else {

		$numero = etsiNumero($_POST['numero']);
		$ikaraja = etsiNumero($_POST['ikaraja']);
		$vuosi = etsiNumero($_POST['valmistusvuosi']);
		$kesto = etsiNumero($_POST['kesto']);
		$talletettava = $_POST['talletettava'];
	
		if(($numero == null and $_POST['numero'] != '') OR ($ikaraja == null and $_POST['ikaraja'] != '')  OR ($vuosi == null and $_POST['valmistusvuosi'] != '') OR ($kesto == null and $_POST['kesto'] != '')) {
			naytaNakyma("muokkausLomake.php", array('virhe' => "Numero, ikäraja, valmistusvuosi ja kesto täytyy ilmaista numeroilla.", 'tulos' => $lomake, 'ohjaajat' => $ohjaajat, 'nayttelijat' => $nayttelijat, 'hakusana' => $hakusana));
		}

		elokuva::tallennaMuokatutElokuvanTiedot($numero, $ikaraja, $vuosi, $kesto, $talletettava);
		elokuva::tallennaMuokatutOhjaajat($_POST['ohjaaja'][0], $_POST['ohjaaja'][1], $_POST['ohjaaja'][2], $_POST['ohjaaja'][3], $_POST['ohjaaja'][4], $_POST['talletettava']);
		elokuva::tallennaMuokatutNayttelijat($_POST['nayttelija'][0], $_POST['nayttelija'][1], $_POST['nayttelija'][2], $_POST['nayttelija'][3], $_POST['nayttelija'][4], $_POST['talletettava']);
		
		if($hakusana == false) {
			header('Location: listausAakkoset.php');
		} else {
			header('Location: listaus.php?hakuSana='.$hakusana);
		}
		//header('Location: paasivu.php');
	}
