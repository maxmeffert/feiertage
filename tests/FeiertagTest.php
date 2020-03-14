<?php
namespace maxmeffert\feiertage\tests;

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
