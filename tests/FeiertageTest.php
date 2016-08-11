<?php

include_once __DIR__."/../vendor/autoload.php";

use PHPUnit\Framework\TestCase;
use intrawarez\feiertage\Feiertage;

class FeiertageTest extends TestCase {
	
	/**
	 * Tests holidays for 2016
	 */
	public function test2016 () {
		
		$ft = Feiertage::of(2016);
		
		$this->assertEquals($ft[Feiertage::FEIERTAG_NEUJAHRSTAG], 				date_create("2016-01-01"));
		$this->assertEquals($ft[Feiertage::FEIERTAG_HEILIGEDREIKOENIGE], 		date_create("2016-01-06"));
		$this->assertEquals($ft[Feiertage::FEIERTAG_GRUENDONNERSTAG],			date_create("2016-03-24"));
		$this->assertEquals($ft[Feiertage::FEIERTAG_KARFREITAG], 				date_create("2016-03-25"));

		$this->assertEquals($ft[Feiertage::FEIERTAG_OSTERSONNTAG], 				date_create("2016-03-27"));
		$this->assertEquals($ft[Feiertage::FEIERTAG_OSTERMONTAG], 				date_create("2016-03-28"));
		$this->assertEquals($ft[Feiertage::FEIERTAG_TAGDERARBEIT], 				date_create("2016-05-01"));

		$this->assertEquals($ft[Feiertage::FEIERTAG_CHRISTIHIMMELFAHRT], 		date_create("2016-05-05"));
		$this->assertEquals($ft[Feiertage::FEIERTAG_PFINGSTSONNTAG], 			date_create("2016-05-15"));
		$this->assertEquals($ft[Feiertage::FEIERTAG_PFINGATMONTAG], 			date_create("2016-05-16"));

		$this->assertEquals($ft[Feiertage::FEIERTAG_FRONLEICHNAM], 				date_create("2016-05-26"));
		$this->assertEquals($ft[Feiertage::FEIERTAG_AUGSBURGERFRIEDENSFEST], 	date_create("2016-08-08"));
		$this->assertEquals($ft[Feiertage::FEIERTAG_MARIAEHIMMELFAHRT], 		date_create("2016-08-15"));

		$this->assertEquals($ft[Feiertage::FEIERTAG_TAGDERDEUTSCHENEINHEIT], 	date_create("2016-10-03"));
		$this->assertEquals($ft[Feiertage::FEIERTAG_REFORMATIONSTAG], 			date_create("2016-10-31"));
		$this->assertEquals($ft[Feiertage::FEIERTAG_ALLERHEILIGEN], 			date_create("2016-11-01"));

		$this->assertEquals($ft[Feiertage::FEIERTAG_BUSSUNDBETTAG], 			date_create("2016-11-16"));
		$this->assertEquals($ft[Feiertage::FEIERTAG_ERSTERWEIHNACHTSTAG], 		date_create("2016-12-25"));
		$this->assertEquals($ft[Feiertage::FEIERTAG_ZWEITERWEIHNACHTSTAG],		date_create("2016-12-26"));
				
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
		
		$this->assertEquals($ft[Feiertage::FEIERTAG_NEUJAHRSTAG], date_create("2016-01-01"));
		
		$ft[Feiertage::FEIERTAG_NEUJAHRSTAG] = date_create("2016-01-01");
		
		$this->assertEquals($ft[Feiertage::FEIERTAG_NEUJAHRSTAG], date_create("2016-01-01"));
		
	}
	
}

?>