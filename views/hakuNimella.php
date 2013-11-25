<?php
require_once "../Elokuva-arkisto/kirjasto/elokuva.php";
?><!DOCTYPE html>
<html>
	<head>
		<title> Tulokset </title>
	</head>
	<body>
		<h1> Listauksen tulokset </h1>
		<a href="paasivu.php"> Palaa hakusivulle </a>

		<p> Hakusanasi oli <?php echo $data->hakusana ?> </p>

		<table border="1">
			<tr>
				<th> Elokuvan nimi </th>
				<th> Numero </th>
			</tr>

			<?php foreach($data->elokuvat as $rivi => $tieto): ?>
			<tr>
 	                        <td> <?php echo $tieto['nimi']; ?> </td>
                                <td> <?php echo $tieto['numero']; ?></td>
                        </tr>
			<?php endforeach; ?>
		</table>

	</body>
</html>
