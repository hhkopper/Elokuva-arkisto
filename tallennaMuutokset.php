<?php
require_once "kirjasto/elokuva.php";
require_once "kirjasto/toiminnot.php";

	$numero = etsiNumero($_POST['numero']);
	$ikaraja = etsiNumero($_POST['ikaraja']);
	$vuosi = etsiNumero($_POST['vuosi']);
	$kesto = etsiNumero($_POST['kesto']);
