<?php
	function onkoKirjautunut() {
		if($_SESSION['kirjautunut'] == null) {
			return false;
		} else {
			return true;
		}
	}

	function saakoNahdaSivun() {
		if(onkoKirjautunut() == false) {
			session_start();
			unset($_SESSION['kirjautunut']);
			header('Location:login.php');
		}
	}

	function naytaNakyma($sivu, $data = array()) {
		$data = (object)$data;
		require "views/$sivu";
		exit();
	}