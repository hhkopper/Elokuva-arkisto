<?php
require_once 'kirjasto/elokuva.php';
require_once 'kirjasto/toiminnot.php';
saakoNahdaSivun();

elokuva::poistaElokuva($_GET['poistettava']);
header('Location: paasivu.php');
