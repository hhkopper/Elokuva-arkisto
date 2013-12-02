<!DOCTYPE html>
<html>
	<head> 
		<link rel="stylesheet" href="views/tyylit.css" />
		<title> Omat tiedot </title>
	</head>
	<body>
		<div class="nav">
                	<a href="logOut.php"> Kirjaudu ulos </a> <br>
			<a href="paasivu.php"> Palaa </a>
		</div>
		<h1> Omat tiedot </h1>
		<?php $kayttajaTiedot = $data->tiedot[0]; ?>
		<p> Käyttäjätunnus: <?php echo htmlspecialchars($kayttajaTiedot['kayttajatunnus']); ?> <br>
		<h2> Vaihda salasana </h2>
		
		<?php if(!empty($data->virhe)): ?>
		<div class="virhe"><?php echo $data->virhe; ?></div>
		<?php endif; ?>
		
		<?php if(!empty($data->onnistunut)): ?>
		<div class="onnistui"><?php echo $data->onnistunut; ?></div>
		<?php endif; ?>

		<form action="vaihdaSalasana.php" method="post">
			Vanha salasana: <input type="password" name="vanha"><br>
			Uusi salasana: <input type="password" name="uusi"><br>
			Vahvista uusi salasana: <input type="password" name="uusiVahva"><br>
			<input type="submit" value="Vaihda">
		</form>
		
		<h3> Poista käyttäjätili </h3>
		<p> Tämän linkin avulla voit poistaa koko käyttäjätilisi. Tällöin kaikki tietosi poistetaan ja tietokantasi tyhjennetään. </p>
		<form action="tarkistaPoisto.php" method="post">
			<input type="submit" value="Poista käyttäjätili" >
		</form>
	</body>
</html>
