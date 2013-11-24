<?php
require_once "yhteys.php";
class Elokuva {

	function haeElokuvanNumero($id, $kayttaja) {
		$sql= "SELECT numero FROM elokuva WHERE idtunnus=? AND kayttaja=?";
		$kysely = annaYhteys() -> prepare($sql);
		$kysely -> execute(array($id, $kayttaja));
		$tulos = $kysely -> fetchColumn();
		return $tulos;
	}

	function haeElokuvanNimi($id, $kayttaja) {
		$sql="SELECT nimi FROM elokuva WHERE idtunnus=? AND kayttaja=?";
		$kysely = annaYhteys() -> prepare($sql);
		$kysely -> execute(array($id, $kayttaja));
		$tulos = $kysely -> fetchColumn();
		return $tulos;
	}

	function haeElokuvatNayttelijanMukaan($nimi) {
		$henkiloId = self::etsiHenkilo($nimi);
		if(!empty($henkiloId)) {
			$elokuvat = self::etsiRoolitukset($henkiloId);
			return $elokuvat;
		}
		return null;
	}

	private function etsiRoolitukset($id) {
		$sql="SELECT elokuva FROM roolisuoritus WHERE nayttelija=?";
		$kysely = annaYhteys() -> prepare($sql);
		$kysely -> execute(array($id));
		$tulokset = $kysely -> fetchAll(PDO::FETCH_ASSOC);
		return $tulokset;
	}

	private function etsiHenkilo($nimi) {
		$sql="SELECT idtunnus FROM henkilo WHERE nimi LIKE ?";
		$kysely = annaYhteys() -> prepare($sql);
		$kysely -> execute(array($nimi));
		$henkiloId = $kysely -> fetchColumn();
		return $henkiloId;
	}

	function haeAakkosjarjestyksessa() {
		$sql="SELECT idtunnus, nimi, numero FROM elokuva WHERE kayttaja=?  ORDER BY nimi ASC";
		$kysely = annaYhteys() -> prepare($sql);
		$kysely -> execute(array($_SESSION['kirjautunut']->getKayttajaId()));
		$tulokset = $kysely -> fetchAll(PDO::FETCH_ASSOC);
		return $tulokset;
	}

	function haeNumerojarjestyksessa() {
		$sql="SELECT idtunnus, nimi, numero FROM elokuva WHERE kayttaja=? ORDER BY numero ASC";
		$kysely = annaYhteys() -> prepare($sql);
		$kysely -> execute(array($_SESSION['kirjautunut']->getKayttajaId()));
		$tulokset = $kysely -> fetchAll(PDO::FETCH_ASSOC);
		return $tulokset;
	}


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
		$hakusana = "%$hakusana%";
		$sql="SELECT idtunnus, nimi, numero FROM elokuva WHERE nimi LIKE ? AND kayttaja=?";
		$kysely = annaYhteys() ->prepare($sql);
		$kysely->execute(array($hakusana, $_SESSION['kirjautunut']->getKayttajaId()));
		$tulos = $kysely->fetchAll(PDO::FETCH_ASSOC);
		return $tulos;
	}

	function haeElokuvaMuokattavaksi($elokuvaId) {
		$sql="SELECT * FROM elokuva WHERE idtunnus=?";
		$kysely=annaYhteys()->prepare($sql);
		$kysely->execute(array($elokuvaId));
		$tulos = $kysely -> fetchObject();
		return $tulos;
	}
	
	function haeOhjaajatMuokattavaksi($elokuvaId) {
		$sql="SELECT nimi FROM ohjaus INNER JOIN henkilo ON ohjaaja = henkilo.idtunnus WHERE elokuva=?";
		$kysely=annaYhteys()->prepare($sql);
		$kysely->execute(array($elokuvaId));
		$tulos = $kysely -> fetchAll(PDO::FETCH_COLUMN);
		return $tulos;
	}
	
	function haeNayttelijatMuokattavaksi($elokuvaId) {
		$sql="SELECT nimi FROM roolisuoritus INNER JOIN henkilo ON nayttelija = henkilo.idtunnus WHERE elokuva=?";
		$kysely=annaYhteys()->prepare($sql);
		$kysely->execute(array($elokuvaId));
		$tulos = $kysely -> fetchAll(PDO::FETCH_COLUMN);
		return $tulos;
	}

	function poistaElokuva($elokuvanId) {
		self::poistaRoolitukset($elokuvanId);
		self::poistaOhjaukset($elokuvanId);
		$sql = "DELETE FROM elokuva WHERE idtunnus=?";
		$kysely = annaYhteys() -> prepare($sql);
		$kysely -> execute(array($elokuvanId));
	}

	private function etsiPoistettavatRoolitukset($elokuvanId) {
		$sql = "SELECT idtunnus FROM roolisuoritus WHERE elokuva=?";
		$kysely = annaYhteys() -> prepare($sql);
		$kysely -> execute(array($elokuvanId));
		$tulos = $kysely -> fetchAll(PDO::FETCH_ASSOC);
		return $tulos;
	}

	private function etsiPoistettavatOhjaukset($elokuvanId) {
		$sql = "SELECT idtunnus FROM ohjaus WHERE elokuva=?";
		$kysely = annaYhteys() -> prepare($sql);
		$kysely -> execute(array($elokuvanId));
		$tulos = $kysely -> fetchAll(PDO::FETCH_ASSOC);
		return $tulos;
	}

	private function poistaRoolitukset($elokuvanId) {
		$poistettavat = self::etsiPoistettavatRoolitukset($elokuvanId);
		foreach($poistettavat as $poistettava => $id ) {
			$sql = "DELETE FROM roolisuoritus WHERE idtunnus=?";
			$kysely = annaYhteys() ->prepare($sql);
			$kysely -> execute(array($id['idtunnus']));
		}
	}

	private function poistaOhjaukset($elokuvaId) {
		$poistettavat = self::etsiPoistettavatOhjaukset($elokuvaId);
		foreach($poistettavat as $poistettava => $id) {
			$sql = "DELETE FROM ohjaus WHERE idtunnus=?";
			$kysely = annaYhteys() ->prepare($sql);
			$kysely -> execute(array($id['idtunnus']));
		}
	}

	function tallennaMuokatutElokuvanTiedot($numero, $ikaraja, $vuosi, $kesto, $elokuvanId) {
		$sql = "UPDATE elokuva SET nimi=?, numero=?, kesto=?, ikaraja=?, valmistusvuosi=?, genre=?, maat=?, kielet=? WHERE idtunnus=?";
		$kysely = annaYhteys() -> prepare($sql);
		$kysely -> execute(array($_POST['nimi'], $numero, $kesto, $ikaraja, $vuosi, $_POST['genre'], $_POST['maat'], $_POST['kielet'], $elokuvanId));
	}

	function tallennaMuokatutOhjaajat($ohjaaja1, $ohjaaja2, $ohjaaja3, $ohjaaja4, $ohjaaja5, $elokuvanId) {
		self::poistaOhjaukset($elokuvanId);
		self::asetaOhjaaja($ohjaaja1, $elokuvanId);
		self::asetaOhjaaja($ohjaaja2, $elokuvanId);
		self::asetaOhjaaja($ohjaaja3, $elokuvanId);
		self::asetaOhjaaja($ohjaaja4, $elokuvanId);
		self::asetaOhjaaja($ohjaaja5, $elokuvanId);
	}

	function tallennaMuokatutNayttelijat($nayttelija1, $nayttelija2, $nayttelija3, $nayttelija4, $nayttelija5, $elokuvaId) {
		self::poistaRoolitukset($elokuvaId);
		self::asetaNayttelija($nayttelija1, $elokuvaId);
		self::asetaNayttelija($nayttelija2, $elokuvaId);
		self::asetaNayttelija($nayttelija3, $elokuvaId);
		self::asetaNayttelija($nayttelija4, $elokuvaId);
		self::asetaNayttelija($nayttelija5, $elokuvaId);
	}
}
