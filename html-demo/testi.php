<?php
//Lista asioista array-tietotyyppiin laitettuna:
require_once "../kirjasto/kayttaja.php";
$lista = kayttaja::getKayttajat();
?><!DOCTYPE HTML>
<html>
  <head><title>Otsikko</title></head>
  <body>
    <h1>Listaelementtitesti</h1>
    <ul>
    <?php foreach($lista as $asia) { ?>
      <li><?php echo $asia-> getKayttajatunnus() ?></li>
    <?php } ?>
    </ul>
  </body>
</html>
