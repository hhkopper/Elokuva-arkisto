<?php
require_once "kirjasto/kayttaja.php";
require_once "kirjasto/toiminnot.php";
saakoNahdaSivun();

$tiedot = kayttaja::haeKayttajaTiedot($_SESSION['kirjautunut']->getKayttajaId());
naytaNakyma("omatTiedot.php", array('tiedot' => $tiedot));
