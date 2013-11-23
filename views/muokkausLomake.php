<!DOCTYPE html>

<html>
	<head> 
		<title> Muokkaus </title>
	</head>
	<body>
		<h1> Muokkaa elokuvan tietoja </h1>
		<a href="listaus.php?hakuSana=<?php echo $data->hakusana ?>"> Palaa </a>
		<?php var_dump($data->tulos); ?>
		<p> Pakolliset osiot on merkkitty *-merkillä. </p>
		<form action="tallennaMuutokset.php" method="post">
			Nimi*: <input type ="text" value="<?php echo $data->tulos->nimi?>" name="nimi"><br><br>
			Numero: <input type ="number" value="<?php echo $data->tulos->numero?>" name="numero"><br><br>
			Ikäraja: <input type ="number" value="<?php echo $data->tulos->ikaraja?>" name="ikaraja"><br><br>
			Valmistusvuosi: <input type ="number" value="<?php echo $data->tulos->valmistusvuosi?>" name="vuosi"><br><br>
			Genre: <input type="text" value="<?php echo $data->tulos->genre?>" name="genre"><br><br>

			Maat: <input type ="text" value="<?php echo $data->tulos->maat?>" name="maat"><br><br>

			Kieli/kielet: <input type ="text" value="<?php echo $data->tulos->kielet?>" name="kielet"><br><br>
			
			Kesto: <input type ="number" value="<?php echo $data->tulos->kesto?>" name="kesto"><br><br>
			
			Ohjaaja: <input type ="text" value="<?php echo $data->ohjaajat[0]?>" name="ohjaaja1"><br>
				<input type ="text" value="<?php echo $data->ohjaajat[1]?>" name="ohjaaja2"><br>
				<input type ="text" value="<?php echo $data->ohjaajat[2]?>" name="ohjaaja3"><br>
				<input type ="text" value="<?php echo $data->ohjaajat[3]?>" name="ohjaaja4"><br>
				<input type ="text" value="<?php echo $data->ohjaajat[4]?>" name="ohjaaja5"><br><br>
				
			Näyttelijä: <input type ="text" value="<?php echo $data->nayttelijat[0]?>" name="nayttelija1"><br>
				<input type ="text" value="<?php echo $data->nayttelijat[1]?>" name="nayttelija2"><br>
				<input type ="text" value="<?php echo $data->nayttelijat[2]?>" name="nayttelija3"><br>
				<input type ="text" value="<?php echo $data->nayttelijat[3]?>" name="nayttelija4"><br>
				<input type ="text" value="<?php echo $data->nayttelijat[4]?>" name="nayttelija5"><br><br>
			<input type="hidden" value="<?php echo $data->tulos->idtunnus?>" name="talletettava">
			<input type="submit" value="Tallenna">
		</form>

		<form action="poistaElokuva.php" method="get">
			<input type="hidden" value="<?php echo $data->tulos->idtunnus?>" name="poistettava">
			<input type="submit" value="Poista">
		</form>
	</body>
</html>
