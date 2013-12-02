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
                <?php if (!empty($data->hakusana)): ?>
                <div class="kursiivi"> <?php $sana = $data->hakusana; ?> </div>
                <p> Hakusanasi oli <strong> <?php echo htmlspecialchars($sana); ?> </strong> </p>
                <?php endif; ?>

                <table border="1" class="taulukko">
                        <tr>
                                <th>Elokuvan nimi</th>
                                <th> Numero</th>
                        </tr>

                        <?php foreach($data->tulos as $rivi => $tieto):?>
                        <tr>
 	                        <td> <?php echo htmlspecialchars($tieto['nimi']); ?> </td>
                                <td> <?php echo htmlspecialchars($tieto['numero']); ?></td>
                                <td> <a href="muokkaa.php?id=<?php echo htmlspecialchars($tieto['idtunnus']); ?>&haku=<?php echo htmlspecialchars($sana); ?>"> Tarkastele tietoja/Muokkaa</a> </td>
                        </tr>
                        <?php endforeach; ?>

                </table>
        </body>
</html>
