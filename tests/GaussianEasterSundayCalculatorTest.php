<?php
namespace maxmeffert\feiertage\tests;

use PHPUnit\Framework\TestCase;
use maxmeffert\feiertage\GaussianEasterSundayCalculator;

class GaussianEasterSundayCalculatorTest extends TestCase
{
    private $easterSundayCalculator;
    
    protected function setUp(): void
    {
        $this->easterSundayCalculator = new GaussianEasterSundayCalculator();
    }

    private static function knownEasterSundays(): array
    {
        return include __DIR__ . "/knownEasterSundays.php";
    }

    private static function nativeEasterSunday(int $year): \DateTime
    {
        $easterDate = date_create(date("Y-m-d", easter_date($year)));
        
        // easter_date may actually compute a sunday on recent php versions
        if ($easterDate->format("N") == 6) {
            $easterDate->modify("+1 days");
        }
        
        return $easterDate;
    }

    public function testKnownEasterSundayCoverage()
    {
        foreach (self::KnownEasterSundays() as $easterSunday) {
            $year = intval($easterSunday->format("Y"));
            $this->assertEquals($easterSunday, $this->easterSundayCalculator->calculate($year));
        }
    }

    public function testNativeEasterDateDomainCovarage()
    {
        for ($year = 1970; $year < 2038; $year ++) {
            $this->assertEquals(self::nativeEasterSunday($year), $this->easterSundayCalculator->calculate($year));
        }
    }
}
