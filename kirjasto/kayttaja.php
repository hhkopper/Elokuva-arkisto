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
}
