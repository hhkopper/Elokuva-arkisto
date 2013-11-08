<?php
require_once "yhteys.php";
class Kayttaja {

	private $idtunnus;
	private $kayttajatunnus;
	private $salasana;

	public static function getKayttajat() {
		$sql = "SELECT idtunnus, kayttajatunnus, salasana FROM kayttaja";
		$kysely = annaYhteys() ->prepare($sql); $kysely->execute();

		$tulokset = array();
		foreach($kysely->fetchAll() as $tulos) {
			$kayttaja = new Kayttaja();
			foreach($tulos as $kentta => $arvo) {
        			$kayttaja->$kentta = $arvo;
     			}
			$tulokset[] = $kayttaja;
		}
		return $tulokset;
	}

	public function getKayttajatunnus() {
		return $this->kayttajatunnus;
 	}

	public function getSalasana() {
		return $this->salasana;
	}
}
