<?php

namespace intrawarez\feiertage;

use intrawarez\sabertooth\optionals\OptionalInterface;
use intrawarez\sabertooth\optionals\Optionals;

/**
 * PHP class for german holidiays.
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
	
	const NEUJAHRSTAG = 0;
	const HEILIGEDREIKOENIGE = 1;
	const GRUENDONNERSTAG = 2;
	const KARFREITAG = 3;
	const OSTERSONNTAG = 4;
	const OSTERMONTAG = 5;
	const TAGDERARBEIT = 6;
	const CHRISTIHIMMELFAHRT = 7;
	const PFINGSTSONNTAG = 8;
	const PFINGSTMONTAG = 9;
	const FRONLEICHNAM = 10;
	const AUGSBURGERFRIEDENSFEST = 11;
	const MARIAEHIMMELFAHRT = 12;
	const TAGDERDEUTSCHENEINHEIT = 13;
	const REFORMATIONSTAG = 14;
	const ALLERHEILIGEN = 15;
	const BUSSUNDBETTAG = 16;
	const ERSTERWEIHNACHTSTAG = 17;
	const ZWEITERWEIHNACHTSTAG = 18;
	
	/* ===========================================================
	 * Utility Methods
	 * ===========================================================
	 */
	
	/**
	 * Gets either the current year or the year of a given date.
	 *
	 * @param \DateTimeInterface $d The given date.
	 * @return int The year.
	 */
	static public function Jahr (\DateTimeInterface $d = null) : int {
	
		if (is_null($d)) {
				
			$d = new \DateTime();
				
		}
	
		return intval($d->format("Y"));
	
	}
	
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
	 * 
	 * @param \DateTime $d
	 * @return \DateTime
	 */
	static public function OsterSonntag (\DateTime $d = null) : \DateTime {
		
		$jahr = self::Jahr($d);
		
		$os = self::GaussianEasterAlgorithm($jahr);
		$monat = 3;
		
		if (31 < $os) {
				
			$os = $os % 31;
			$monat = 4;
		}
		
		return new \DateTime("{$jahr}-{$monat}-{$os}");
		
	}
	
	/**
	 * 
	 * @param \DateTime $d
	 * @param bool $osterSonntag
	 * @return \DateTime
	 */
	static public function OsterMontag (\DateTime $d = null, bool $osterSonntag = false) : \DateTime {
		
		$osterMontag = !$osterSonntag ? self::OsterSonntag($d) : clone $d;
		$osterMontag->modify("+1 days");
			
		return $osterMontag;
		
	}
	
	/**
	 * 
	 * @param int $jahr
	 * @return \DateTime
	 */
	static public function BussUndBettag (int $jahr) : \DateTime {
		
		// For Buss-Und-Bettag compute the first wednesday before Nov 23.!
		// init with 22, because 23 may be a wednesday
		$bussUndBettag = new \DateTime("{$jahr}-11-22");
		
		while ($bussUndBettag->format("N") != 3) {
				
			$bussUndBettag->modify("-1 days");
			
		}
		
		return $bussUndBettag;
		
	}
	
	/* ===========================================================
	 * Factory Method
	 * ===========================================================
	 */
	
	/**
	 * Creates a new Feiertage instance for a given year.
	 * 
	 * @param int|\DateTimeInterface $jahr The year.
	 * @return \intrawarez\feiertage\Feiertage
	 */
	static public function of ($jahr = null) : Feiertage {
		
		if (is_null($jahr)) {
			
			$jahr = self::Jahr();
			
		}
		elseif ($jahr instanceof \DateTimeInterface) {
			
			$jahr = self::Jahr($jahr);
			
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
	 * Instance Properties
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
	
	/* ===========================================================
	 * Instance Constructor
	 * ===========================================================
	 */
	
	/**
	 *
	 * @param int $jahr        	
	 */
	private function __construct($jahr) {
		
		$this->jahr = intval ( $jahr );
		
// 		$os = self::GaussianEasterAlgorithm ( $this->jahr );
// 		$monat = 3;
		
// 		if (31 < $os) {
			
// 			$os = $os % 31;
// 			$monat = 4;
// 		}
		
// 		$osterSonntag = new \DateTime ( "{$this->jahr}-{$monat}-{$os}" );

// 		var_dump(new \DateTime("$jahr-01-01"));
		
		$osterSonntag = self::OsterSonntag(new \DateTime("{$this->jahr}-01-01"));
				
		$this->feiertage[self::NEUJAHRSTAG] = new \DateTime ( "{$this->jahr}-01-01" );
		
		$this->feiertage[self::HEILIGEDREIKOENIGE] = new \DateTime ( "{$this->jahr}-01-06" );
		
		$this->feiertage[self::GRUENDONNERSTAG] = clone ($osterSonntag);
		$this->feiertage[self::GRUENDONNERSTAG]->modify ( "-3 days" );
		
		$this->feiertage[self::KARFREITAG] = clone ($osterSonntag);
		$this->feiertage[self::KARFREITAG]->modify ( "-2 days" );
		
		$this->feiertage[self::OSTERSONNTAG] = clone ($osterSonntag);
		
		$this->feiertage[self::OSTERMONTAG] = self::OsterMontag($osterSonntag, true);
// 		$this->feiertage[self::OSTERMONTAG] = clone ($osterSonntag);
// 		$this->feiertage[self::OSTERMONTAG]->modify ( "+1 days" );
		
		$this->feiertage[self::TAGDERARBEIT] = new \DateTime ( "{$this->jahr}-05-01" );
		
		$this->feiertage[self::CHRISTIHIMMELFAHRT] = clone ($osterSonntag);
		$this->feiertage[self::CHRISTIHIMMELFAHRT]->modify ( "+39 days" );
		
		$this->feiertage[self::PFINGSTSONNTAG] = clone ($osterSonntag);
		$this->feiertage[self::PFINGSTSONNTAG]->modify ( "+49 days" );
		
		$this->feiertage[self::PFINGSTMONTAG] = clone ($osterSonntag);
		$this->feiertage[self::PFINGSTMONTAG]->modify ( "+50 days" );
		
		$this->feiertage[self::FRONLEICHNAM] = clone ($osterSonntag);
		$this->feiertage[self::FRONLEICHNAM]->modify ( "+60 days" );
		
		$this->feiertage[self::AUGSBURGERFRIEDENSFEST] = new \DateTime ( "{$this->jahr}-08-08" );
		$this->feiertage[self::MARIAEHIMMELFAHRT] = new \DateTime ( "{$this->jahr}-08-15" );
		$this->feiertage[self::TAGDERDEUTSCHENEINHEIT] = new \DateTime ( "{$this->jahr}-10-03" );
		$this->feiertage[self::REFORMATIONSTAG] = new \DateTime ( "{$this->jahr}-10-31" );
		$this->feiertage[self::ALLERHEILIGEN] = new \DateTime ( "{$this->jahr}-11-01" );
		
		// For Buss-Und-Bettag compute the first wednesday before Nov 23.!
		// init with 22, because 23 may be a wednesday
		$this->feiertage[self::BUSSUNDBETTAG] = new \DateTime ( "{$this->jahr}-11-22" );
		
		while ( $this->feiertage[self::BUSSUNDBETTAG]->format ( "N" ) != 3 ) {
			
			$this->feiertage[self::BUSSUNDBETTAG]->modify ( "-1 days" );
		}
		
		$this->feiertage[self::ERSTERWEIHNACHTSTAG] = new \DateTime ( "{$this->jahr}-12-25" );
		$this->feiertage[self::ZWEITERWEIHNACHTSTAG] = new \DateTime ( "{$this->jahr}-12-26" );
	}
	
	/* ===========================================================
	 * Getter/Setter
	 * ===========================================================
	 */
	
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
		
		$array = [];
		
		foreach ($this->feiertage as $key => $value) {
			
			$array[$key] = clone $value;
			
		}
		
		return $array;
		
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
	 * @return OptionalInterface
	 */
	public function keyOf (\DateTimeInterface $d) : OptionalInterface {
		
		foreach ($this as $key => $h ) {
			
			if ($d == $h) {
				
				return Optionals::HardOptionalOf($key);
				
			}
		}
		
		return Optionals::HardAbsent();
		
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