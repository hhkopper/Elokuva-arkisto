<?php
require_once "kirjasto/kayttaja.php";
?><!DOCTYPE html>

<html>
	<head>
		<title> Oma elokuva-arkisto </title>
	</head>
	<body>
		<h1> Elokuva-arkisto </h1>
		<a href="annaLomake.php"> Lisää elokuva </a>
		<a href="logOut.php"> Kirjaudu ulos </a>
		<p> Etsi elokuvia arkistostasi erilaisilla hakusanoilla tai näyttelijän tai ohjaajan nimellä. Vastaukseksi saat listan elokuvia, joihin hakusi liittyy.</p>
		<?php session_start(); ?>

		<?php print_r($_SESSION['kirjautunut'] -> getKayttajaId());?>
		<?php if(!empty($data->tyhjaHaku)): ?>
		<?php echo $data->tyhjaHaku; ?>
		<?php endif; ?>
		<form action="listaus.php" method="get">
			Hakusana: <input type="text" name="hakuSana">
			<input type="submit" value="Hae"><br>
		</form>
		
		<form>
			Näyttelijän nimi:<input type="text" name="hakuNäyttelijä">
			<input type="submit" value="Hae"><br>
		</form>
		
		<form>
			Ohjaajan nimi: <input type="text" name="hakuOhjaaja">
			<input type="submit" value="Hae"><br>
		</form>
		
		<p> Voit myös listata elokuvasi aakkos- tai numerojärjestyksessä.</p>
			
		<form action="listausAakkoset.php" method="get">
			<input type="submit" value="Listaa aakkosjärjestyksessä"><br>
		</form>
		
		<form>
			<input type="submit" value="Listaa numerojärjestyksessä"><br>
		</form>
	</body>
</html>
