<?php
?>
<!DOCTYPE html>
<html>
        <head>
                <title> Etusivu </title>
        </head>
        <body>
                <h1> Elokuva-arkisto </h1>                
                <p> Tämän sivuston tarkoituksena on antaa mahdollisuus yksityishenkilöille luoda oma elokuva-arkisto. Arkistot on tarkoitettu omaan käyttöön, joten muut eivät pysty seuraamaan luomaasi arkistoa.</p>
                <form>
                        Käyttäjätunnus: <input type="text" name="Käyttäjätunnus"><br>
                        Salasana: <input type="password" name="Salasana"><br>
                </form>
                <form name="kirjaudu" action="pääsivu.php" method="get">
                        <input type="submit" value="Kirjaudu">
                </form>
                <p> Jos et ole vielä rekisteröitynyt, voit tehdä sen alla olevan linkin kautta!</p>
                <form name="rekisteröidy" action="rekisteröityminen.php" method="get">
                        <input type="submit" value="Rekisteröidy">
                </form>
        </body>
</html>
