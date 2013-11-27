<?php
require_once "kirjasto/kayttaja.php";
require_once "kirjasto/toiminnot.php";
require_once "kirjasto/elokuva.php";
saakoNahdaSivun();

$id = $_SESSION['kirjautunut']->getKayttajaId();
elokuva::poistaKaikkiKayttajanElokuvat($id);
kayttaja::poistaKayttaja($id);

header('Location: logOut.php');
