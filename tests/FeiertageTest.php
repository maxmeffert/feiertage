<?php

include_once __DIR__."/../vendor/autoload.php";

use PHPUnit\Framework\TestCase;
use intrawarez\feiertage\Feiertage;

class FeiertageTest extends TestCase {
	
	static private function easterDate (int $year) : DateTime {
		
		$easter = date_create(date("Y-m-d",easter_date(2016)));
		$easter->modify("+1 days");
		
		return $easter;
		
	}
	
	public function testOsterSonntag () {

		
		$this->assertEquals(self::easterDate(2016), Feiertage::OsterSonntag(2016));
		
		
		// check upper limits of easter_date
		
		$easterDate = self::easterDate(2038);
		$osterSonntag = Feiertage::OsterSonntag(2038);
				
		$this->assertNotEquals($easterDate, $osterSonntag);
		$this->assertEquals(date_create("2038-04-25"), $osterSonntag);
		
		
	}
	
	/**
	 * Tests holidays for 2016.
	 * Also checks ArrayAccess implementation.
	 */
	public function test2016 () {
		
		$ft = Feiertage::of(2016);
// 		var_dump($ft[Feiertage::NEUJAHRSTAG]);
		$this->assertEquals($ft[Feiertage::NEUJAHRSTAG], 			date_create("2016-01-01"));
		$this->assertEquals($ft[Feiertage::HEILIGEDREIKOENIGE], 	date_create("2016-01-06"));
		$this->assertEquals($ft[Feiertage::GRUENDONNERSTAG],		date_create("2016-03-24"));
		$this->assertEquals($ft[Feiertage::KARFREITAG], 			date_create("2016-03-25"));
		$this->assertEquals($ft[Feiertage::OSTERSONNTAG], 			date_create("2016-03-27"));
		$this->assertEquals($ft[Feiertage::OSTERMONTAG], 			date_create("2016-03-28"));
		$this->assertEquals($ft[Feiertage::TAGDERARBEIT], 			date_create("2016-05-01"));
		$this->assertEquals($ft[Feiertage::CHRISTIHIMMELFAHRT], 	date_create("2016-05-05"));
		$this->assertEquals($ft[Feiertage::PFINGSTSONNTAG], 		date_create("2016-05-15"));
		$this->assertEquals($ft[Feiertage::PFINGSTMONTAG], 			date_create("2016-05-16"));
		$this->assertEquals($ft[Feiertage::FRONLEICHNAM], 			date_create("2016-05-26"));
		$this->assertEquals($ft[Feiertage::AUGSBURGERFRIEDENSFEST], date_create("2016-08-08"));
		$this->assertEquals($ft[Feiertage::MARIAEHIMMELFAHRT], 		date_create("2016-08-15"));
		$this->assertEquals($ft[Feiertage::TAGDERDEUTSCHENEINHEIT], date_create("2016-10-03"));
		$this->assertEquals($ft[Feiertage::REFORMATIONSTAG], 		date_create("2016-10-31"));
		$this->assertEquals($ft[Feiertage::ALLERHEILIGEN], 			date_create("2016-11-01"));
		$this->assertEquals($ft[Feiertage::BUSSUNDBETTAG], 			date_create("2016-11-16"));
		$this->assertEquals($ft[Feiertage::ERSTERWEIHNACHTSTAG], 	date_create("2016-12-25"));
		$this->assertEquals($ft[Feiertage::ZWEITERWEIHNACHTSTAG],	date_create("2016-12-26"));
				
	}

	/**
	 * Tests if IteratorAggregate works properly
	 */
	public function testIteratorAggregate () {
		
		foreach (Feiertage::of(2016) as $key => $value) {
			
			$this->assertTrue(is_int($key));
			$this->assertTrue($value instanceof \DateTime);
			
		}
		
		
	}
	
	/**
	 * Tests the immutability of a Feiertage instance
	 */
	public function testImmutability () {
		
		$ft = Feiertage::of(2016);
		
		$this->assertEquals($ft[Feiertage::NEUJAHRSTAG], date_create("2016-01-01"));
		
		$ft[Feiertage::NEUJAHRSTAG] = date_create("2016-01-01");
		
		$this->assertEquals($ft[Feiertage::NEUJAHRSTAG], date_create("2016-01-01"));
		
	}
	
}

?>