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
			Nimi*: <input type ="text" value="<?php if (isset($data->lomake->nimi)) echo $data->lomake->nimi; ?>" name="nimi"><br><br>
			Numero: <input type ="number" value="<?php if (isset ($data->lomake->numero)) echo $data->lomake->numero; ?>"  name="numero"><br><br>
			Ikäraja: <input type ="number" value="<?php if (isset($data->lomake->ikaraja)) echo $data->lomake->ikaraja; ?>" name="ikaraja"><br><br>
			Valmistusvuosi: <input type ="number" value="<?php if (isset($data->lomake->vuosi)) echo $data->lomake->vuosi; ?>" name="vuosi"><br><br>
			Genre: <input type="text" value="<?php if (isset($data->lomake->genre)) echo $data->lomake->genre; ?>" name="genre"><br><br>
			
			Maa: <input type ="text" value="<?php if (isset($data->lomake->maat)) echo $data->lomake->maat; ?>" name="maat"><br><br>
			
			Kieli: <input type ="text" value="<?php if (isset($data->lomake->kielet)) echo $data->lomake->kielet; ?>" name="kielet"><br><br>
			
			Kesto: <input type ="number" value="<?php if (isset($data->lomake->kesto)) echo $data->lomake->kesto; ?>" name="kesto"><br><br>
			
			Ohjaaja: <input type ="text" value="<?php if (isset($data->lomake->ohjaaja1)) echo $data->lomake->ohjaaja1; ?>" name="ohjaaja1"><br>
				<input type ="text" value="<?php if (isset($data->lomake->ohjaaja2)) echo $data->lomake->ohjaaja2; ?>" name="ohjaaja2"><br>
				<input type ="text" value="<?php if (isset($data->lomake->ohjaaja3)) echo $data->lomake->ohjaaja3; ?>" name="ohjaaja3"><br>
				<input type ="text" value="<?php if (isset($data->lomake->ohjaaja4)) echo $data->lomake->ohjaaja4; ?>" name="ohjaaja4"><br>
				<input type ="text" value="<?php if (isset($data->lomake->ohjaaja5)) echo $data->lomake->ohjaaja5; ?>" name="ohjaaja5"><br><br>
				
			Näyttelijä: <input type ="text" value="<?php if (isset($data->lomake->nayttelija1)) echo $data->lomake->nayttelija1; ?>" name="nayttelija1"><br>
				<input type ="text" value="<?php if (isset($data->lomake->nayttelija2)) echo $data->lomake->nayttelija2; ?>" name="nayttelija2"><br>
				<input type ="text" value="<?php if (isset($data->lomake->nayttelija3)) echo $data->lomake->nayttelija3; ?>" name="nayttelija3"><br>
				<input type ="text" value="<?php if (isset($data->lomake->nayttelija4)) echo $data->lomake->nayttelija4; ?>" name="nayttelija4"><br>
				<input type ="text" value="<?php if (isset($data->lomake->nayttelija5)) echo $data->lomake->nayttelija5; ?>" name="nayttelija5"><br><br>
			<input type="submit" value="Tallenna">
		</form>
		<form action="annaLomake.php" method="get">
			<input type="submit" value="Tyhjennä">
		</form>
		<form action="paasivu.php" method="get">
			<input type="submit" value="Peruuta">
		</form>
	</body>
</html>
