<!DOCTYPE html>
<html>
	<head> 
		<title>Rekisteröidy</title>
	</head>
	<body>
		<h1> Rekisteröidy </h1>
		<p> Rekisteröitymiseen vaaditaan käyttäjä tunnus, salasana ja oman arkiston nimeäminen.</p>
		
		<?php if(!empty($data->virhe)): ?>
		<?php echo $data->virhe; ?>
		<?php endif; ?>
		<form action="rekisteroi.php" method="post">
			Käyttäjätunnus: <input type="text" value="<?php if (isset($data->lomake->kayttajatunnus)) echo $data->lomake->kayttajatunnus; ?>" name="kayttajatunnus"><br>
			Salasana: <input type="password" name="salasana"><br>
			Vahvista salasana: <input type="password" name="salasanaVahva"><br>
			<input type="submit" value="Valmis">
		</form>
		<form action="palaaAlkuun.php" method="get">
			<input type="submit" value="Peruuta">
		</form>
	</body>

