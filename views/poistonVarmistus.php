<!DOCTYPE html>

<html>
	<head>
		<link rel="stylesheet" href="views/tyylit.css" />
		<title> Varmista poisto </title>
	</head>
	<body>
		<p> Oletko varma, että haluat poistaa käyttäjätilisi? </p>
		<form action="poistaKayttaja.php" method="post">
			<input type="submit" value="Vahvista poisto" >
		</form>
		<form action="peruuta.php" method="get">
			<input type="submit" value="Peruuta" >
		</form>
	</body>
</html>
