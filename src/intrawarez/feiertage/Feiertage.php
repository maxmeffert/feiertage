<?php

namespace intrawarez\feiertage;

use intrawarez\sabertooth\optionals\OptionalInterface;
use intrawarez\sabertooth\optionals\Optionals;


/**
 * PHP7 class for legal holidiays in Germany.
 * Computes movable holidays, i.e. christian holidays, with the *Gaussian Easter Algorithm*.
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
	 * @param Feiertag|\DateTimeInterface $date
	 * @return boolean
	 */
	static public function check ($date) : boolean {
	
		if ($date instanceof Feiertag) {
			
			return true;
			
		}
		elseif ($date instanceof \DateTimeInterface) {
	
			
			return Feiertage::of(self::Jahr($date))->contains($d);
			
		}
		
		return false;	
	
	}
	
	/**
	 * 
	 * @param unknown $date
	 * @return OptionalInterface
	 */
	static public function which ($date) : OptionalInterface {
		
		if ($date instanceof Feiertag) {
				
			return Optionals::Of($date->getKey());
				
		}
		elseif ($date instanceof \DateTimeInterface) {
			
			return Feiertage::of(self::Jahr($date))->keyOf($date);
				
		}
		
		return Optionals::Absent();
		
	}
	
	/* ===========================================================
	 * Instance
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
		
	/**
	 *
	 * @return int
	 */
	public function getJahr() : int {
		return $this->jahr;
	}
	
	/**
	 *
	 * @return array
	 */
	public function toArray() : array {
	
		$array = [];
	
		foreach ($this->feiertage as $key => $value) {
				
			$array[$key] = clone $value;
				
		}
	
		return $array;
	
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
	
	/**
	 *
	 * @param \DateTimeInterface $date
	 * @return boolean
	 */
	public function contains (\DateTimeInterface $date) : bool {
	
		/**
		 * @var Feiertag $f
		 */
	
		foreach ($this as $f) {
				
			if ($f->getDate() == $date) {
	
				return true;
			}
		}
	
		return false;
	
	}
	
	/**
	 *
	 * @param \DateTimeInterface $date
	 * @return OptionalInterface
	 */
	public function keyOf (\DateTimeInterface $date) : OptionalInterface {
	
		/**
		 * @var Feiertag $f
		 */
		
		foreach ($this as $key => $f ) {
				
			if ($f->getDate() == $date) {
	
				return Optionals::Of($key);
	
			}
		}
	
		return Optionals::Absent();
	
	}
	
}

?>