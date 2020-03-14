<?php
namespace maxmeffert\feiertage\tests;

use PHPUnit\Framework\TestCase;
use maxmeffert\feiertage\Feiertag;
use maxmeffert\feiertage\FeiertagEnum;
use maxmeffert\feiertage\FeiertagFactory;
use maxmeffert\feiertage\GaussianEasterSundayCalculator;

class FeiertagEnumTest extends TestCase
{
    public function testKeys()
    {
        $keys = FeiertagEnum::keys();
        
        $this->assertIsArray($keys);
        
        $this->assertEquals(20, count($keys));
        
        $this->assertContains(FeiertagEnum::NONE, $keys);
        $this->assertContains(FeiertagEnum::NEUJAHRSTAG, $keys);
        $this->assertContains(FeiertagEnum::HEILIGEDREIKOENIGE, $keys);
        $this->assertContains(FeiertagEnum::GRUENDONNERSTAG, $keys);
        $this->assertContains(FeiertagEnum::KARFREITAG, $keys);
        $this->assertContains(FeiertagEnum::OSTERSONNTAG, $keys);
        $this->assertContains(FeiertagEnum::OSTERMONTAG, $keys);
        $this->assertContains(FeiertagEnum::TAGDERARBEIT, $keys);
        $this->assertContains(FeiertagEnum::CHRISTIHIMMELFAHRT, $keys);
        $this->assertContains(FeiertagEnum::PFINGSTSONNTAG, $keys);
        $this->assertContains(FeiertagEnum::PFINGSTMONTAG, $keys);
        $this->assertContains(FeiertagEnum::FRONLEICHNAM, $keys);
        $this->assertContains(FeiertagEnum::AUGSBURGERFRIEDENSFEST, $keys);
        $this->assertContains(FeiertagEnum::MARIAEHIMMELFAHRT, $keys);
        $this->assertContains(FeiertagEnum::TAGDERDEUTSCHENEINHEIT, $keys);
        $this->assertContains(FeiertagEnum::REFORMATIONSTAG, $keys);
        $this->assertContains(FeiertagEnum::ALLERHEILIGEN, $keys);
        $this->assertContains(FeiertagEnum::BUSSUNDBETTAG, $keys);
        $this->assertContains(FeiertagEnum::ERSTERWEIHNACHTSTAG, $keys);
        $this->assertContains(FeiertagEnum::ZWEITERWEIHNACHTSTAG, $keys);
    }
}
