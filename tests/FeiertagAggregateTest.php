<?php
namespace maxmeffert\feiertage\tests;

use PHPUnit\Framework\TestCase;
use maxmeffert\feiertage\Feiertage;
use maxmeffert\feiertage\Feiertag;
use maxmeffert\feiertage\FeiertagEnum;
use maxmeffert\feiertage\FeiertagAggregate;

class FeiertagAggregateTest extends TestCase
{
    private $year;
    private $feiertage;
    private $cut;

    protected function setUp() : void
    {
        $this->year = 2020;

        $this->feiertage = [
            new Feiertag(FeiertagEnum::ALLERHEILIGEN, date_create("2020-02-03")),
            new Feiertag(FeiertagEnum::KARFREITAG, date_create("2020-02-03"))
        ];

        $this->cut = new FeiertagAggregate($this->year, $this->feiertage);
    }

    public function testGetJahr()
    {
        $jahr = $this->cut->getJahr();

        $this->assertEquals($this->year, $jahr);
    }

    public function testToArray()
    {
        $array = $this->cut->toArray();

        $this->assertEquals($this->feiertage, $array);
    }

    public function testGetDates()
    {
        $dates = $this->cut->getDates();

        $expected = [
            $this->feiertage[0]->getDate(),
            $this->feiertage[1]->getDate()
        ];

        $this->assertEquals($expected, $dates);
    }

    public function testToDateTimes()
    {
        $dateTimes = $this->cut->toDateTimes();

        $expected = [
            $this->feiertage[0]->toDateTime(),
            $this->feiertage[1]->toDateTime()
        ];

        $this->assertEquals($expected, $dateTimes);
    }

    public function testToDateTimeImmutables()
    {
        $dateTimes = $this->cut->toDateTimeImmutables();

        $expected = [
            $this->feiertage[0]->toDateTimeImmutable(),
            $this->feiertage[1]->toDateTimeImmutable()
        ];

        $this->assertEquals($expected, $dateTimes);
    }

    public function testGetIterator()
    {
        foreach ($this->cut as $var) {
            $this->assertContains($var, $this->feiertage);
        }
    }

    public function testOffsetExists()
    {
        $this->assertTrue(isset($this->cut[0]));
        $this->assertTrue(isset($this->cut[1]));

        $this->assertFalse(isset($this->cut[2]));
        $this->assertFalse(empty($this->cut));
    }

    public function testOffsetGet()
    {
        $this->assertEquals($this->feiertage[0], $this->cut[0]);
        $this->assertEquals($this->feiertage[1], $this->cut[1]);
    }

    public function testOffsetSet()
    {
        $feiertag = new Feiertag(FeiertagEnum::ZWEITERWEIHNACHTSTAG, date_create("2020-05-06"));

        $this->cut[0] = $feiertag;

        $this->assertNotEquals($feiertag, $this->cut[0]);
    }

    public function testOffsetUnset()
    {
        unset($this->cut[0]);

        $this->assertEquals($this->feiertage[0], $this->cut[0]);
    }

    public function testContains()
    {
        $this->assertTrue($this->cut->contains($this->feiertage[0]->getDate()));
        $this->assertFalse($this->cut->contains($this->feiertage[0]->getDate()->modify("+1 days")));
    }
}
