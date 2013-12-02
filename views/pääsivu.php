<!DOCTYPE html>

<html>
	<head>
		<link rel="stylesheet" href="views/tyylit.css" />
		<title> Oma elokuva-arkisto </title>
	</head>
	<body>
		<?php $kayttajatunnus = $_SESSION['kirjautunut']->getKayttajatunnus(); ?>
		<div class="nav">
			<a href="annaLomake.php"> Lisää elokuva </a>
			<a href="naytaOmatTiedot.php"> Omat tiedot </a>
			<a href="logOut.php"> Kirjaudu ulos </a>
		</div>
		
		<h1> Elokuva-arkisto </h1>
                <p> Hei <?php echo htmlspecialchars($kayttajatunnus); ?>! </p>
		<p> Etsi elokuvia arkistostasi erilaisilla hakusanoilla tai näyttelijän tai ohjaajan nimellä. Vastaukseksi saat listan elokuvia, joihin hakusi liittyy.</p>
		<p> Hae tietyllä hakusanalla tai siirry aakkosjärjestyslistaan, niin pääset tarkastelemaan elokuvien tietoja ja muokkaamaan niitä. </p>

		<?php if(!empty($data->tyhjaHaku)): ?>
		<div class="virhe"><?php echo $data->tyhjaHaku; ?></div>
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
