<?php
require_once 'kirjasto/elokuva.php';
require_once 'kirjasto/toiminnot.php';
saakoNahdaSivun();

$hakusana = $_GET['haku'];
$poistettava = $_GET['poistettava'];
elokuva::poistaElokuva($poistettava);

if($hakusana == false) {
	header('Location: listausAakkoset.php');
} else {
	header('Location: listaus.php?hakuSana='.$hakusana);
}
