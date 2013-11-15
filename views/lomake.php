<?php
?>
<!DOCTYPE html>

<html>
	<head>
		<title> Uusi elokuva</title>
	</head>
	<body>
		<h1>Lisää uusi elokuva</h1>
		<?php if(!empty($data->virhe)): ?>
		<?php echo $data->virhe; ?>
		<?php endif; ?>
		<p> Pakolliset osiot on merkkitty *-merkillä. </p>
		<form action="teeUusiLisays.php" method="post">
			Nimi*: <input type ="text" name="nimi"><br><br>
			Numero: <input type ="number" name="numero"><br><br>
			Ikäraja: <input type ="number" name="ikaraja"><br><br>
			Valmistusvuosi: <input type ="number" name="vuosi"><br><br>
			Genre: <input type="text" name="genre"><br><br>
			Maa: <input type ="text" name="maat"><br><br>
			Kieli: <input type ="text" name="kielet"><br><br>
			Kesto: <input type ="number" name="kesto"><br><br>
			Ohjaaja: <input type ="text" name="ohjaaja1"><br>
				<input type ="text" name="ohjaaja2"><br>
				<input type ="text" name="ohjaaja2"><br>
				<input type ="text" name="ohjaaja4"><br>
				<input type ="text" name="ohjaaja5"><br><br>
			Näyttelijä: <input type ="text" name="nayttelija1"><br>
				<input type ="text" name="nayttelija2"><br>
				<input type ="text" name="nayttelija3"><br>
				<input type ="text" name="nayttelija4"><br>
				<input type ="text" name="nayttelija5"><br><br>
			<textarea name="muistiinpanot">Tähän voi kirjoittaa muistiinpanoja elokuvasta...
			</textarea><br>
			<input type="submit" value="Tallenna">
		</form>
		<form action="annaLomake.php" method="get">
			<input type="submit" value="Tyhjennä">
		</form>
		<form action="paasivu.php" method="get">
			<input type="submit" value="Peruuta">
		</form>
		<form action="pääsivu.php" method="get">
			<input type="submit" value="Poista">
		</form>
	</body>
</html>
