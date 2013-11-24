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

			<?php foreach($data->tulos as $rivi => $tieto): ?>
			<?php $nimi = elokuva::haeElokuvanNimi($tieto['elokuva'], $data->kayttaja); ?>
			<?php $numero = elokuva::haeElokuvanNumero($tieto['elokuva'], $data->kayttaja); ?>

			<?php if(!empty($nimi)): ?>
			<tr>
				<td> <?php echo $nimi; ?> </td>
				<td> <?php echo $numero; ?> </td>
			</tr>
			<?php endif; ?>
			<?php endforeach; ?>
		</table>

	</body>
</html>
