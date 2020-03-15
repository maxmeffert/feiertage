<?php
namespace maxmeffert\feiertage\tests;

use PHPUnit\Framework\TestCase;
use maxmeffert\feiertage\Feiertage;
use maxmeffert\feiertage\Feiertag;
use maxmeffert\feiertage\FeiertagEnum;
use maxmeffert\feiertage\FeiertagFactory;
use maxmeffert\feiertage\GaussianEasterSundayCalculator;

class FeiertageTest extends TestCase
{
    public function testOf()
    {
        $date = new \DateTime();
        $jahr = intval($date->format("Y"));
        
        $feiertage = Feiertage::of($jahr);
        
        $this->assertEquals($jahr, $feiertage->getJahr());
        
        $feiertage = Feiertage::of(666);
        
        $this->assertEquals(666, $feiertage->getJahr());
    }

    public function testCheck()
    {
        $feiertagFactory = new FeiertagFactory(new GaussianEasterSundayCalculator());

        $this->assertFalse(Feiertage::check(123456789));
        $this->assertTrue(Feiertage::check($feiertagFactory->Allerheiligen(2016)));
        $this->assertTrue(Feiertage::check($feiertagFactory->Allerheiligen(2016)->getDate()));
        $this->assertFalse(Feiertage::check(new \DateTime("2016-07-23")));
        
        $date = new \DateTime();
        $jahr = intval($date->format("Y"));

        $feiertage = Feiertage::of($jahr);
        
        $this->assertEquals($feiertage->contains($date), Feiertage::check($date));
    }

    public function testWhich()
    {
        $feiertagFactory = new FeiertagFactory(new GaussianEasterSundayCalculator());

        $now = new \DateTime();
        $jahr = intval($now->format("Y"));
                
        $which = Feiertage::which($feiertagFactory->Allerheiligen($jahr));
        $this->assertEquals(FeiertagEnum::ALLERHEILIGEN, $which);

        $which = Feiertage::which($feiertagFactory->Allerheiligen($jahr)->getDate());
        $this->assertEquals(FeiertagEnum::ALLERHEILIGEN, $which);
                
        $which = Feiertage::which(123456789);
        $this->assertEquals(FeiertagEnum::NONE, $which);

        $which = Feiertage::which(date_create("2020-01-03"));
        $this->assertEquals(FeiertagEnum::NONE, $which);
    }
    
    /**
     * Tests holidays for 2016.
     * Also checks ArrayAccess implementation.
     */
    public function test2016()
    {
        $ft = Feiertage::of(2016);
        
        $this->assertEquals($ft[FeiertagEnum::NEUJAHRSTAG]->getDate(), date_create("2016-01-01"));
        $this->assertEquals($ft[FeiertagEnum::HEILIGEDREIKOENIGE]->getDate(), date_create("2016-01-06"));
        $this->assertEquals($ft[FeiertagEnum::GRUENDONNERSTAG]->getDate(), date_create("2016-03-24"));
        $this->assertEquals($ft[FeiertagEnum::KARFREITAG]->getDate(), date_create("2016-03-25"));
        $this->assertEquals($ft[FeiertagEnum::OSTERSONNTAG]->getDate(), date_create("2016-03-27"));
        $this->assertEquals($ft[FeiertagEnum::OSTERMONTAG]->getDate(), date_create("2016-03-28"));
        $this->assertEquals($ft[FeiertagEnum::TAGDERARBEIT]->getDate(), date_create("2016-05-01"));
        $this->assertEquals($ft[FeiertagEnum::CHRISTIHIMMELFAHRT]->getDate(), date_create("2016-05-05"));
        $this->assertEquals($ft[FeiertagEnum::PFINGSTSONNTAG]->getDate(), date_create("2016-05-15"));
        $this->assertEquals($ft[FeiertagEnum::PFINGSTMONTAG]->getDate(), date_create("2016-05-16"));
        $this->assertEquals($ft[FeiertagEnum::FRONLEICHNAM]->getDate(), date_create("2016-05-26"));
        $this->assertEquals($ft[FeiertagEnum::AUGSBURGERFRIEDENSFEST]->getDate(), date_create("2016-08-08"));
        $this->assertEquals($ft[FeiertagEnum::MARIAEHIMMELFAHRT]->getDate(), date_create("2016-08-15"));
        $this->assertEquals($ft[FeiertagEnum::TAGDERDEUTSCHENEINHEIT]->getDate(), date_create("2016-10-03"));
        $this->assertEquals($ft[FeiertagEnum::REFORMATIONSTAG]->getDate(), date_create("2016-10-31"));
        $this->assertEquals($ft[FeiertagEnum::ALLERHEILIGEN]->getDate(), date_create("2016-11-01"));
        $this->assertEquals($ft[FeiertagEnum::BUSSUNDBETTAG]->getDate(), date_create("2016-11-16"));
        $this->assertEquals($ft[FeiertagEnum::ERSTERWEIHNACHTSTAG]->getDate(), date_create("2016-12-25"));
        $this->assertEquals($ft[FeiertagEnum::ZWEITERWEIHNACHTSTAG]->getDate(), date_create("2016-12-26"));
    }

    /**
     * Tests if IteratorAggregate works properly
     */
    public function testIteratorAggregate()
    {
        foreach (Feiertage::of(2016) as $key => $value) {
            $this->assertTrue(is_int($key));
            $this->assertTrue($value instanceof Feiertag);
        }
    }

    /**
     * Tests the immutability of a Feiertage instance
     */
    public function testArrayAccess()
    {
        $ft = Feiertage::of(2016);
        
        $this->assertTrue(isset($ft[FeiertagEnum::NEUJAHRSTAG]));
        
        $this->assertEquals($ft[FeiertagEnum::NEUJAHRSTAG]->getDate(), date_create("2016-01-01"));
        
        $ft[FeiertagEnum::NEUJAHRSTAG] = date_create("2016-01-01");
        
        $this->assertEquals($ft[FeiertagEnum::NEUJAHRSTAG]->getDate(), date_create("2016-01-01"));
        
        unset($ft[FeiertagEnum::NEUJAHRSTAG]);
        
        $this->assertEquals($ft[FeiertagEnum::NEUJAHRSTAG]->getDate(), date_create("2016-01-01"));
    }

    public function testGetDates()
    {
        $now = new \DateTime();
        $jahr = intval($now->format("Y"));
        
        $feiertage = Feiertage::of($jahr);
        
        $dates = $feiertage->getDates();
        
        foreach ($feiertage as $feiertag) {
            
            /**
             *
             * @var Feiertag $feiertag
             */
            
            $this->assertEquals($feiertag->getDate(), $dates[$feiertag->getKey()]);
        }
    }

    public function testToDateTimes()
    {
        $now = new \DateTime();
        $jahr = intval($now->format("Y"));
        
        $feiertage = Feiertage::of($jahr);
        
        $dates = $feiertage->toDateTimes();
        
        foreach ($feiertage as $feiertag) {
            
            /**
             *
             * @var Feiertag $feiertag
             */
            
            $this->assertEquals($feiertag->toDateTime(), $dates[$feiertag->getKey()]);
        }
    }

    public function testToDateTimeImmutabless()
    {
        $now = new \DateTime();
        $jahr = intval($now->format("Y"));
        
        $feiertage = Feiertage::of($jahr);
        
        $dates = $feiertage->toDateTimeImmutables();
        
        foreach ($feiertage as $feiertag) {
            
            /**
             *
             * @var Feiertag $feiertag
             */
            
            $this->assertEquals($feiertag->toDateTimeImmutable(), $dates[$feiertag->getKey()]);
        }
    }
}
