<?php
require_once 'kirjasto/elokuva.php';
require_once 'kirjasto/toiminnot.php';
saakoNahdaSivun();

$poistettava = $_GET['poistettava'];
elokuva::poistaElokuva($poistettava);
header('Location: paasivu.php');
