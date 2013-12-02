<?php
require_once "../Elokuva-arkisto/kirjasto/elokuva.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="views/tyylit.css" />
		<title> Tulokset </title>
	</head>
	<body>
		<div class="nav">
                	<a href="logOut.php"> Kirjaudu ulos </a> <br>
			<a href="paasivu.php"> Palaa hakusivulle </a>
		</div>
		<h1> Listauksen tulokset </h1>

		<p> Hakusanasi oli <?php echo htmlspecialchars($data->hakusana) ?> </p>

		<table border="1" class="taulukko">
			<tr>
				<th> Elokuvan nimi </th>
				<th> Numero </th>
			</tr>

			<?php foreach($data->elokuvat as $rivi => $tieto): ?>
			<tr>
 	                        <td> <?php echo htmlspecialchars($tieto['nimi']); ?> </td>
                                <td> <?php echo htmlspecialchars($tieto['numero']); ?></td>
                        </tr>
			<?php endforeach; ?>
		</table>

	</body>
</html>
