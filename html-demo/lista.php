<!DOCTYPE html>
<html>
	<head>
		<title> Tulokset </title>
	</head>
	<body>
		<h1> Listauksen tulokset </h1>
		<a href="pääsivu.php"> Palaa hakusivulle </a>
		<?php if (!empty($_GET['hakuSana'])): ?>
		<p> Hakusanasi oli <?php echo $_GET['hakuSana']; ?> </p>
		<?php endif; ?>
		<?php if (!empty($_GET['hakuNäyttelijä'])): ?>
		<p> Hakusanasi oli <?php echo $_GET['hakuNäyttelijä']; ?> </p>
		<?php endif; ?>
		<?php if (!empty($_GET['hakuOhjaaja'])): ?>
		<p> Hakusanasi oli <?php echo $_GET['hakuOhjaaja']; ?> </p>
		<?php endif; ?>
	</body>
</html>
