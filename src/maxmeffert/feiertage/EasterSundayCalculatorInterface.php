<?php
namespace maxmeffert\feiertage;

interface EasterSundayCalculatorInterface {

    function calculate(int $year): \DateTimeImmutable;
    
}