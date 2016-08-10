<?php

include_once __DIR__."/../vendor/autoload.php";

use PHPUnit\Framework\TestCase;
use intrawarez\feiertage\Feiertage;

class FeiertageText extends TestCase {
	
	public function test2016 () {
		
		$ft = new Feiertage(2016);
		
		$this->assertEquals($ft->getNeujahrstag(), 				date_create("2016-01-01"));
		$this->assertEquals($ft->getHeiligeDreiKoenige(), 		date_create("2016-01-06"));
		$this->assertEquals($ft->getKarFreitag(), 				date_create("2016-03-25"));
		$this->assertEquals($ft->getOsterSonntag(), 			date_create("2016-03-27"));
		$this->assertEquals($ft->getOsterMontag(), 				date_create("2016-03-28"));
		$this->assertEquals($ft->getTagDerArbeit(), 			date_create("2016-05-01"));
		$this->assertEquals($ft->getChristiHimmelfahrt(), 		date_create("2016-05-05"));
		$this->assertEquals($ft->getPfingstSonntag(), 			date_create("2016-05-15"));
		$this->assertEquals($ft->getPfingstMontag(), 			date_create("2016-05-16"));
		$this->assertEquals($ft->getFronLeichnam(), 			date_create("2016-05-26"));
		$this->assertEquals($ft->getMariaeHimmelfahrt(), 		date_create("2016-08-15"));
		$this->assertEquals($ft->getTagDerDeutschenEinheit(), 	date_create("2016-10-03"));
		$this->assertEquals($ft->getReformationstag(), 			date_create("2016-10-31"));
		$this->assertEquals($ft->getAllerheiligen(), 			date_create("2016-11-01"));
		$this->assertEquals($ft->getBussUndBettag(), 			date_create("2016-11-16"));
		$this->assertEquals($ft->getErsterWeihnachtstag(), 		date_create("2016-12-25"));
		$this->assertEquals($ft->getZweiterWeihnachtstag(), 	date_create("2016-12-26"));
		
	}
	
}

?>