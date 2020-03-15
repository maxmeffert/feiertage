<?php
namespace maxmeffert\feiertage\tests;

use PHPUnit\Framework\TestCase;
use maxmeffert\feiertage\Feiertag;
use maxmeffert\feiertage\FeiertagEnum;

class FeiertagTest extends TestCase
{
    private $key;
    private $date;
    private $feiertag;

    protected function setUp(): void
    {
        $this->key = FeiertagEnum::ALLERHEILIGEN;
        $this->date = date_create("2020-02-02");
        $this->feiertag = new Feiertag($this->key, $this->date);
    }

    public function testFormat()
    {
        $this->assertEquals($this->feiertag->format(\DateTime::ISO8601), $this->date->format(\DateTime::ISO8601));
    }

    public function testGetOffset()
    {
        $this->assertEquals($this->feiertag->getOffset(), $this->date->getOffset());
    }

    public function testGetTimestamp()
    {
        $this->assertEquals($this->feiertag->getTimestamp(), $this->date->getTimestamp());
    }

    public function testGetTimesone()
    {
        $this->assertEquals($this->feiertag->getTimezone(), $this->date->getTimezone());
    }

    public function testToDateTime()
    {
        $date = $this->feiertag->toDateTime();
        
        $this->assertInstanceOf(\DateTime::class, $date);
        $this->assertEquals($this->feiertag->getDate(), $date);
    }

    public function testToDateTimeImmutable()
    {
        $date = $this->feiertag->toDateTimeImmutable();
        
        $this->assertInstanceOf(\DateTimeImmutable::class, $date);
        $this->assertEquals($this->feiertag->getDate(), $date);
    }

    public function testEquals()
    {
        $this->assertTrue($this->feiertag->equals($this->feiertag));
        $this->assertTrue($this->feiertag->equals($this->date));

        $sameKey = $this->key;
        $sameDate = $this->date;
        $sameFeiertag = new Feiertag($sameKey, $sameDate);
        $this->assertTrue($this->feiertag->equals($sameFeiertag));
        $this->assertTrue($this->feiertag->equals($sameDate));

        $otherKey = FeiertagEnum::ALLERHEILIGEN;
        $otherDate = date_create("2020-05-05");
        $otherFeiertag = new Feiertag($otherKey, $otherDate);
        $this->assertFalse($this->feiertag->equals($otherFeiertag));
        $this->assertFalse($this->feiertag->equals($otherDate));
    }
}
