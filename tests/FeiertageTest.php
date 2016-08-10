<?php

include_once __DIR__."/../vendor/autoload.php";

use PHPUnit\Framework\TestCase;
use intrawarez\feiertage\Feiertage;

class FeiertageText extends TestCase {
	
	public function test () {
		
		$year = 2016;
		
		$ft = new Feiertage($year);
		
		$this->assertEquals($ft->getNeujahrstag(), date_create("$year-01-01"));
		
	}
	
}

?>