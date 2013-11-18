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
                <?php if (!empty($_GET['hakuSana'])): ?>
                <p> Hakusanasi oli <?php echo $_GET['hakuSana']; ?> </p>
                <?php endif; ?>
                <?php if (!empty($_GET['hakuNäyttelijä'])): ?>
                <p> Hakusanasi oli <?php echo $_GET['hakuNäyttelijä']; ?> </p>
                <?php endif; ?>
                <?php if (!empty($_GET['hakuOhjaaja'])): ?>
                <p> Hakusanasi oli <?php echo $_GET['hakuOhjaaja']; ?> </p>
                <?php endif; ?>
        
                <table border="1">
                        <tr>
                                <th>Elokuvan nimi</th>
                                <th> Numero</th>
                        </tr>
                        <tr>
                                <td> Joulupukki ja noita rumpu </td>
                                <td> 22</td>
                        </tr>
                        <tr>
                                <td> Kellopeliappelsiini </td>
                                <td> 15</td>
                        </tr>
			<tr>
				<td> Nälkäpeli</td>
				<td> 2</td>
			</tr>
                </table>
        </body>
</html>
