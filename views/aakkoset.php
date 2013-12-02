<!DOCTYPE html>

<html>
	<head>
		<link rel="stylesheet" href="views/tyylit.css" />
		<title> Aakkosjärjestys </title>
	</head>
	<body>
		<div class="nav">
                	<a href="logOut.php"> Kirjaudu ulos </a> <br>
			<a href="paasivu.php"> Palaa hakusivulle </a>
		</div>
		<h1> Elokuvat aakkosjärjestyksessä </h1>

		<table border="1"  class="taulukko">
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
