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
	
	/**
	 * Constant for the New Year's Day
	 * @var integer
	 */
	const NEUJAHRSTAG = 0;
	
	/**
	 * Constant for the Twelfth Day
	 * @var integer
	 */
	const HEILIGEDREIKOENIGE = 1;
	
	/**
	 * Constant for the Holy Thursday
	 * @var integer
	 */
	const GRUENDONNERSTAG = 2;
	
	/**
	 * Constant for the Good Friday
	 * @var integer
	 */
	const KARFREITAG = 3;
	
	/**
	 * Constant for the Easter Sunday
	 * @var integer
	 */
	const OSTERSONNTAG = 4;
	
	/**
	 * Constant for the Easter Monday
	 * @var integer
	 */
	const OSTERMONTAG = 5;
	
	/**
	 * Constant for the Labour Day
	 * @var integer
	 */
	const TAGDERARBEIT = 6;
	
	/**
	 * Constant for the Ascension Day
	 * @var integer
	 */
	const CHRISTIHIMMELFAHRT = 7;
	
	/**
	 * Constant for the Whit Sunday
	 * @var integer
	 */
	const PFINGSTSONNTAG = 8;
	
	/**
	 * Constant for the Whit Monday
	 * @var integer
	 */
	const PFINGSTMONTAG = 9;
	
	/**
	 * Constant for the Feast of Corpus Christi
	 * @var integer
	 */
	const FRONLEICHNAM = 10;
	
	/**
	 * Constant for the Augsburg's Feast of Peace
	 * 
	 * This is only a holiday for Augsburg city!
	 *  
	 * @var integer
	 */
	const AUGSBURGERFRIEDENSFEST = 11;
	
	/**
	 * Constant for the Feast of the Assumption
	 * @var integer
	 */
	const MARIAEHIMMELFAHRT = 12;
	
	/**
	 * Constant for the German Unity Day
	 * @var integer
	 */
	const TAGDERDEUTSCHENEINHEIT = 13;
	
	/**
	 * Constant for the Reformation Day
	 * @var integer
	 */
	const REFORMATIONSTAG = 14;
	
	/**
	 * Constant for the All Saints' Day
	 * @var integer
	 */
	const ALLERHEILIGEN = 15;
	
	/**
	 * Constant for the Penance Day
	 * @var integer
	 */
	const BUSSUNDBETTAG = 16;
	
	/**
	 * Constant for the 1st Christmas Day
	 * @var integer
	 */
	const ERSTERWEIHNACHTSTAG = 17;
	
	/**
	 * Constant for the 2nd Christmas Day
	 * @var integer
	 */
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
	 * 
	 * @param int $jahr
	 * @return \DateTime
	 */
	static public function NeujahrsTag (int $jahr = null) : \DateTime {
		
		if (is_null($jahr)) {
			$jahr = self::Jahr();
		}
		
		return new \DateTime("$jahr-01-01");
		
		
	}
	
	/**
	 * 
	 * @param int $jahr
	 * @return \DateTime
	 */
	static public function HeiligeDreiKoenige (int $jahr = null) : \DateTime {
		
		if (is_null($jahr)) {
			$jahr = self::Jahr();
		}
		
		return new \DateTime("$jahr-01-06");
		
	}
	
	/**
	 * 
	 * @param \DateTime $d
	 * @return \DateTime
	 */
	static public function OsterSonntag (int $jahr = null) : \DateTime {
		
		return Easter::date($jahr);
		
	}
	
	/**
	 * 
	 * @param \DateTime $d
	 * @param bool $osterSonntag
	 * @return \DateTime
	 */
	static public function OsterMontag (int $jahr = null, \DateTime $osterSonntag = null) : \DateTime {
		
		if (is_null($jahr)) {
			
			$jahr = self::Jahr();
			
		}
		
		$osterMontag = is_null($osterSonntag) ? self::OsterSonntag($jahr) : clone $osterSonntag;
		$osterMontag->modify("+1 days");
			
		return $osterMontag;
		
	}
	
	/**
	 * 
	 * @param int $jahr
	 * @return \DateTime
	 */
	static public function BussUndBettag (int $jahr = null) : \DateTime {
		
		if (is_null($jahr)) {
			
			$jahr = self::Jahr();
			
		}
		
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
	 * @param int $jahr The year.
	 * @return \intrawarez\feiertage\Feiertage
	 */
	static public function of (int $jahr = null) : Feiertage {
		
		if (is_null($jahr)) {
			
			$jahr = self::Jahr();
			
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
	private function __construct(int $jahr) {
		
		$this->jahr = $jahr;
		
// 		$os = self::GaussianEasterAlgorithm ( $this->jahr );
// 		$monat = 3;
		
// 		if (31 < $os) {
			
// 			$os = $os % 31;
// 			$monat = 4;
// 		}
		
// 		$osterSonntag = new \DateTime ( "{$this->jahr}-{$monat}-{$os}" );

// 		var_dump(new \DateTime("$jahr-01-01"));
		
		$osterSonntag = self::OsterSonntag($this->jahr);
				
// 		$this->feiertage[self::NEUJAHRSTAG] = new \DateTime ( "{$this->jahr}-01-01" );
		$this->feiertage[self::NEUJAHRSTAG] = self::NeujahrsTag($jahr);
		
// 		$this->feiertage[self::HEILIGEDREIKOENIGE] = new \DateTime ( "{$this->jahr}-01-06" );
		$this->feiertage[self::HEILIGEDREIKOENIGE] = self::HeiligeDreiKoenige($jahr);
		
		$this->feiertage[self::GRUENDONNERSTAG] = clone ($osterSonntag);
		$this->feiertage[self::GRUENDONNERSTAG]->modify ( "-3 days" );
		
		$this->feiertage[self::KARFREITAG] = clone ($osterSonntag);
		$this->feiertage[self::KARFREITAG]->modify ( "-2 days" );
		
		$this->feiertage[self::OSTERSONNTAG] = clone ($osterSonntag);
		
		$this->feiertage[self::OSTERMONTAG] = self::OsterMontag($jahr, $osterSonntag);
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
		
		$this->feiertage[self::BUSSUNDBETTAG] = self::BussUndBettag($jahr);
		
		// For Buss-Und-Bettag compute the first wednesday before Nov 23.!
		// init with 22, because 23 may be a wednesday
// 		$this->feiertage[self::BUSSUNDBETTAG] = new \DateTime ( "{$this->jahr}-11-22" );
		
// 		while ( $this->feiertage[self::BUSSUNDBETTAG]->format ( "N" ) != 3 ) {
			
// 			$this->feiertage[self::BUSSUNDBETTAG]->modify ( "-1 days" );
// 		}
		
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
	 * Gets the iterator corresponding to the Feiertage instance.
	 * 
	 * @return \Iterator The Iterator
	 */
	public function getIterator () : \Iterator {
		
		return new \ArrayIterator($this->toArray());
		
	}
	
	/**
	 * Whether a date for a given offset exists.
	 * A valid offset is one of the constants: Feiertage::NEUJAHRSTAGE, etc.
	 * 
	 * @param int $offset The given offset.
	 * @return bool Whether the offset exists.
	 */
	public function offsetExists($offset) : bool {
				
		return isset($this->feiertage[$offset]);
		
	}
	
	/**
	 * Gets the date for a given offset.
	 * A valid offset is one of the constants: Feiertage::NEUJAHRSTAGE, etc.
	 * 
	 * @param int $offset The given offset.
	 * @return \DateTime The date mapped to the offset.
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