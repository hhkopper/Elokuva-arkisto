<!DOCTYPE html>

<html>
	<head>
		<title> Numerojärjestys </title>
	</head>
	<body>
		<h1> Elokuvat numerojärjestyksessä </h1>
		<a href="paasivu.php"> Palaa hakusivulle </a>

		<table border="1">
			<tr>
				<th> Numero </th>
				<th> Elokuvan nimi </th>
			</tr>

			<?php foreach($data->tulos as $rivi => $tieto): ?>
			<tr>
				<td> <?php echo htmlspecialchars($tieto['numero']); ?> </td>
				<td> <?php echo htmlspecialchars($tieto['nimi']); ?> </td>
			</tr>
			<?php endforeach; ?>
		</table>
	</body>
</html>
