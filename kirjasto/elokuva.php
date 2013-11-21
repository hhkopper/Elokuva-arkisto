<?php
require_once "yhteys.php";
class Elokuva {

	function asetaElokuvanTiedot($numero, $kesto, $ikaraja, $vuosi) {
		$sql="INSERT INTO elokuva (nimi, numero, kesto, ikaraja, valmistusvuosi, genre, maat, kielet, kayttaja) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?) returning idtunnus";
		$kysely = annaYhteys() ->prepare($sql);
		$kysely->execute(array($_POST['nimi'], $numero, $kesto, $ikaraja, $vuosi, $_POST['genre'], $_POST['maat'], $_POST['kielet'], $_SESSION['kirjautunut']->getKayttajaId()));
		$elokuvaId = $kysely->fetchColumn();
		return $elokuvaId;
	}

	public function asetaNayttelija($nimi, $elokuva) {
		if($nimi != null) {

			$sql="SELECT idtunnus FROM henkilo WHERE nimi LIKE ?";
			$kysely = annaYhteys() ->prepare($sql);
			$kysely->execute(array($nimi));
			$tulos = $kysely->fetchColumn();

			if($tulos == false) {
				self::asetaTietokantaanNayttelija($nimi, $elokuva);
			} else {
				self::asetaRoolisuoritus($tulos, $elokuva);	
			}
		}
	}

	private function asetaTietokantaanNayttelija($nimi, $elokuva) {
		$sql="INSERT INTO henkilo(nimi) VALUES (?) returning idtunnus";
		$kysely = annaYhteys() ->prepare($sql);
		$kysely->execute(array($nimi));
		$henkiloId = $kysely->fetchColumn();
		self::asetaRoolisuoritus($henkiloId, $elokuva);
	}

	private function asetaRoolisuoritus($tunnus, $elokuva) {
		$sql="INSERT INTO roolisuoritus(elokuva, nayttelija) VALUES (?, ?)";
		$kysely = annaYhteys() ->prepare($sql);
		$kysely->execute(array($elokuva,  $tunnus));
	}

	function  asetaOhjaaja($nimi, $elokuva) {
		if($nimi != null) {
			$sql = "SELECT idtunnus FROM henkilo WHERE nimi LIKE ?";
			$kysely = annaYhteys() ->prepare($sql);
			$kysely->execute(array($nimi));
			$tulos = $kysely->fetchColumn();

			if($tulos == false) {
				self::asetaTietokantaanOhjaaja($nimi, $elokuva);
			} else {
				self::asetaOhjaus($tulos, $elokuva);
			}
		}
	}

	private function asetaTietokantaanOhjaaja($nimi, $elokuva) {
		$sql="INSERT INTO henkilo(nimi) VALUES (?) returning idtunnus";
		$kysely = annaYhteys() ->prepare($sql);
		$kysely->execute(array($nimi));
		$henkiloId = $kysely->fetchColumn();
		self::asetaOhjaus($henkiloId, $elokuva);
	}

	private function asetaOhjaus($tunnus, $elokuva) {
		$sql="INSERT INTO ohjaus(elokuva, ohjaaja) VALUES (?, ?)";
		$kysely = annaYhteys() ->prepare($sql);
		$kysely->execute(array($elokuva,  $tunnus));
	}

	function haeElokuvat($hakusana) {
		$sql="SELECT idtunnus, nimi, numero FROM elokuva WHERE nimi LIKE ?";
		$kysely = annaYhteys() ->prepare($sql);
		$kysely->execute(array($hakusana));
		$tulos = $kysely->fetchAll(PDO::FETCH_ASSOC);
		return $tulos;
	}

	function poistaElokuva($elokuvanId) {
		self::poistaRoolitukset($elokuvanId);
		$sql = "DELETE FROM elokuva WHERE idtunnus=?";
		$kysely = annaYhteys() -> prepare($sql);
		$kysely -> execute(array($elokuvanId));
	}

	private function etsiPoistettavatRoolitukset($elokuvanId) {
		$sql = "SELECT idtunnus FROM roolisuoritus WHERE elokuva=?";
		$kysely = annaYhteys() -> prepare($sql);
		$kysely -> execute(array($elokuvanId));
		return $tulos = $kysely -> fetchAll(PDO::fetch_assoc);
	}

	private function poistaRoolitukset($elokuvanId) {
		$poistettavat = self::etsiPoistettavatRoolitukset($elokuvanId);
		foreach($poistettavat as $poistettava => $id ) {
			$sql = "DELETE FROM roolisuoritus WHERE idtunnus=?";
			$kysely = annaYhteys() ->prepare($sql);
			$kysely -> execute(array($id['idtunnus']));
		}
	}
}
