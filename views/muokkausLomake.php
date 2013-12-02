<!DOCTYPE html>

<html>
	<head> 
		<link rel="stylesheet" href="views/tyylit.css" />
		<title> Muokkaus </title>
	</head>
	<body>	
		<div class="nav">	
			<?php $hakusana = $data ->hakusana;?>
			<?php if ($hakusana != false): ?>
			<a href="listaus.php?hakuSana=<?php echo htmlspecialchars($data->hakusana);?>"> Palaa </a>
			<?php else: ?>
			<a href="listausAakkoset.php"> Palaa </a>
			<?php endif; ?>
		</div>
		
		<h1> Muokkaa elokuvan tietoja </h1>
		
		<?php if(!empty($data->virhe)): ?>
		<div class="virhe"><?php echo $data->virhe; ?> </div>
		<?php endif; ?>

		<p> Pakolliset osiot on merkkitty *-merkillä. </p>
		<form action="tallennaMuutokset.php" method="post">
			Nimi*: <input type ="text" value="<?php if (isset($data->tulos->nimi)) echo htmlspecialchars($data->tulos->nimi); ?>" name="nimi"><br><br>
			Numero: <input type ="number" value="<?php if (isset($data->tulos->numero)) echo htmlspecialchars($data->tulos->numero); ?>" name="numero"><br><br>
			Ikäraja: <input type ="number" value="<?php if (isset($data->tulos->ikaraja)) echo htmlspecialchars($data->tulos->ikaraja); ?>" name="ikaraja"><br><br>
			Valmistusvuosi: <input type ="number" value="<?php if (isset($data->tulos->valmistusvuosi)) echo htmlspecialchars($data->tulos->valmistusvuosi); ?>" name="valmistusvuosi"><br><br>
			Genre: <input type="text" value="<?php if (isset($data->tulos->genre)) echo htmlspecialchars($data->tulos->genre); ?>" name="genre"><br><br>

			Maat: <input type ="text" value="<?php if (isset($data->tulos->maat)) echo htmlspecialchars($data->tulos->maat); ?>" name="maat"><br><br>

			Kieli/kielet: <input type ="text" value="<?php if (isset($data->tulos->kielet)) echo htmlspecialchars($data->tulos->kielet); ?>" name="kielet"><br><br>

			Kesto: <input type ="number" value="<?php if (isset($data->tulos->kesto)) echo htmlspecialchars($data->tulos->kesto); ?>" name="kesto"> min<br><br>

			Ohjaaja: <input type ="text" value="<?php if (isset($data->ohjaajat[0])) echo htmlspecialchars($data->ohjaajat[0]); ?>" name="ohjaaja[]"><br>
				<input type ="text" value="<?php if (isset($data->ohjaajat[1])) echo htmlspecialchars($data->ohjaajat[1]); ?>" name="ohjaaja[]"><br>
				<input type ="text" value="<?php if (isset($data->ohjaajat[2])) echo htmlspecialchars($data->ohjaajat[2]); ?>" name="ohjaaja[]"><br>
				<input type ="text" value="<?php if (isset($data->ohjaajat[3])) echo htmlspecialchars($data->ohjaajat[3]); ?>" name="ohjaaja[]"><br>
				<input type ="text" value="<?php if (isset($data->ohjaajat[4])) echo htmlspecialchars($data->ohjaajat[4]); ?>" name="ohjaaja[]"><br><br>

			Näyttelijä: <input type ="text" value="<?php if (isset($data->nayttelijat[0])) echo htmlspecialchars($data->nayttelijat[0]); ?>" name="nayttelija[]"><br>
				<input type ="text" value="<?php if (isset($data->nayttelijat[1])) echo htmlspecialchars($data->nayttelijat[1]); ?>" name="nayttelija[]"><br>
				<input type ="text" value="<?php if (isset($data->nayttelijat[2])) echo htmlspecialchars($data->nayttelijat[2]); ?>" name="nayttelija[]"><br>
				<input type ="text" value="<?php if (isset($data->nayttelijat[3])) echo htmlspecialchars($data->nayttelijat[3]); ?>" name="nayttelija[]"><br>
				<input type ="text" value="<?php if (isset($data->nayttelijat[4])) echo htmlspecialchars($data->nayttelijat[4]); ?>" name="nayttelija[]"><br><br>
				
			<input type="hidden" value="<?php echo htmlspecialchars($data->tulos->idtunnus); ?>" name="talletettava">
			<input type="hidden" value="<?php echo htmlspecialchars($data->hakusana); ?>" name="hakusana">
			<input type="submit" value="Tallenna">
		</form>

		<form action="poistaElokuva.php" method="get">
			<input type="hidden" value="<?php echo htmlspecialchars($data->tulos->idtunnus); ?>" name="poistettava">
			<input type="hidden" value="<?php echo htmlspecialchars($data->hakusana); ?>" name="haku">
			<input type="submit" value="Poista">
		</form>
	</body>
</html>
