<?php
namespace maxmeffert\feiertage;

abstract class FeiertagEnum {
    
    const NONE = -1;

    const NEUJAHRSTAG = 0;
    const HEILIGEDREIKOENIGE = 1;
    const GRUENDONNERSTAG = 2;
    const KARFREITAG = 3;
    const OSTERSONNTAG = 4;
    const OSTERMONTAG = 5;
    const TAGDERARBEIT = 6;
    const CHRISTIHIMMELFAHRT = 7;
    const PFINGSTSONNTAG = 8;
    const PFINGSTMONTAG = 9;
    const FRONLEICHNAM = 10;
    const AUGSBURGERFRIEDENSFEST = 11;
    const MARIAEHIMMELFAHRT = 12;
    const TAGDERDEUTSCHENEINHEIT = 13;
    const REFORMATIONSTAG = 14;
    const ALLERHEILIGEN = 15;
    const BUSSUNDBETTAG = 16;
    const ERSTERWEIHNACHTSTAG = 17;
    const ZWEITERWEIHNACHTSTAG = 18;

    public static function keys(): array
    {
        $class = new \ReflectionClass(self::class);
        
        return $class->getConstants();
    }
}
