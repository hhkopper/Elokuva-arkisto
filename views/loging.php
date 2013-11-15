<?php
?><!DOCTYPE html>
<html>
	<head>
		<title> Etusivu </title>
	</head>
	<body>
		<h1> Elokuva-arkisto </h1>		
		<p> Tämän sivuston tarkoituksena on antaa mahdollisuus yksityishenkilöille luoda oma elokuva-arkisto. Arkistot on tarkoitettu omaan käyttöön, joten muut eivät pysty seuraamaan luomaasi arkistoa.</p>
		<?php if(!empty($data->virhe)): ?>
		<?php echo $data->virhe; ?>
		<?php endif; ?>
		<form action='doLogin.php' method='POST'>
                        Käyttäjätunnus: <input type="text" name="käyttäjätunnus"><br>
                        Salasana: <input type="password" name="salasana"><br>
			<button type='submit'>Kirjaudu</button>
                </form>
		<p> Jos et ole vielä rekisteröitynyt, voit tehdä sen alla olevan linkin kautta!</p>
		<form name="rekisteröidy" action="rekisteriLomake.php" method="get">
			<input type="submit" value="Rekisteröidy">
		</form>
	</body>
</html>
