<!DOCTYPE html>

<html>
	<head>
		<title> Aakkosjärjestys </title>
	</head>
	<body>
		<h1> Elokuvat aakkosjärjestyksessä </h1>
		<a href="paasivu.php"> Palaa hakusivulle </a>

		<table border="1">
			<tr>
				<th> Elokuvan nimi </th>
				<th> Numero </th>
			</tr>

			<?php foreach($data->tulos as $rivi => $tieto):?>
			<tr>
				<td> <?php echo htmlspecialchars($tieto['nimi']); ?> </td>
				<td> <?php echo htmlspecialchars($tieto['numero']); ?> </td>
				<td> <a href="muokkaaLista.php?id=<?php echo htmlspecialchars($tieto['idtunnus']); ?>">Tarkastele tietoja/Muokkaa </a>
			</tr>
			<?php endforeach; ?>
		</table>
	</body>
</html>
