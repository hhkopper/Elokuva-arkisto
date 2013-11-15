<?php
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
		<form action="listaus.php" method="get">
			Hakusana: <input type="text" name="hakuSana">
			<input type="submit" value="Hae"><br>
			Näyttelijän nimi:<input type="text" name="hakuNäyttelijä">
			<input type="submit" value="Hae"><br>
			Ohjaajan nimi: <input type="text" name="hakuOhjaaja">
			<input type="submit" value="Hae"><br>
		</form>
			<p> Voit myös listata elokuvasi aakkos- tai numerojärjestyksessä.</p>
		<form>
			<input type="submit" value="Listaa aakkosjärjestyksessä"><br>
			<input type="submit" value="Listaa numerojärjestyksessä">
		</form>
	</body>
</html>
