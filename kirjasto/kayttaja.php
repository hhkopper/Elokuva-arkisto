<?php
require_once "yhteys.php";
class Kayttaja {

	private $idtunnus;
	private $kayttajatunnus;
	private $salasana;

	public static function getKayttaja($kayttaja, $sana) {
		$sql = "SELECT idtunnus, kayttajatunnus, salasana FROM kayttaja where kayttajatunnus = ? AND salasana = ?";
		$kysely = annaYhteys() ->prepare($sql); 
		$kysely->execute(array($kayttaja, $sana));

		$tulokset = $kysely -> fetchObject();
		if($tulokset == null) {
			return null;
		} else {
			$kayttaja = new Kayttaja();
			foreach($tulokset as $kentta => $arvo) {
				$kayttaja->$kentta = $arvo;
			}
		return $kayttaja;
		}
	}

	public function getKayttajaId() {
		return $this->idtunnus;
	}

	public function getKayttajatunnus() {
		return $this->kayttajatunnus;
 	}

	public function getSalasana() {
		return $this->salasana;
	}
	
	function kayttajatunnusVapaa($tunnus) {
		$sql= "SELECT kayttajatunnus FROM kayttaja WHERE kayttajatunnus=?";
		$kysely = annaYhteys() -> prepare($sql);
		$kysely -> execute(array($tunnus));
		$tulos = $kysely->fetchColumn();
		
		if (!empty($tulos)) {
			return false;
		} else {
			return true;
		}
	}
	
	function luoUusiKayttaja($tunnus, $salasana) {
		$sql = "INSERT INTO kayttaja (kayttajatunnus, salasana) VALUES (?,?)";
		$kysely = annaYhteys() -> prepare($sql);
		$kysely -> execute(array($tunnus, $salasana));
	}
	
	function haeKayttajaTiedot($id) {
		$sql = "SELECT kayttajatunnus, salasana FROM kayttaja WHERE idtunnus=?";
		$kysely = annaYhteys() -> prepare($sql);
		$kysely -> execute(array($id));
		$tulos = $kysely->fetchAll(PDO::FETCH_ASSOC);
		return $tulos;
	}


	function vaihdaSalasana($salasana, $id) {
		$sql = "UPDATE kayttaja SET salasana=? WHERE idtunnus=?";
		$kysely = annaYhteys() -> prepare($sql);
		$kysely -> execute(array($salasana, $id));
	}
	
	function poistaKayttaja($id) {
		 $sql = "DELETE FROM kayttaja WHERE idtunnus=?";
		 $kysely = annaYhteys() -> prepare($sql);
		 $kysely -> execute(array($id));
	}
}
