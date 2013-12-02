<!DOCTYPE html>

<html>
	<head>
		<link rel="stylesheet" href="views/tyylit.css" />
		<title> Numerojärjestys </title>
	</head>
	<body>
		<div class="nav">
                	<a href="logOut.php"> Kirjaudu ulos </a><br>
			<a href="paasivu.php"> Palaa hakusivulle </a>
		</div>
		<h1> Elokuvat numerojärjestyksessä </h1>

		<table border="1" class="taulukko">
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
