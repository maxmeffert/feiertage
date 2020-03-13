<?php
namespace maxmeffert\feiertage;

abstract class FeiertagEnum {
    /**
     * "Key" for the <b>New Year's Day</b>
     *
     * @var integer
     */
    const NEUJAHRSTAG = 0;

    /**
     * "Key" for the <b>Twelfth Day</b>
     *
     * @var integer
     */
    const HEILIGEDREIKOENIGE = 1;

    /**
     * "Key" for the <b>Holy Thursday</b>
     *
     * @var integer
     */
    const GRUENDONNERSTAG = 2;

    /**
     * "Key" for the <b>Good Friday</b>
     *
     * @var integer
     */
    const KARFREITAG = 3;

    /**
     * "Key" for the <b>Easter Sunday</b>
     *
     * @var integer
     */
    const OSTERSONNTAG = 4;

    /**
     * "Key" for the <b>Easter Monday</b>
     *
     * @var integer
     */
    const OSTERMONTAG = 5;

    /**
     * "Key" for the <b>Labour Day</b>
     *
     * @var integer
     */
    const TAGDERARBEIT = 6;

    /**
     * "Key" for the <b>Ascension Day</b>
     *
     * @var integer
     */
    const CHRISTIHIMMELFAHRT = 7;

    /**
     * "Key" for the <b>Whit Sunday</b>
     *
     * @var integer
     */
    const PFINGSTSONNTAG = 8;

    /**
     * "Key" for the <b>Whit Monday</b>
     *
     * @var integer
     */
    const PFINGSTMONTAG = 9;

    /**
     * "Key" for the <b>Feast of Corpus Christi</b>
     *
     * @var integer
     */
    const FRONLEICHNAM = 10;

    /**
     * "Key" for the <b>Augsburg's Feast of Peace</b>
     *
     * This is only a holiday for Augsburg city!
     *
     * @var integer
     */
    const AUGSBURGERFRIEDENSFEST = 11;

    /**
     * "Key" for the <b>Feast of the Assumption</b>
     *
     * @var integer
     */
    const MARIAEHIMMELFAHRT = 12;

    /**
     * "Key" for the <b>German Unity Day</b>
     *
     * @var integer
     */
    const TAGDERDEUTSCHENEINHEIT = 13;

    /**
     * "Key" for the <b>Reformation Day</b>
     *
     * @var integer
     */
    const REFORMATIONSTAG = 14;

    /**
     * "Key" for the <b>All Saints' Day</b>
     *
     * @var integer
     */
    const ALLERHEILIGEN = 15;

    /**
     * "Key" for the <b>Penance Day</b>
     *
     * @var integer
     */
    const BUSSUNDBETTAG = 16;

    /**
     * "Key" for the <b>1st Christmas Day</b>
     *
     * @var integer
     */
    const ERSTERWEIHNACHTSTAG = 17;

    /**
     * "Key" for the <b>2nd Christmas Day</b>
     *
     * @var integer
     */
    const ZWEITERWEIHNACHTSTAG = 18;

    /**
     * Gets the array of all valid "keys" with their names as indeces.
     *
     * @return array The array "keys" with their names as indeces.
     */
    public static function keys(): array
    {
        $class = new \ReflectionClass(self::class);
        
        return $class->getConstants();
    }
}
