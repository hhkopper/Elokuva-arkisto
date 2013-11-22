<?php
?>
<!DOCTYPE html>
<html>
        <head>
                <title> Tulokset </title>
        </head>
        <body>
                <h1> Listauksen tulokset </h1>
                <a href="paasivu.php"> Palaa hakusivulle </a>
                <?php if (!empty($data->hakusana)): ?>
                <?php $sana = $data->hakusana; ?>
                <p> Hakusanasi oli <?php echo $sana; ?> </p>
                <?php endif; ?>

                <table border="1">
                        <tr>
                                <th>Elokuvan nimi</th>
                                <th> Numero</th>
                        </tr>

                        <?php foreach($data->tulos as $rivi => $tieto):?>
                        <tr>
 	                        <td> <?php echo $tieto['nimi']; ?> </td>
                                <td> <?php echo $tieto['numero']; ?></td>
                                <td> <a href="muokkaa.php?id=<?php echo $tieto['idtunnus']; ?>&haku=<?php echo $sana; ?>"> Tarkastele tietoja/Muokkaa</a> </td>
                        </tr>
                        <?php endforeach; ?>

                </table>
        </body>
</html>
