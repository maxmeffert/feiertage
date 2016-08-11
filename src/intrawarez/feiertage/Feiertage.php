<?php

namespace intrawarez\feiertage;

/**
 * PHP Helper class for german holidiays.
 * Computes movable holidays, i.e. christian holidays.
 *
 * @author maxmeffert
 * @link https://de.wikipedia.org/wiki/Feiertage_in_Deutschland
 *      
 */
class Feiertage implements \ArrayAccess, \IteratorAggregate {
	
	/* ===========================================================
	 * Constants
	 * ===========================================================
	 */
	
	const FEIERTAG_NONE = - 1;
	
	const FEIERTAG_NEUJAHRSTAG = 0;
	const FEIERTAG_HEILIGEDREIKOENIGE = 1;
	const FEIERTAG_GRUENDONNERSTAG = 2;
	
	const FEIERTAG_KARFREITAG = 3;
	const FEIERTAG_OSTERSONNTAG = 4;
	const FEIERTAG_OSTERMONTAG = 5;
	
	const FEIERTAG_TAGDERARBEIT = 6;
	const FEIERTAG_CHRISTIHIMMELFAHRT = 7;
	const FEIERTAG_PFINGSTSONNTAG = 8;
	
	const FEIERTAG_PFINGATMONTAG = 9;
	const FEIERTAG_FRONLEICHNAM = 10;
	const FEIERTAG_AUGSBURGERFRIEDENSFEST = 11;
	
	const FEIERTAG_MARIAEHIMMELFAHRT = 12;
	const FEIERTAG_TAGDERDEUTSCHENEINHEIT = 13;
	const FEIERTAG_REFORMATIONSTAG = 14;
	
	const FEIERTAG_ALLERHEILIGEN = 15;
	const FEIERTAG_BUSSUNDBETTAG = 16;
	const FEIERTAG_ERSTERWEIHNACHTSTAG = 17;
	const FEIERTAG_ZWEITERWEIHNACHTSTAG = 18;
	
	/* ===========================================================
	 * Utility Methods
	 * ===========================================================
	 */
	
	/**
	 * The Gaussian Easter Algorithm (Gauss'sche Osterformel)
	 *
	 * @link http://de.wikipedia.org/wiki/Gau%C3%9Fsche_Osterformel
	 * @param int $X Year, e.g. 2015, 2016, etc.
	 * @return int The date of easter sunday as day of march, i.e. 32.March == 1.April
	 */
	static public function GaussianEasterAlgorithm(int $X) : int {
		$X = intval ( $X );
		
		$K = intval ( $X / 100 );
		$M = intval ( 15 + (3 * $K + 3) / 4 - (8 * $K + 13) / 25 );
		$S = intval ( 2 - (3 * $K + 3) / 4 );
		$A = intval ( $X % 19 );
		$D = intval ( (19 * $A + $M) % 30 );
		$R = intval ( ($D + $A / 11) / 29 );
		$OG = intval ( 21 + $D - $R );
		$SZ = intval ( 7 - ($X + $X / 4 + $S) % 7 );
		$OE = intval ( 7 - ($OG - $SZ) % 7 );
		$OS = intval ( $OG + $OE );
		
		return $OS;
	}
	
	/**
	 * Gets either the current year or the year of a given date.
	 * 
	 * @param \DateTimeInterface $d The given date.
	 * @return int The year.
	 */
	static public function jahr (\DateTimeInterface $d = null) : int {
		
		if (is_null($d)) {
			
			$d = new \DateTime();
			
		}
		
		return intval($d->format("Y"));
		
	}
	
	/* ===========================================================
	 * Factory Method
	 * ===========================================================
	 */
	
	/**
	 * Creates a new Feiertage instance for a given year.
	 * 
	 * @param int $jahr The year.
	 * @return \intrawarez\feiertage\Feiertage
	 */
	static public function of ($jahr = null) : Feiertage {
		
		if (is_null($jahr)) {
			
			$jahr = self::jahr();
			
		}
		elseif ($jahr instanceof \DateTimeInterface) {
			
			$jahr = self::jahr($jahr);
			
		}
		else {
			
			$jahr = intval($jahr);
			
		}
		
		return new Feiertage ( $jahr );
		
	}
	
	/* ===========================================================
	 * Static API Methods
	 * ===========================================================
	 */
	
	/**
	 * 
	 * @param \DateTimeInterface $d
	 * @return boolean
	 */
	static public function check (\DateTimeInterface $d) : boolean {
	
		$jahr = intval($d->format("Y"));
	
		return Feiertage::of($jahr)->contains($d);
	
	}
	
	/* ===========================================================
	 * Properties
	 * ===========================================================
	 */
	
	/**
	 * The year.
	 * @var int
	 */
	private $jahr;
	
	/**
	 * 
	 * @var array
	 */
	private $feiertage = [];
	
	/**
	 *
	 * @param int $jahr        	
	 */
	private function __construct($jahr) {
		$this->jahr = intval ( $jahr );
		
		$os = self::GaussianEasterAlgorithm ( $this->jahr );
		$monat = 3;
		
		if (31 < $os) {
			
			$os = $os % 31;
			$monat = 4;
		}
		
		$osterSonntag = new \DateTime ( "{$this->jahr}-{$monat}-{$os}" );
		
		$this->feiertage[self::FEIERTAG_NEUJAHRSTAG] = new \DateTime ( "{$this->jahr}-01-01" );
		$this->feiertage[self::FEIERTAG_HEILIGEDREIKOENIGE] = new \DateTime ( "{$this->jahr}-01-06" );
		
		$this->feiertage[self::FEIERTAG_GRUENDONNERSTAG] = clone ($osterSonntag);
		$this->feiertage[self::FEIERTAG_GRUENDONNERSTAG]->modify ( "-3 days" );
		
		$this->feiertage[self::FEIERTAG_KARFREITAG] = clone ($osterSonntag);
		$this->feiertage[self::FEIERTAG_KARFREITAG]->modify ( "-2 days" );
		
		$this->feiertage[self::FEIERTAG_OSTERSONNTAG] = clone ($osterSonntag);
		
		$this->feiertage[self::FEIERTAG_OSTERMONTAG] = clone ($osterSonntag);
		$this->feiertage[self::FEIERTAG_OSTERMONTAG]->modify ( "+1 days" );
		
		$this->feiertage[self::FEIERTAG_TAGDERARBEIT] = new \DateTime ( "{$this->jahr}-05-01" );
		
		$this->feiertage[self::FEIERTAG_CHRISTIHIMMELFAHRT] = clone ($osterSonntag);
		$this->feiertage[self::FEIERTAG_CHRISTIHIMMELFAHRT]->modify ( "+39 days" );
		
		$this->feiertage[self::FEIERTAG_PFINGSTSONNTAG] = clone ($osterSonntag);
		$this->feiertage[self::FEIERTAG_PFINGSTSONNTAG]->modify ( "+49 days" );
		
		$this->feiertage[self::FEIERTAG_PFINGATMONTAG] = clone ($osterSonntag);
		$this->feiertage[self::FEIERTAG_PFINGATMONTAG]->modify ( "+50 days" );
		
		$this->feiertage[self::FEIERTAG_FRONLEICHNAM] = clone ($osterSonntag);
		$this->feiertage[self::FEIERTAG_FRONLEICHNAM]->modify ( "+60 days" );
		
		$this->feiertage[self::FEIERTAG_AUGSBURGERFRIEDENSFEST] = new \DateTime ( "{$this->jahr}-08-08" );
		$this->feiertage[self::FEIERTAG_MARIAEHIMMELFAHRT] = new \DateTime ( "{$this->jahr}-08-15" );
		$this->feiertage[self::FEIERTAG_TAGDERDEUTSCHENEINHEIT] = new \DateTime ( "{$this->jahr}-10-03" );
		$this->feiertage[self::FEIERTAG_REFORMATIONSTAG] = new \DateTime ( "{$this->jahr}-10-31" );
		$this->feiertage[self::FEIERTAG_ALLERHEILIGEN] = new \DateTime ( "{$this->jahr}-11-01" );
		
		// For Buss-Und-Bettag compute the first wednesday before Nov 23.!
		// init with 22, because 23 may be a wednesday
		$this->feiertage[self::FEIERTAG_BUSSUNDBETTAG] = new \DateTime ( "{$this->jahr}-11-22" );
		
		while ( $this->feiertage[self::FEIERTAG_BUSSUNDBETTAG]->format ( "N" ) != 3 ) {
			
			$this->feiertage[self::FEIERTAG_BUSSUNDBETTAG]->modify ( "-1 days" );
		}
		
		$this->feiertage[self::FEIERTAG_ERSTERWEIHNACHTSTAG] = new \DateTime ( "{$this->jahr}-12-25" );
		$this->feiertage[self::FEIERTAG_ZWEITERWEIHNACHTSTAG] = new \DateTime ( "{$this->jahr}-12-26" );
	}
	
	/**
	 *
	 * @return int
	 */
	public function getJahr() {
		return $this->jahr;
	}
		
	/**
	 *
	 * @return DateTime[]
	 */
	public function toArray() {
		
		return array_merge($this->feiertage, []);
		
	}
	
	/**
	 * 
	 * @param \DateTimeInterface $d
	 * @return boolean
	 */
	public function contains (\DateTimeInterface $d) {
		
		foreach ( $this->toArray () as $h ) {
			
			if ($d == $h) {
				
				return true;
			}
		}
		
		return false;
	}
	
	/**
	 * 
	 * @param \DateTimeInterface $d
	 * @return \intrawarez\feiertage\DateTime|string
	 */
	public function which(\DateTimeInterface $d) {
		foreach ( $this->toArray () as $which => $h ) {
			
			if ($d == $h) {
				
				return $which;
			}
		}
		
		return self::FEIERTAG_NONE;
	}
	
	/**
	 * 
	 * @return \Iterator
	 */
	public function getIterator () : \Iterator {
		
		return new \ArrayIterator($this->toArray());
		
	}
	
	/**
	 * 
	 * @param unknown $offset
	 * @return bool
	 */
	public function offsetExists($offset) : bool {
				
		return isset($this->feiertage[$offset]);
		
	}
	
	/**
	 * 
	 * @param unknown $offset
	 * @return \DateTime
	 */
	public function offsetGet($offset) : \DateTime {
		
		return clone $this->feiertage[$offset];
		
	}
	
	/**
	 * Not Supported!
	 * 
	 * @param int $offset
	 * @param \DateTime $value
	 * @return bool
	 */
	public function offsetSet($offset, $value) : bool {
		
// 		throw new \Exception("This Method is not supported!");
		
		return false;
		
	}
	
	/**
	 * Not Supported!
	 * 
	 * @param int $offset
	 * @return bool
	 */
	public function offsetUnset($offset) : bool {
		
// 		throw new \Exception("This Method is not supported!");
		
		return false;
		
	}
}

?>