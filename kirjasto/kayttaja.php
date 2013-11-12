<?php
require_once "yhteys.php";
class Kayttaja {

	private $idtunnus;
	private $kayttajatunnus;
	private $salasana;

	public static function getKayttaja($kayttaja, $sana) {
		$sql = "SELECT idtunnus, kayttajatunnus, salasana FROM kayttaja where kayttajatunnus = ? AND salasana = ?";
		$kysely = annaYhteys() ->prepare($sql); 
		$kysely->execute(array($kayttaja, $salasana));

		$tulokset = $kysely -> fetchObject();
		if($tulos == null) {
			return null;
		} else {
			$kayttaja = new Kayttaja();
			foreach($tulos as $kentta => $arvo) {
				$kayttaja->$kentta = $arvo;
			}
		return $kayttaja;
		}
	}

	public function getKayttajatunnus() {
		return $this->kayttajatunnus;
 	}

	public function getSalasana() {
		return $this->salasana;
	}
}
