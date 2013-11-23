<?php
require_once "kirjasto/kayttaja.php";
require_once "kirjasto/toiminnot.php";
require_once "kirjasto/elokuva.php";

saakoNahdaSivun();

$tulos = elokuva::haeAakkosjarjestyksessa();
naytaNakyma("aakkoset.php", array('tulos' => $tulos));

