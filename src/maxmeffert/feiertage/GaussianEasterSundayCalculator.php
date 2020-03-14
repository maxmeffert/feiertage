<?php
namespace maxmeffert\feiertage;

function div(int $a, int $b): int
{
    return intval($a / $b);
}

function mod(int $a, int $b): int
{
    return intval($a % $b);
}

class GaussianEasterSundayCalculator implements EasterSundayCalculatorInterface
{

    /**
     * Computes the "Gauss-Day-Number" of <b>Easter Sunday</b> for a given year.
     *
     * This is the modern style implementation of the <i><a href="https://de.wikipedia.org/wiki/Gau%C3%9Fsche_Osterformel">Gaussian Easter Algorithm</a></i>
     * taken from <a href="http://www.nabkal.de/gauss2.html">here</a> and <a href="https://gallery.technet.microsoft.com/scriptcenter/Calculate-Date-of-Eastern-36c624f9">here</a>.
     *
     * The <i>Gaussian Easter Algorithm</i> computes the number of the day of easter sunday as n-th day of March, i.e. 32th March == 1st April.
     *
     * @link https://de.wikipedia.org/wiki/Gau%C3%9Fsche_Osterformel
     * @link http://www.nabkal.de/gauss2.html
     * @link https://gallery.technet.microsoft.com/scriptcenter/Calculate-Date-of-Eastern-36c624f9
     *
     * @param int $year The given year.
     * @return int The "Gauss-Day-Number" of <b>Easter Sunday</b> for the given year.
     */
    public static function gauss(int $year): int
    {
        $a = mod($year, 19);
        $b = mod($year, 4);
        $c = mod($year, 7);
        $H1 = div($year, 100);
        $H2 = div($year, 400);
        $N = 4 + $H1 - $H2;
        $M = 15 + $H1 - $H2 - div(8 * $H1 + 13, 25);
        $d = mod(19 * $a + $M, 30);
        $e = mod(2 * $b + 4 * $c + 6 * $d + $N, 7);
        $o = 22 + $d + $e;
        
        if ($o == 57) {
            $o = 50;
        }
        
        if ($d == 28 && $e == 6 && $a > 10) {
            $o = 49;
        }
        
        return $o;
    }

    /**
     * Computes the date of <b>Easter Sunday</b> for a given year.
     *
     * Instead of relying on PHP's native <b>easter_date</b> function this implementation is based on the <i>Gaussian Easter Algorithm</i>,
     * so it is <b>not limited to unix years</b>, i.e.: 1970 - 2037.
     *
     * @param int $year The given year.
     * @return \DateTime The date of <b>Easter Sunday</b> for the given year.
     */
    public static function date(int $year): \DateTimeImmutable
    {
        $os = self::gauss($year);
        
        $monat = 3;
        
        if (31 < $os) {
            $os = $os % 31;
            $monat = 4;
        }
        
        return new \DateTimeImmutable("{$year}-{$monat}-{$os}");
    }

    public function calculate(int $year): \DateTimeImmutable
    {
        return $this->date($year);
    }
}
