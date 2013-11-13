<?php
require_once "../logOut.php";

	function onkoKirjautunut() {
		if($_SESSION['kirjautunut'] == null) {
			return false;
		} else {
			return true;
		}
	}

	function saakoNahdaSivun() {
		if(onkoKirjautunut() == false) {
			logOut();
		}
	}
?>
