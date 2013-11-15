<!DOCTYPE html>
<html>
	<head> 
		<title>Rekisteröidy</title>
	</head>
	<body>
		<h1> Rekisteröidy </h1>
		<p> Rekisteröitymiseen vaaditaan käyttäjä tunnus, salasana ja oman arkiston nimeäminen.</p>
		<form>
			Käyttäjätunnus: <input type="text" name="käyttäjätunnus"><br>
			Salasana: <input type="password" name="salasana"><br>
			Salasana: <input type="password" name="salasanaVahva"><br>
			
		</form>
		<form name="valmis" action="pääsivu.php" method="post">
			<input type="submit" value="Valmis">
		</form>
		<form action="palaaAlkuun.php" method="get">
			<input type="submit" value="Peruuta">
		</form>
	</body>

