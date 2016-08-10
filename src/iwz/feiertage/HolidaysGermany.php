<?php

namespace iwz\feiertage {
	
	/**
	 * PHP Helper class for german holidiays.
	 * Computes movable holidays, i.e. christian holidays.
	 *
	 * @author maxmeffert
	 * @link https://de.wikipedia.org/wiki/Feiertage_in_Deutschland
	 *
	 */
	class HolidaysGermany {
	
		const FEIERTAG_NONE                   = -1;
		const FEIERTAG_NEUJAHRSTAG            = 0;
		const FEIERTAG_HEILIGEDREIKOENIGE     = 1;
		const FEIERTAG_GRUENDONNERSTAG        = 2;
		const FEIERTAG_KARFREITAG             = 3;
		const FEIERTAG_OSTERSONNTAG           = 4;
		const FEIERTAG_OSTERMONTAG            = 5;
		const FEIERTAG_TAGDERARBEIT           = 6;
		const FEIERTAG_CHRISTIHIMMELFAHRT     = 7;
		const FEIERTAG_PFINGSTSONNTAG         = 8;
		const FEIERTAG_PFINGATMONTAG          = 9;
		const FEIERTAG_FRONLEICHNAM           = 10;
		const FEIERTAG_AUGSBURGERFRIEDENSFEST = 11;
		const FEIERTAG_MARIAEHIMMELFAHRT      = 12;
		const FEIERTAG_TAGDERDEUTSCHENEINHEIT = 13;
		const FEIERTAG_REFORMATIONSTAG        = 14;
		const FEIERTAG_ALLERHEILIGEN          = 15;
		const FEIERTAG_BUSSUNDBETTAG          = 16;
		const FEIERTAG_ERSTERWEIHNACHTSTAG    = 17;
		const FEIERTAG_ZWEITERWEIHNACHTSTAG   = 18;
	
	
		/**
		 * The Gaussian Easter Algorithm (Gauss'sche Osterformel)
		 *
		 * @link http://de.wikipedia.org/wiki/Gau%C3%9Fsche_Osterformel
		 * @param int $X Year, e.g. 2015, 2016, etc.
		 * @return The date of easter sunday as day of march, i.e. 32.March == 1.April
		 */
		static public function GaussianEasterAlgorithm ($X) {
	
			$X = intval($X);
	
			$K = intval( $X / 100 );
			$M = intval( 15 + (3 * $K + 3) / 4 - (8 * $K + 13) / 25 );
			$S = intval( 2 - (3 * $K + 3) / 4 );
			$A = intval( $X % 19 );
			$D = intval( (19*$A + $M) % 30 );
			$R = intval( ($D + $A / 11) / 29 );
			$OG = intval( 21 + $D - $R );
			$SZ = intval( 7 - ($X + $X / 4 + $S) % 7 );
			$OE = intval( 7 - ($OG - $SZ) % 7 );
			$OS = intval( $OG + $OE );
	
			return $OS;
	
		}
	
		/**
		 *
		 * @var int
		 */
		private $jahr;
	
		private $neujahrstag;
		private $heiligeDreiKoenige;
		private $gruenDonnerstag;
		private $karFreitag;
		private $osterSonntag;
		private $osterMontag;
		private $tagDerArbeit;
		private $christiHimmelfahrt;
		private $pfingstSonntag;
		private $pfingstMontag;
		private $fronleichnam;
		private $augsburgerFriedensfest;
		private $mariaeHimmelfahrt;
		private $tagDerDeutschenEinheit;
		private $reformationstag;
		private $allerheiligen;
		private $bussUndBettag;
		private $ersterWeihnachtstag;
		private $zweiterWeihnachtstag;
	
		/**
		 *
		 * @param int $jahr
		 */
		public function __construct ($jahr) {
	
			$this->jahr = intval($jahr);
	
			$os = self::GaussianEasterAlgorithm($this->jahr);
			$monat = 3;
	
	
			if (31 < $os) {
					
				$os = $os % 31;
				$monat = 4;
					
			}
	
			$osterSonntag = new \DateTime("{$this->jahr}-{$monat}-{$os}");
	
	
			$this->neujahrstag = new \DateTime("{$this->jahr}-01-01");
			$this->heiligeDreiKoenige = new \DateTime("{$this->jahr}-01-06");
	
			$this->gruenDonnerstag = clone($osterSonntag);
			$this->gruenDonnerstag->modify("-3 days");
	
			$this->karFreitag = clone($osterSonntag);
			$this->karFreitag->modify("-2 days");
	
			$this->osterSonntag = clone($osterSonntag);
	
			$this->osterMontag = clone($osterSonntag);
			$this->osterMontag->modify("+1 days");
	
			$this->tagDerArbeit = new \DateTime("{$this->jahr}-05-01");
	
			$this->christiHimmelfahrt = clone($osterSonntag);
			$this->christiHimmelfahrt->modify("+39 days");
	
			$this->pfingstSonntag = clone($osterSonntag);
			$this->pfingstSonntag->modify("+49 days");
	
			$this->pfingstMontag = clone($osterSonntag);
			$this->pfingstMontag->modify("+50 days");
	
			$this->fronleichnam = clone($osterSonntag);
			$this->fronleichnam->modify("+60 days");
	
			$this->augsburgerFriedensfest = new \DateTime("{$this->jahr}-08-08");
			$this->mariaeHimmelfahrt = new \DateTime("{$this->jahr}-08-15");
			$this->tagDerDeutschenEinheit = new \DateTime("{$this->jahr}-10-03");
			$this->reformationstag = new \DateTime("{$this->jahr}-10-31");
			$this->allerheiligen = new \DateTime("{$this->jahr}-11-01");
	
			$this->bussUndBettag = new \DateTime("{$this->jahr}-11-23");
	
			while ($this->bussUndBettag->format("N") != 3) {
					
				$this->bussUndBettag->modify("-1 days");
					
			}
	
			$this->ersterWeihnachtstag = new \DateTime("{$this->jahr}-12-25");
			$this->zweiterWeihnachtstag = new \DateTime("{$this->jahr}-12-26");
	
	
		}
	
		/**
		 *
		 * @return int
		 */
		public function getJahr () {
	
			return $this->jahr;
	
		}
	
		/**
		 * @return \DateTime
		 */
		public function getNeujahrstag () {
	
			return clone($this->neujahrstag);
	
		}
	
		/**
		 * @return \DateTime
		 */
		public function getHeiligeDreiKoenige () {
	
			return clone($this->heiligeDreiKoenige);
	
		}
	
		/**
		 * @return \DateTime
		 */
		public function getGruenDonnerstag () {
	
			return clone($this->gruenDonnerstag);
	
		}
	
		/**
		 * @return \DateTime
		 */
		public function getKarFreitag () {
	
			return clone($this->karFreitag);
	
		}
	
		/**
		 * @return \DateTime
		 */
		public function getOsterSonntag () {
	
			return clone($this->osterSonntag);
	
		}
	
		/**
		 * @return \DateTime
		 */
		public function getOsterMontag () {
	
			return clone($this->osterMontag);
	
		}
	
		/**
		 * @return \DateTime
		 */
		public function getTagDerArbeit () {
	
			return clone($this->tagDerArbeit);
	
		}
	
		/**
		 * @return \DateTime
		 */
		public function getChristiHimmelfahrt () {
	
			return clone($this->christiHimmelfahrt);
	
		}
	
		/**
		 * @return \DateTime
		 */
		public function getPfingstSonntag () {
	
			return clone($this->pfingstSonntag);
	
		}
	
		/**
		 * @return \DateTime
		 */
		public function getPfingstMontag () {
	
			return clone($this->pfingstMontag);
	
		}
	
		/**
		 * @return \DateTime
		 */
		public function getFronLeichnam () {
	
			return clone($this->fronleichnam);
	
		}
	
		/**
		 * @return \DateTime
		 */
		public function getAugsburgertFriedensfest () {
	
			return clone($this->augsburgerFriedensfest);
	
		}
	
		/**
		 * @return \DateTime
		 */
		public function getMariaeHimmelfahrt () {
	
			return clone($this->mariaeHimmelfahrt);
	
		}
	
		/**
		 * @return \DateTime
		 */
		public function getTagDerDeutschenEinheit () {
	
			return clone($this->tagDerDeutschenEinheit);
	
		}
	
		/**
		 * @return \DateTime
		 */
		public function getReformationstag () {
	
			return clone($this->reformationstag);
	
		}
	
		/**
		 * @return \DateTime
		 */
		public function getAllerheiligen () {
	
			return clone($this->allerheiligen);
	
		}
	
		/**
		 * @return \DateTime
		 */
		public function getBussUndBettag () {
	
			return clone($this->bussUndBettag);
	
		}
	
		/**
		 * @return \DateTime
		 */
		public function getErsterWeihnachtstag () {
	
			return clone($this->ersterWeihnachtstag);
	
		}
	
		/**
		 * @return \DateTime
		 */
		public function getZweiterWeihnachtstag () {
	
			return clone($this->zweiterWeihnachtstag);
	
		}
	
		/**
		 *
		 * @return multitype:DateTime
		 */
		public function toArray () {
	
			$array = array();
	
			$array[self::FEIERTAG_NEUJAHRSTAG] = $this->getNeujahrstag();
			$array[self::FEIERTAG_HEILIGEDREIKOENIGE] = $this->getHeiligeDreiKoenige();
			$array[self::FEIERTAG_GRUENDONNERSTAG] = $this->getGruenDonnerstag();
			$array[self::FEIERTAG_KARFREITAG] = $this->getKarFreitag();
			$array[self::FEIERTAG_OSTERSONNTAG] = $this->getOsterSonntag();
			$array[self::FEIERTAG_OSTERMONTAG] = $this->getOsterMontag();
			$array[self::FEIERTAG_TAGDERARBEIT] = $this->getTagDerArbeit();
			$array[self::FEIERTAG_CHRISTIHIMMELFAHRT] = $this->getChristiHimmelfahrt();
			$array[self::FEIERTAG_PFINGSTSONNTAG] = $this->getPfingstSonntag();
			$array[self::FEIERTAG_PFINGATMONTAG] = $this->getPfingstMontag();
			$array[self::FEIERTAG_FRONLEICHNAM] = $this->getFronLeichnam();
			$array[self::FEIERTAG_AUGSBURGERFRIEDENSFEST] = $this->getAugsburgertFriedensfest();
			$array[self::FEIERTAG_MARIAEHIMMELFAHRT] = $this->getMariaeHimmelfahrt();
			$array[self::FEIERTAG_TAGDERDEUTSCHENEINHEIT] = $this->getTagDerDeutschenEinheit();
			$array[self::FEIERTAG_REFORMATIONSTAG] = $this->getReformationstag();
			$array[self::FEIERTAG_ALLERHEILIGEN] = $this->getAllerheiligen();
			$array[self::FEIERTAG_BUSSUNDBETTAG] = $this->getBussUndBettag();
			$array[self::FEIERTAG_ERSTERWEIHNACHTSTAG] = $this->getErsterWeihnachtstag();
			$array[self::FEIERTAG_ZWEITERWEIHNACHTSTAG] = $this->getZweiterWeihnachtstag();
	
			return $array;
	
		}
	
		
		public function check (\DateTimeInterface $d) {
	
			foreach ($this->toArray() as $h) {
					
				if ($d == $h) {
	
					return true;
	
				}
					
			}
	
			return false;
	
		}
	
		public function which (\DateTimeInterface $d) {
	
			foreach ($this->toArray() as $which => $h) {
							
				if ($d == $h) {
						
					return $which;
						
				}

			}
	
			return self::FEIERTAG_NONE;
	
		}
	
		/**
		 *
		 * @return string
		 */
		public function __toString () {
	
			$format = "Y-m-d";
			$dates = $this->toArray();
	
			foreach ($dates as $i => $date) {
					
				/**
				 * @var $date \DateTime
				 */
					
				$dates[$i] = $date->format($format);
					
			}
	
			return "(".implode(", ", $dates).")";
	
		}
	
	}
	
}



?>