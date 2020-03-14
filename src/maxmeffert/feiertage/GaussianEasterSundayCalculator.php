<?php
namespace maxmeffert\feiertage;

class GaussianEasterSundayCalculator implements EasterSundayCalculatorInterface
{
    private static function div(int $a, int $b): int
    {
        return intval($a / $b);
    }
    
    private static function mod(int $a, int $b): int
    {
        return intval($a % $b);
    }

    private static function gauss(int $year): int
    {
        $a = self::mod($year, 19);
        $b = self::mod($year, 4);
        $c = self::mod($year, 7);
        $H1 = self::div($year, 100);
        $H2 = self::div($year, 400);
        $N = 4 + $H1 - $H2;
        $M = 15 + $H1 - $H2 - self::div(8 * $H1 + 13, 25);
        $d = self::mod(19 * $a + $M, 30);
        $e = self::mod(2 * $b + 4 * $c + 6 * $d + $N, 7);
        $o = 22 + $d + $e;
        
        if ($o == 57) {
            $o = 50;
        }
        
        if ($d == 28 && $e == 6 && $a > 10) {
            $o = 49;
        }
        
        return $o;
    }

    public function calculate(int $year): \DateTimeImmutable
    {
        $os = self::gauss($year);
        
        $monat = 3;
        
        // $os may be the 32. March = 1. April
        if (31 < $os) {
            $os = $os % 31;
            $monat = 4;
        }
        
        return new \DateTimeImmutable("{$year}-{$monat}-{$os}");
    }
}
