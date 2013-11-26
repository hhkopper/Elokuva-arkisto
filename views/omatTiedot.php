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
		<form>
			Vanha salasana: <input type="password" name="vanha"><br>
			Uusi salasana: <input type="password" name="uusi"><br>
			Vahvista uusi salasana: <input type="password" name="uusiVahva"><br>
			<input type="submit" value="Vaihda">
		</form>
	</body>
</html>
