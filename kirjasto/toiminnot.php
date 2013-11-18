<?php
	session_start();

	function onkoKirjautunut() {		
		if($_SESSION['kirjautunut'] == null) {
			return false;
		} else {
			return true;
		}
	}

	function saakoNahdaSivun() {
		if(onkoKirjautunut() == false) {
			unset($_SESSION['kirjautunut']);
			header('Location:login.php');
		}
	}

	function naytaNakyma($sivu, $data = array()) {
		$data = (object)$data;
		require "views/$sivu";
		exit();
	}

	function tulostaHakusana($hakusana) {
		if(!empty($_GET[$hakusana])) {
			return "Hakusanasi oli $hakusana";
		}
	}

	function etsiNumero($numero) {
		if (!is_numeric($numero)) {
			return null;
		} else {
			return $numero;
		}
	}
