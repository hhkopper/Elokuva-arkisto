<?php
?><!DOCTYPE html>

<html>
	<head>
		<title> Oma elokuva-arkisto </title>
	</head>
	<body>
		<h1> Elokuva-arkisto </h1>
		<?php $kayttajatunnus = $_SESSION['kirjautunut']->getKayttajatunnus(); ?>
		<p> Hei <?php echo $kayttajatunnus; ?>! </p>
		<a href="annaLomake.php"> Lisää elokuva </a>
		<a href="naytaOmatTiedot.php"> Omat tiedot </a>
		<a href="logOut.php"> Kirjaudu ulos </a>
		<p> Etsi elokuvia arkistostasi erilaisilla hakusanoilla tai näyttelijän tai ohjaajan nimellä. Vastaukseksi saat listan elokuvia, joihin hakusi liittyy.</p>
		<p> Hae tietyllä hakusanalla tai siirry aakkosjärjestyslistaan, niin pääset tarkastelemaan elokuvien tietoja ja muokkaamaan niitä. </p>

		<?php if(!empty($data->tyhjaHaku)): ?>
		<?php echo $data->tyhjaHaku; ?>
		<?php endif; ?>
		<form action="listaus.php" method="get">
			Hakusana: <input type="text" name="hakuSana">
			<input type="submit" value="Hae"><br>
		</form>

		<form action="listausNayttelijat.php" method="get">
			Näyttelijän nimi:<input type="text" name="hakuNayttelija">
			<input type="submit" value="Hae"><br>
		</form>

		<form action="listausOhjaajat.php" method="get">
			Ohjaajan nimi: <input type="text" name="hakuOhjaaja">
			<input type="submit" value="Hae"><br>
		</form>

		<p> Voit myös listata elokuvasi aakkos- tai numerojärjestyksessä.</p>

		<form action="listausAakkoset.php" method="get">
			<input type="submit" value="Listaa aakkosjärjestyksessä"><br>
		</form>

		<form action="listausNumerot.php" method="get">
			<input type="submit" value="Listaa numerojärjestyksessä"><br>
		</form>
	</body>
</html>
