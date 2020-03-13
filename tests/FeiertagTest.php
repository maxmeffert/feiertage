<?php
namespace maxmeffert\feiertage\tests;

include_once __DIR__ . "/../vendor/autoload.php";

use PHPUnit\Framework\TestCase;
use maxmeffert\feiertage\Feiertag;
use maxmeffert\feiertage\FeiertagEnum;

class FeiertagTest extends TestCase
{

    public function testKeys()
    {
        $keys = FeiertagEnum::keys();
        
        $this->assertIsArray($keys);
        
        $this->assertEquals(19, count($keys));
        
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

    public function testGetKey()
    {
        $jahr = 2016;
        
        $this->assertEquals(FeiertagEnum::NEUJAHRSTAG, Feiertag::Neujahrstag($jahr)->getKey());
        $this->assertEquals(FeiertagEnum::HEILIGEDREIKOENIGE, Feiertag::HeiligeDreiKoenige($jahr)->getKey());
        $this->assertEquals(FeiertagEnum::GRUENDONNERSTAG, Feiertag::GruenDonnerstag($jahr)->getKey());
        $this->assertEquals(FeiertagEnum::KARFREITAG, Feiertag::Karfreitag($jahr)->getKey());
        $this->assertEquals(FeiertagEnum::OSTERSONNTAG, Feiertag::OsterSonntag($jahr)->getKey());
        $this->assertEquals(FeiertagEnum::OSTERMONTAG, Feiertag::OsterMontag($jahr)->getKey());
        $this->assertEquals(FeiertagEnum::TAGDERARBEIT, Feiertag::TagDerArbeit($jahr)->getKey());
        $this->assertEquals(FeiertagEnum::CHRISTIHIMMELFAHRT, Feiertag::ChristiHimmelfahrt($jahr)->getKey());
        $this->assertEquals(FeiertagEnum::PFINGSTSONNTAG, Feiertag::PfingstSonntag($jahr)->getKey());
        $this->assertEquals(FeiertagEnum::PFINGSTMONTAG, Feiertag::PfingstMontag($jahr)->getKey());
        $this->assertEquals(FeiertagEnum::FRONLEICHNAM, Feiertag::Fronleichnam($jahr)->getKey());
        $this->assertEquals(FeiertagEnum::AUGSBURGERFRIEDENSFEST, Feiertag::AugsburgerFriedensfest($jahr)->getKey());
        $this->assertEquals(FeiertagEnum::MARIAEHIMMELFAHRT, Feiertag::MariaeHimmelfahrt($jahr)->getKey());
        $this->assertEquals(FeiertagEnum::TAGDERDEUTSCHENEINHEIT, Feiertag::TagDerDeutschenEinheit($jahr)->getKey());
        $this->assertEquals(FeiertagEnum::REFORMATIONSTAG, Feiertag::Reformationstag($jahr)->getKey());
        $this->assertEquals(FeiertagEnum::ALLERHEILIGEN, Feiertag::Allerheiligen($jahr)->getKey());
        $this->assertEquals(FeiertagEnum::BUSSUNDBETTAG, Feiertag::BussUndBettag($jahr)->getKey());
        $this->assertEquals(FeiertagEnum::ERSTERWEIHNACHTSTAG, Feiertag::ErsterWeihnachtstag($jahr)->getKey());
        $this->assertEquals(FeiertagEnum::ZWEITERWEIHNACHTSTAG, Feiertag::ZweiterWeihnachtstag($jahr)->getKey());
    }

    public function test2016()
    {
        $jahr = 2016;
        
        $this->assertEquals(Feiertag::Neujahrstag($jahr)->getDate(), date_create("2016-01-01"));
        $this->assertEquals(Feiertag::HeiligeDreiKoenige($jahr)->getDate(), date_create("2016-01-06"));
        $this->assertEquals(Feiertag::GruenDonnerstag($jahr)->getDate(), date_create("2016-03-24"));
        $this->assertEquals(Feiertag::Karfreitag($jahr)->getDate(), date_create("2016-03-25"));
        $this->assertEquals(Feiertag::OsterSonntag($jahr)->getDate(), date_create("2016-03-27"));
        $this->assertEquals(Feiertag::OsterMontag($jahr)->getDate(), date_create("2016-03-28"));
        $this->assertEquals(Feiertag::TagDerArbeit($jahr)->getDate(), date_create("2016-05-01"));
        $this->assertEquals(Feiertag::ChristiHimmelfahrt($jahr)->getDate(), date_create("2016-05-05"));
        $this->assertEquals(Feiertag::PfingstSonntag($jahr)->getDate(), date_create("2016-05-15"));
        $this->assertEquals(Feiertag::PfingstMontag($jahr)->getDate(), date_create("2016-05-16"));
        $this->assertEquals(Feiertag::Fronleichnam($jahr)->getDate(), date_create("2016-05-26"));
        $this->assertEquals(Feiertag::AugsburgerFriedensfest($jahr)->getDate(), date_create("2016-08-08"));
        $this->assertEquals(Feiertag::MariaeHimmelfahrt($jahr)->getDate(), date_create("2016-08-15"));
        $this->assertEquals(Feiertag::TagDerDeutschenEinheit($jahr)->getDate(), date_create("2016-10-03"));
        $this->assertEquals(Feiertag::Reformationstag($jahr)->getDate(), date_create("2016-10-31"));
        $this->assertEquals(Feiertag::Allerheiligen($jahr)->getDate(), date_create("2016-11-01"));
        $this->assertEquals(Feiertag::BussUndBettag($jahr)->getDate(), date_create("2016-11-16"));
        $this->assertEquals(Feiertag::ErsterWeihnachtstag($jahr)->getDate(), date_create("2016-12-25"));
        $this->assertEquals(Feiertag::ZweiterWeihnachtstag($jahr)->getDate(), date_create("2016-12-26"));
    }

    public function testDateTimeInterface()
    {
        $feiertag = Feiertag::Neujahrstag(2016);
        $date = $feiertag->getDate();
        
        $this->assertEquals($feiertag->format(\DateTime::ISO8601), $date->format(\DateTime::ISO8601));
        $this->assertEquals($feiertag->getOffset(), $date->getOffset());
        $this->assertEquals($feiertag->getTimestamp(), $date->getTimestamp());
        $this->assertEquals($feiertag->getTimezone(), $date->getTimezone());
    }

    public function testToDateTime()
    {
        $feiertag = Feiertag::Neujahrstag(2016);
        $date = $feiertag->toDateTime();
        
        $this->assertInstanceOf(\DateTime::class, $date);
        $this->assertEquals($feiertag->getDate(), $date);
    }

    public function testToDateTimeImmutable()
    {
        $feiertag = Feiertag::Neujahrstag(2016);
        $date = $feiertag->toDateTimeImmutable();
        
        $this->assertInstanceOf(\DateTimeImmutable::class, $date);
        $this->assertEquals($feiertag->getDate(), $date);
    }
}
