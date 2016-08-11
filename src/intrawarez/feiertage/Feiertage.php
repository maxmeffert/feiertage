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
		
		$this->feiertage[Feiertag::NEUJAHRSTAG] = Feiertag::Neujahrstag($jahr);
		$this->feiertage[Feiertag::HEILIGEDREIKOENIGE] = Feiertag::HeiligeDreiKoenige($jahr);
		$this->feiertage[Feiertag::GRUENDONNERSTAG] = Feiertag::GruenDonnerstag($jahr);
		$this->feiertage[Feiertag::KARFREITAG] = Feiertag::Karfreitag($jahr);
		$this->feiertage[Feiertag::OSTERSONNTAG] = Feiertag::OsterSonntag($jahr);
		$this->feiertage[Feiertag::OSTERMONTAG] = Feiertag::OsterMontag($jahr);
		$this->feiertage[Feiertag::TAGDERARBEIT] = Feiertag::TagDerArbeit($jahr);
		$this->feiertage[Feiertag::CHRISTIHIMMELFAHRT] = Feiertag::ChristiHimmelfahrt($jahr);
		$this->feiertage[Feiertag::PFINGSTSONNTAG] = Feiertag::PfingstSonntag($jahr);
		$this->feiertage[Feiertag::PFINGSTMONTAG] = Feiertag::PfingstMontag($jahr);
		$this->feiertage[Feiertag::FRONLEICHNAM] = Feiertag::Fronleichnam($jahr);
		$this->feiertage[Feiertag::AUGSBURGERFRIEDENSFEST] = Feiertag::AugsburgerFriedensfest($jahr);
		$this->feiertage[Feiertag::MARIAEHIMMELFAHRT] = Feiertag::MariaeHimmelfahrt($jahr);
		$this->feiertage[Feiertag::TAGDERDEUTSCHENEINHEIT] = Feiertag::TagDerDeutschenEinheit($jahr);
		$this->feiertage[Feiertag::REFORMATIONSTAG] = Feiertag::Reformationstag($jahr);
		$this->feiertage[Feiertag::ALLERHEILIGEN] = Feiertag::Allerheiligen($jahr);
		$this->feiertage[Feiertag::BUSSUNDBETTAG] = Feiertag::BussUndBettag($jahr);
		$this->feiertage[Feiertag::ERSTERWEIHNACHTSTAG] = Feiertag::ErsterWeihnachtstag($jahr);
		$this->feiertage[Feiertag::ZWEITERWEIHNACHTSTAG] = Feiertag::ZweiterWeihnachtstag($jahr);
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
	public function offsetGet($offset) : Feiertag {
		
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