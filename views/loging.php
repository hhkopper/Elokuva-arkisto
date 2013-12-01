<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="views/tyylit.css" />
		<title> Etusivu </title>
	</head>
	<body>
		<h1> Elokuva-arkisto </h1>		
		<p> Tämän sivuston tarkoituksena on antaa mahdollisuus yksityishenkilöille luoda oma elokuva-arkisto. Arkistot on tarkoitettu omaan käyttöön, joten muut eivät pysty seuraamaan luomaasi arkistoa.</p>
		<?php if(!empty($data->virhe)): ?>
		<div class="virhe"><?php echo $data->virhe; ?></div>
		<?php endif; ?>
		<form action='doLogin.php' method='POST'>
                        Käyttäjätunnus: <input type="text" name="käyttäjätunnus"><br>
                        Salasana: <input type="password" name="salasana"><br>
			<button type='submit'>Kirjaudu</button>
                </form>
		<p> Jos et ole vielä rekisteröitynyt, voit tehdä sen alla olevan linkin kautta!</p>
		<form action="rekisteroityminen.php" method="get">
			<input type="submit" value="Rekisteröidy"><br>
		</form>
		<footer>
			Jos ilmenee ongelmia, ota yhteyttä ylläpitäjään: hanna.kopperi@helsinki.fi
		</footer>
	</body>
</html>
