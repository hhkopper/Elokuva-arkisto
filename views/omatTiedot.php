<!DOCTYPE>
<html>
	<head> 
		<title> Omat tiedot </title>
	</head>
	<body>
		<h1> Omat tiedot </h1>
		<a href="paasivu.php"> Palaa </a>
		<?php $kayttajaTiedot = $data->tiedot[0]; ?>
		<p> Käyttäjätunnus: <?php echo $kayttajaTiedot['kayttajatunnus']; ?> <br>
		 Salasana: <?php echo $kayttajaTiedot['salasana']; ?> </p>
		<h2> Vaihda salasana </h2>
		<?php if(!empty($data->virhe)): ?>
		<?php echo $data->virhe; ?>
		<?php endif; ?>

		<form action="vaihdaSalasana.php" method="post">
			Vanha salasana: <input type="password" name="vanha"><br>
			Uusi salasana: <input type="password" name="uusi"><br>
			Vahvista uusi salasana: <input type="password" name="uusiVahva"><br>
			<input type="submit" value="Vaihda">
		</form>
		
		<h3> Poista käyttäjätili </h3>
		<p> Tämän linkin avulla voit poistaa koko käyttäjätilisi. Tällöin kaikki tietosi poistetaan ja tietokantasi tyhjennetään. </p>
		<form action="poistaKayttaja.php" method="post">
			<input type="submit" value="Poista käyttäjätili" >
		</form>
	</body>
</html>
