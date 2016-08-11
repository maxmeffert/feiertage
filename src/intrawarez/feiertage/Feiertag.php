<?php

namespace intrawarez\feiertage;

/**
 * 
 * @author maxmeffert
 *
 */
class Feiertag {
	
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
	
	static public function keys () : array {
		
		$class = new \ReflectionClass(self::class);
		
		return $class->getConstants();
		
	}
	
	/* ===========================================================
	 * Factory Methods
	 * ===========================================================
	 */
	
	static public function Neujahrstag (int $jahr) : Feiertag {
		return new Feiertag(self::NEUJAHRSTAG, new \DateTimeImmutable("$jahr-01-01"));
	}
	
	static public function HeiligeDreiKoenige (int $jahr) : Feiertag {
		return new Feiertag(self::HEILIGEDREIKOENIGE, new \DateTimeImmutable("$jahr-01-06")); 
	}
	
	static public function GruenDonnerstag (int $jahr) : Feiertag {
		return new Feiertag(self::GRUENDONNERSTAG, Easter::date($jahr)->modify("-3 days"));
	}
	
	static public function Karfreitag (int $jahr) : Feiertag {
		return new Feiertag(self::KARFREITAG, Easter::date($jahr)->modify("-2 days"));
	}
	
	static public function OsterSonntag (int $jahr) : Feiertag {
		return new Feiertag(self::OSTERSONNTAG, Easter::date($jahr));
	}
	
	static public function OsterMontag (int $jahr) : Feiertag {
		return new Feiertag(self::OSTERMONTAG, Easter::date($jahr)->modify("+1 days"));
	}
	
	static public function TagDerArbeit (int $jahr) : Feiertag {
		return new Feiertag(self::TAGDERARBEIT, new \DateTimeImmutable("$jahr-05-01"));
	}
	
	static public function ChristiHimmelfahrt (int $jahr) : Feiertag {
		return new Feiertag(self::CHRISTIHIMMELFAHRT, Easter::date($jahr)->modify("+39 days"));
	}
	
	static public function PfingstSonntag (int $jahr) : Feiertag {
		return new Feiertag(self::PFINGSTSONNTAG, Easter::date($jahr)->modify("+49 days"));
	}
	
	static public function PfingstMontag (int $jahr) : Feiertag {
		return new Feiertag(self::PFINGSTMONTAG, Easter::date($jahr)->modify("+50 days"));
	}
	
	static public function Fronleichnam (int $jahr) : Feiertag {
		return new Feiertag(self::FRONLEICHNAM, Easter::date($jahr)->modify("+60 days"));
	}
	
	static public function AugsburgerFriedensfest (int $jahr) : Feiertag {
		return new Feiertag(self::AUGSBURGERFRIEDENSFEST, new \DateTimeImmutable("$jahr-08-08"));
	}

	static public function MariaeHimmelfahrt (int $jahr) : Feiertag {
		return new Feiertag(self::MARIAEHIMMELFAHRT, new \DateTimeImmutable("$jahr-08-15"));
	}

	static public function TagDerDeutschenEinheit (int $jahr) : Feiertag {
		return new Feiertag(self::TAGDERDEUTSCHENEINHEIT, new \DateTimeImmutable("$jahr-10-03"));
	}

	static public function Reformationstag (int $jahr) : Feiertag {
		return new Feiertag(self::REFORMATIONSTAG, new \DateTimeImmutable("$jahr-10-31"));
	}

	static public function Allerheiligen (int $jahr) : Feiertag {
		return new Feiertag(self::ALLERHEILIGEN, new \DateTimeImmutable("$jahr-11-01"));
	}

	static public function BussUndBettag (int $jahr) : Feiertag {
		
		$date = new \DateTimeImmutable("$jahr-11-22");
		
		while ($date->format("N") != 3) {
				
			$date = $date->modify ( "-1 days" );
			
		}
		
		return new Feiertag(self::BUSSUNDBETTAG, $date);
		
	}

	static public function ErsterWeihnachtstag (int $jahr) : Feiertag {
		return new Feiertag(self::ERSTERWEIHNACHTSTAG, new \DateTimeImmutable("$jahr-12-25"));
	}

	static public function ZweiterWeihnachtstag (int $jahr) : Feiertag {
		return new Feiertag(self::ZWEITERWEIHNACHTSTAG, new \DateTimeImmutable("$jahr-12-26"));
	}
	
	/* ===========================================================
	 * Instance
	 * ===========================================================
	 */	

	/**
	 * 
	 * @var int
	 */
	private $key;
	
	/**
	 * 
	 * @var \DateTimeInterface
	 */
	private $date;
	
	private function __construct (int $key, \DateTimeInterface $date) {

		$this->key = $key;
		$this->date = $date;
				
	}
	
	public function getDate () : \DateTimeInterface {
		
		return clone $this->date;
		
	}
	
	public function getKey () : int {
		
		return $this->key;
		
	}
	
	public function getOffset () : int {
		
		return $this->date->getOffset();
		
	}
	
	public function getTimestamp () : int {
		
		return $this->date->getTimestamp();
		
	}
	
	public function getTimezone () : \DateTimeZone {
		
		return $this->date->getTimezone();
	}
	
	public function format (string $format) : string {
		
		return $this->date->format($format);
		
	}
	
	public function toDateTime () : \DateTime {
		
		return new \DateTime($this->format(\DateTime::ATOM), $this->getTimezone());
		
	}
	
	public function toDateTimeImmutable () : \DateTimeImmutable {
		
		return new \DateTimeImmutable($this->format(\DateTime::ATOM), $this->getTimezone());
		
	}
	
}

?>