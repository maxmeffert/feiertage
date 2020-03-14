<?php
namespace maxmeffert\feiertage;

interface EasterSundayCalculatorInterface
{
    public function calculate(int $year): \DateTimeImmutable;   
}
