<?php
namespace maxmeffert\feiertage\tests;

include_once __DIR__ . "/../vendor/autoload.php";

use PHPUnit\Framework\TestCase;
use maxmeffert\feiertage\Feiertag;
use maxmeffert\feiertage\FeiertagEnum;
use maxmeffert\feiertage\FeiertagFactory;
use maxmeffert\feiertage\GaussianEasterSundayCalculator;

class FeiertagTest extends TestCase
{
    private $feiertagFactory;

    protected function setUp(): void 
    {
        $this->feiertagFactory = new FeiertagFactory(new GaussianEasterSundayCalculator());
    }

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

        $this->assertEquals(FeiertagEnum::NEUJAHRSTAG,  $this->feiertagFactory->Neujahrstag($jahr)->getKey());
        $this->assertEquals(FeiertagEnum::HEILIGEDREIKOENIGE,  $this->feiertagFactory->HeiligeDreiKoenige($jahr)->getKey());
        $this->assertEquals(FeiertagEnum::GRUENDONNERSTAG,  $this->feiertagFactory->GruenDonnerstag($jahr)->getKey());
        $this->assertEquals(FeiertagEnum::KARFREITAG,  $this->feiertagFactory->Karfreitag($jahr)->getKey());
        $this->assertEquals(FeiertagEnum::OSTERSONNTAG,  $this->feiertagFactory->OsterSonntag($jahr)->getKey());
        $this->assertEquals(FeiertagEnum::OSTERMONTAG,  $this->feiertagFactory->OsterMontag($jahr)->getKey());
        $this->assertEquals(FeiertagEnum::TAGDERARBEIT,  $this->feiertagFactory->TagDerArbeit($jahr)->getKey());
        $this->assertEquals(FeiertagEnum::CHRISTIHIMMELFAHRT,  $this->feiertagFactory->ChristiHimmelfahrt($jahr)->getKey());
        $this->assertEquals(FeiertagEnum::PFINGSTSONNTAG,  $this->feiertagFactory->PfingstSonntag($jahr)->getKey());
        $this->assertEquals(FeiertagEnum::PFINGSTMONTAG,  $this->feiertagFactory->PfingstMontag($jahr)->getKey());
        $this->assertEquals(FeiertagEnum::FRONLEICHNAM,  $this->feiertagFactory->Fronleichnam($jahr)->getKey());
        $this->assertEquals(FeiertagEnum::AUGSBURGERFRIEDENSFEST,  $this->feiertagFactory->AugsburgerFriedensfest($jahr)->getKey());
        $this->assertEquals(FeiertagEnum::MARIAEHIMMELFAHRT,  $this->feiertagFactory->MariaeHimmelfahrt($jahr)->getKey());
        $this->assertEquals(FeiertagEnum::TAGDERDEUTSCHENEINHEIT,  $this->feiertagFactory->TagDerDeutschenEinheit($jahr)->getKey());
        $this->assertEquals(FeiertagEnum::REFORMATIONSTAG,  $this->feiertagFactory->Reformationstag($jahr)->getKey());
        $this->assertEquals(FeiertagEnum::ALLERHEILIGEN,  $this->feiertagFactory->Allerheiligen($jahr)->getKey());
        $this->assertEquals(FeiertagEnum::BUSSUNDBETTAG,  $this->feiertagFactory->BussUndBettag($jahr)->getKey());
        $this->assertEquals(FeiertagEnum::ERSTERWEIHNACHTSTAG,  $this->feiertagFactory->ErsterWeihnachtstag($jahr)->getKey());
        $this->assertEquals(FeiertagEnum::ZWEITERWEIHNACHTSTAG,  $this->feiertagFactory->ZweiterWeihnachtstag($jahr)->getKey());
    }

    public function test2016()
    {
        $jahr = 2016;

        $this->assertEquals( $this->feiertagFactory->Neujahrstag($jahr)->getDate(), date_create("2016-01-01"));
        $this->assertEquals( $this->feiertagFactory->HeiligeDreiKoenige($jahr)->getDate(), date_create("2016-01-06"));
        $this->assertEquals( $this->feiertagFactory->GruenDonnerstag($jahr)->getDate(), date_create("2016-03-24"));
        $this->assertEquals( $this->feiertagFactory->Karfreitag($jahr)->getDate(), date_create("2016-03-25"));
        $this->assertEquals( $this->feiertagFactory->OsterSonntag($jahr)->getDate(), date_create("2016-03-27"));
        $this->assertEquals( $this->feiertagFactory->OsterMontag($jahr)->getDate(), date_create("2016-03-28"));
        $this->assertEquals( $this->feiertagFactory->TagDerArbeit($jahr)->getDate(), date_create("2016-05-01"));
        $this->assertEquals( $this->feiertagFactory->ChristiHimmelfahrt($jahr)->getDate(), date_create("2016-05-05"));
        $this->assertEquals( $this->feiertagFactory->PfingstSonntag($jahr)->getDate(), date_create("2016-05-15"));
        $this->assertEquals( $this->feiertagFactory->PfingstMontag($jahr)->getDate(), date_create("2016-05-16"));
        $this->assertEquals( $this->feiertagFactory->Fronleichnam($jahr)->getDate(), date_create("2016-05-26"));
        $this->assertEquals( $this->feiertagFactory->AugsburgerFriedensfest($jahr)->getDate(), date_create("2016-08-08"));
        $this->assertEquals( $this->feiertagFactory->MariaeHimmelfahrt($jahr)->getDate(), date_create("2016-08-15"));
        $this->assertEquals( $this->feiertagFactory->TagDerDeutschenEinheit($jahr)->getDate(), date_create("2016-10-03"));
        $this->assertEquals( $this->feiertagFactory->Reformationstag($jahr)->getDate(), date_create("2016-10-31"));
        $this->assertEquals( $this->feiertagFactory->Allerheiligen($jahr)->getDate(), date_create("2016-11-01"));
        $this->assertEquals( $this->feiertagFactory->BussUndBettag($jahr)->getDate(), date_create("2016-11-16"));
        $this->assertEquals( $this->feiertagFactory->ErsterWeihnachtstag($jahr)->getDate(), date_create("2016-12-25"));
        $this->assertEquals( $this->feiertagFactory->ZweiterWeihnachtstag($jahr)->getDate(), date_create("2016-12-26"));
    }

    public function testDateTimeInterface()
    {
        $feiertag =  $this->feiertagFactory->Neujahrstag(2016);
        $date = $feiertag->getDate();
        
        $this->assertEquals($feiertag->format(\DateTime::ISO8601), $date->format(\DateTime::ISO8601));
        $this->assertEquals($feiertag->getOffset(), $date->getOffset());
        $this->assertEquals($feiertag->getTimestamp(), $date->getTimestamp());
        $this->assertEquals($feiertag->getTimezone(), $date->getTimezone());
    }

    public function testToDateTime()
    {
        $feiertag =  $this->feiertagFactory->Neujahrstag(2016);
        $date = $feiertag->toDateTime();
        
        $this->assertInstanceOf(\DateTime::class, $date);
        $this->assertEquals($feiertag->getDate(), $date);
    }

    public function testToDateTimeImmutable()
    {
        $feiertag =  $this->feiertagFactory->Neujahrstag(2016);
        $date = $feiertag->toDateTimeImmutable();
        
        $this->assertInstanceOf(\DateTimeImmutable::class, $date);
        $this->assertEquals($feiertag->getDate(), $date);
    }
}
