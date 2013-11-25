﻿<!DOCTYPE html>

<html>
	<head> 
		<title> Muokkaus </title>
	</head>
	<body>
		<?php print_r($data->tulos); ?>
		<h1> Muokkaa elokuvan tietoja </h1>
		<?php $hakusana = $data ->hakusana;?>
		<?php if ($hakusana != false): ?>
		<a href="listaus.php?hakuSana=<?php echo $data->hakusana ?>"> Palaa </a>
		<?php else: ?>
		<a href="listausAakkoset.php"> Palaa </a>
		<?php endif; ?>

		<p> Pakolliset osiot on merkkitty *-merkillä. </p>
		<form action="tallennaMuutokset.php" method="post">
			Nimi*: <input type ="text" value="<?php if (isset($data->tulos->nimi)) echo $data->tulos->nimi; ?>" name="nimi"><br><br>
			Numero: <input type ="number" value="<?php if (isset($data->tulos->numero)) echo $data->tulos->numero; ?>" name="numero"><br><br>
			Ikäraja: <input type ="number" value="<?php if (isset($data->tulos->ikaraja)) echo $data->tulos->ikaraja; ?>" name="ikaraja"><br><br>
			Valmistusvuosi: <input type ="number" value="<?php if (isset($data->tulos->valmistusvuosi)) echo $data->tulos->valmistusvuosi; ?>" name="valmistusvuosi"><br><br>
			Genre: <input type="text" value="<?php if (isset($data->tulos->genre)) echo $data->tulos->genre; ?>" name="genre"><br><br>

			Maat: <input type ="text" value="<?php if (isset($data->tulos->maat)) echo $data->tulos->maat; ?>" name="maat"><br><br>

			Kieli/kielet: <input type ="text" value="<?php if (isset($data->tulos->kielet)) echo $data->tulos->kielet; ?>" name="kielet"><br><br>

			Kesto: <input type ="number" value="<?php if (isset($data->tulos->kesto)) echo $data->tulos->kesto; ?>" name="kesto"><br><br>

			Ohjaaja: <input type ="text" value="<?php if (isset($data->ohjaajat[0])) echo $data->ohjaajat[0]; ?>" name="ohjaaja[]"><br>
				<input type ="text" value="<?php if (isset($data->ohjaajat[1])) echo $data->ohjaajat[1]; ?>" name="ohjaaja[]"><br>
				<input type ="text" value="<?php if (isset($data->ohjaajat[2])) echo $data->ohjaajat[2]; ?>" name="ohjaaja[]"><br>
				<input type ="text" value="<?php if (isset($data->ohjaajat[3])) echo $data->ohjaajat[3]; ?>" name="ohjaaja[]"><br>
				<input type ="text" value="<?php if (isset($data->ohjaajat[4])) echo $data->ohjaajat[4]; ?>" name="ohjaaja[]"><br><br>

			Näyttelijä: <input type ="text" value="<?php if (isset($data->nayttelijat[0])) echo $data->nayttelijat[0]; ?>" name="nayttelija[]"><br>
				<input type ="text" value="<?php if (isset($data->nayttelijat[1])) echo $data->nayttelijat[1]; ?>" name="nayttelija[]"><br>
				<input type ="text" value="<?php if (isset($data->nayttelijat[2])) echo $data->nayttelijat[2]; ?>" name="nayttelija[]"><br>
				<input type ="text" value="<?php if (isset($data->nayttelijat[3])) echo $data->nayttelijat[3]; ?>" name="nayttelija[]"><br>
				<input type ="text" value="<?php if (isset($data->nayttelijat[4])) echo $data->nayttelijat[4]; ?>" name="nayttelija[]"><br><br>
			<input type="hidden" value="<?php echo $data->tulos->idtunnus?>" name="talletettava">
			<input type="submit" value="Tallenna">
		</form>

		<form action="poistaElokuva.php" method="get">
			<input type="hidden" value="<?php echo $data->tulos->idtunnus?>" name="poistettava">
			<input type="submit" value="Poista">
		</form>
	</body>
</html>
