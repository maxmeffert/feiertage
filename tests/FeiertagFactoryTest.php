<?php
namespace maxmeffert\feiertage\tests;

use PHPUnit\Framework\TestCase;
use maxmeffert\feiertage\Feiertag;
use maxmeffert\feiertage\FeiertagEnum;
use maxmeffert\feiertage\FeiertagFactory;
use maxmeffert\feiertage\GaussianEasterSundayCalculator;

class FeiertagFactoryTest extends TestCase
{
    private $feiertagFactory;
    
    protected function setUp(): void
    {
        $this->feiertagFactory = new FeiertagFactory(new GaussianEasterSundayCalculator());
    }
    
    public function testNeujahrstag()
    {
        $feiertag = $this->feiertagFactory->Neujahrstag(2016);

        $this->assertEquals(FeiertagEnum::NEUJAHRSTAG, $feiertag->getKey());
        $this->assertEquals(date_create("2016-01-01"), $feiertag->getDate());
    }

    public function testHeiligeDreiKoenige()
    {
        $feiertag = $this->feiertagFactory->HeiligeDreiKoenige(2016);

        $this->assertEquals(FeiertagEnum::HEILIGEDREIKOENIGE, $feiertag->getKey());
        $this->assertEquals(date_create("2016-01-06"), $feiertag->getDate());
    }
    
    public function testGruenDonnerstag()
    {
        $feiertag = $this->feiertagFactory->GruenDonnerstag(2016);

        $this->assertEquals(FeiertagEnum::GRUENDONNERSTAG, $feiertag->getKey());
        $this->assertEquals(date_create("2016-03-24"), $feiertag->getDate());
    }
    
    public function testKarfreitag()
    {
        $feiertag = $this->feiertagFactory->Karfreitag(2016);

        $this->assertEquals(FeiertagEnum::KARFREITAG, $feiertag->getKey());
        $this->assertEquals(date_create("2016-03-25"), $feiertag->getDate());
    }
    
    public function testOsterSonntag()
    {
        $feiertag = $this->feiertagFactory->OsterSonntag(2016);

        $this->assertEquals(FeiertagEnum::OSTERSONNTAG, $feiertag->getKey());
        $this->assertEquals(date_create("2016-03-27"), $feiertag->getDate());
    }
    
    public function testOsterMontag()
    {
        $feiertag = $this->feiertagFactory->OsterMontag(2016);

        $this->assertEquals(FeiertagEnum::OSTERMONTAG, $feiertag->getKey());
        $this->assertEquals(date_create("2016-03-28"), $feiertag->getDate());
    }
    
    public function testTagDerArbeit()
    {
        $feiertag = $this->feiertagFactory->TagDerArbeit(2016);

        $this->assertEquals(FeiertagEnum::TAGDERARBEIT, $feiertag->getKey());
        $this->assertEquals(date_create("2016-05-01"), $feiertag->getDate());
    }
    
    public function testChristiHimmelfahrt()
    {
        $feiertag = $this->feiertagFactory->ChristiHimmelfahrt(2016);

        $this->assertEquals(FeiertagEnum::CHRISTIHIMMELFAHRT, $feiertag->getKey());
        $this->assertEquals(date_create("2016-05-05"), $feiertag->getDate());
    }
    
    public function testPfingstSonntag()
    {
        $feiertag = $this->feiertagFactory->PfingstSonntag(2016);

        $this->assertEquals(FeiertagEnum::PFINGSTSONNTAG, $feiertag->getKey());
        $this->assertEquals(date_create("2016-05-15"), $feiertag->getDate());
    }
    
    public function testPfingstMontag()
    {
        $feiertag = $this->feiertagFactory->PfingstMontag(2016);

        $this->assertEquals(FeiertagEnum::PFINGSTMONTAG, $feiertag->getKey());
        $this->assertEquals(date_create("2016-05-16"), $feiertag->getDate());
    }
    
    public function testFronleichnam()
    {
        $feiertag = $this->feiertagFactory->Fronleichnam(2016);

        $this->assertEquals(FeiertagEnum::FRONLEICHNAM, $feiertag->getKey());
        $this->assertEquals(date_create("2016-05-26"), $feiertag->getDate());
    }
    
    public function testAugsburgerFriedensfest()
    {
        $feiertag = $this->feiertagFactory->AugsburgerFriedensfest(2016);

        $this->assertEquals(FeiertagEnum::AUGSBURGERFRIEDENSFEST, $feiertag->getKey());
        $this->assertEquals(date_create("2016-08-08"), $feiertag->getDate());
    }
    
    public function testMariaeHimmelfahrt()
    {
        $feiertag = $this->feiertagFactory->MariaeHimmelfahrt(2016);

        $this->assertEquals(FeiertagEnum::MARIAEHIMMELFAHRT, $feiertag->getKey());
        $this->assertEquals(date_create("2016-08-15"), $feiertag->getDate());
    }
    
    public function testTagDerDeutschenEinheit()
    {  
        $feiertag = $this->feiertagFactory->TagDerDeutschenEinheit(2016);

        $this->assertEquals(FeiertagEnum::TAGDERDEUTSCHENEINHEIT, $feiertag->getKey());
        $this->assertEquals(date_create("2016-10-03"), $feiertag->getDate());
    }
    
    public function testReformationstag()
    {
        $feiertag = $this->feiertagFactory->Reformationstag(2016);

        $this->assertEquals(FeiertagEnum::REFORMATIONSTAG, $feiertag->getKey());
        $this->assertEquals(date_create("2016-10-31"), $feiertag->getDate());
    }
    
    public function testAllerheiligen()
    {
        $feiertag = $this->feiertagFactory->Allerheiligen(2016);

        $this->assertEquals(FeiertagEnum::ALLERHEILIGEN, $feiertag->getKey());
        $this->assertEquals(date_create("2016-11-01"), $feiertag->getDate());
    }
    
    public function testBussUndBettag()
    {
        $feiertag = $this->feiertagFactory->BussUndBettag(2016);

        $this->assertEquals(FeiertagEnum::BUSSUNDBETTAG, $feiertag->getKey());
        $this->assertEquals(date_create("2016-11-16"), $feiertag->getDate());
    }
    
    public function testErsterWeihnachtstag()
    {
        $feiertag = $this->feiertagFactory->ErsterWeihnachtstag(2016);

        $this->assertEquals(FeiertagEnum::ERSTERWEIHNACHTSTAG, $feiertag->getKey());
        $this->assertEquals(date_create("2016-12-25"), $feiertag->getDate());
    }
    
    public function testZweiterWeihnachtstag()
    {
        $feiertag = $this->feiertagFactory->ZweiterWeihnachtstag(2016);

        $this->assertEquals(FeiertagEnum::ZWEITERWEIHNACHTSTAG, $feiertag->getKey());
        $this->assertEquals(date_create("2016-12-26"), $feiertag->getDate());
    }
}
