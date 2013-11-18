<?php
require_once "yhteys.php";
class Elokuva {

	function asetaElokuvanTiedot($numero, $kesto, $ikaraja, $vuosi) {
		$sql="INSERT INTO elokuva (nimi, numero, kesto, ikaraja, valmistusvuosi, genre, maat, kielet, kayttaja) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?) returning idtunnus";
		$kysely = annaYhteys() ->prepare($sql);
		$kysely->execute(array($_POST['nimi'], $numero, $kesto, $ikaraja, $vuosi, $_POST['genre'], $_POST['maat'], $_POST['kielet'], $_SESSION['kirjautunut']->getKayttajaId()));
	}

	public function asetaHenkilo($nimi) {
		if($nimi != null) {

			$sql="SELECT idtunnus FROM henkilo WHERE nimi LIKE ?";
			$kysely = annaYhteys() ->prepare($sql);
			$kysely->execute(array($nimi));

			if($kysely->fetchColumn() == false) {
				self::asetaTietokantaanHenkilo($nimi);
			} else {
				foreach($kysely->fetchAll() as $tulos) {			
					self::asetaRoolisuoritus($tulos);
				}
			}
		}

	}

	private function asetaTietokantaanHenkilo($nimi) {
		$sql="INSERT INTO henkilo(nimi) VALUES (?) returning idtunnus;";
		$kysely = annaYhteys() ->prepare($sql);
		$kysely->execute(array($nimi));	
		self::asetaRoolisuoritus($sql);
	}
	
	private function asetaRoolisuoritus($tunnus) {
		$elokuva = self::etsiElokuva($_POST['nimi']);
		$sql="INSERT INTO roolisuoritus(elokuva, nayttelija) VALUES (?, ?)";
		$kysely = annaYhteys() ->prepare($sql);
		$kysely->execute(array($elokuva, $tunnus));
	}

	private function etsiElokuva($nimi) {
		$sql="SELECT idtunnus FROM elokuva WHERE nimi LIKE ?";
		$kysely = annaYhteys() ->prepare($sql);
		$kysely->execute(array($nimi));
		return $tulos = $kysely->fetch();
	}
}
