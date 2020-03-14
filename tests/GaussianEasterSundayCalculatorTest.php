<?php
namespace maxmeffert\feiertage\tests;

use PHPUnit\Framework\TestCase;
use maxmeffert\feiertage\GaussianEasterSundayCalculator;

/**
 * Gets the sorted array of konwn easter sundays from './knownEasterSundays.php'
 *
 * @author maxmeffert
 */
function KnownEasterSundays(): array
{
    return include __DIR__ . "/knownEasterSundays.php";
}

/**
 * Tests the implementation of the Easter class.
 *
 * @author maxmeffert
 */
class GaussianEasterSundayCalculatorTest extends TestCase
{
    

    private $easterSundayCalculator;
    
    protected function setUp(): void
    {
        $this->easterSundayCalculator = new GaussianEasterSundayCalculator();
    }

    /**
     * Computes the date of easter sunday for a given year based on PHP's native <b>easter_date</b>
     *
     * @param int $year
     * @return DateTime
     */
    private static function nativeEasterSunday(int $year): \DateTime
    {
        $easterDate = date_create(date("Y-m-d", easter_date($year)));
        
        // easter_date may actually compute a sunday on recent php versions
        if ($easterDate->format("N") == 6) {
            $easterDate->modify("+1 days");
        }
        
        return $easterDate;
    }

    /**
     * Tests the covarage for domain and range of known easter sundays with data taken from http://www.assa.org.au/edm
     */
    public function testKnownEasterSundayCoverage()
    {
        /**
         *
         * @var \DateTime $easterSunday
         */
        foreach (KnownEasterSundays() as $easterSunday) {
            $year = intval($easterSunday->format("Y"));
            $this->assertEquals($easterSunday, $this->easterSundayCalculator->calculate($year));
        }
    }

    /**
     * Tests the covarage of the domain of PHP's native <b>easter_date</b> function.
     */
    public function testNativeEasterDateDomainCovarage()
    {
        for ($year = 1970; $year < 2038; $year ++) {
            $this->assertEquals(self::nativeEasterSunday($year), $this->easterSundayCalculator->calculate($year));
        }
    }
}
