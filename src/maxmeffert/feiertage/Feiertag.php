<?php
namespace maxmeffert\feiertage;

/**
 * Represents a single legal holiday in Germany.
 *
 * Computes the date of a single legal holiday in Germany for a given year.
 *
 * @author maxmeffert
 */
class Feiertag
{
    /*
     * ===========================================================
     * Factory Methods
     * ===========================================================
     */
    
    /**
     * Factory Method for <b>New Year's Day</b> of a given year.
     *
     * @param int $jahr The given year.
     * @return Feiertag
     */
    public static function neujahrstag(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::NEUJAHRSTAG, new \DateTimeImmutable("$jahr-01-01"));
    }

    /**
     * Factory Method for <b>Twelfth Day</b> of a given year.
     *
     * @param int $jahr The given year.
     * @return Feiertag
     */
    public static function heiligeDreiKoenige(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::HEILIGEDREIKOENIGE, new \DateTimeImmutable("$jahr-01-06"));
    }

    /**
     * Factory Method for <b>Holy Thursday</b> of a given year.
     *
     * @param int $jahr The given year.
     * @return Feiertag
     */
    public static function gruenDonnerstag(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::GRUENDONNERSTAG, Easter::date($jahr)->modify("-3 days"));
    }

    /**
     * Factory Method for <b>Good Friday</b> of a given year.
     *
     * @param int $jahr The given year.
     * @return Feiertag
     */
    public static function karfreitag(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::KARFREITAG, Easter::date($jahr)->modify("-2 days"));
    }

    /**
     * Factory Method for <b>Easter Sunday</b> of a given year.
     *
     * @param int $jahr The given year.
     * @return Feiertag
     */
    public static function osterSonntag(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::OSTERSONNTAG, Easter::date($jahr));
    }

    /**
     * Factory Method for <b>Easter Monday</b> of a given year.
     *
     * @param int $jahr The given year.
     * @return Feiertag
     */
    public static function osterMontag(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::OSTERMONTAG, Easter::date($jahr)->modify("+1 days"));
    }

    /**
     * Factory Method for <b>Labour Day</b> of a given year.
     *
     * @param int $jahr The given year.
     * @return Feiertag
     */
    public static function tagDerArbeit(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::TAGDERARBEIT, new \DateTimeImmutable("$jahr-05-01"));
    }

    /**
     * Factory Method for <b>Ascension Day</b> of a given year.
     *
     * @param int $jahr The given year.
     * @return Feiertag
     */
    public static function christiHimmelfahrt(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::CHRISTIHIMMELFAHRT, Easter::date($jahr)->modify("+39 days"));
    }

    /**
     * Factory Method for <b>Whit Sunday</b> of a given year.
     *
     * @param int $jahr The given year.
     * @return Feiertag
     */
    public static function pfingstSonntag(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::PFINGSTSONNTAG, Easter::date($jahr)->modify("+49 days"));
    }

    /**
     * Factory Method for <b>Whit Monday</b> of a given year.
     *
     * @param int $jahr The given year.
     * @return Feiertag
     */
    public static function pfingstMontag(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::PFINGSTMONTAG, Easter::date($jahr)->modify("+50 days"));
    }

    /**
     * Factory Method for <b>Feast of Corpus Christi</b> of a given year.
     *
     * @param int $jahr The given year.
     * @return Feiertag
     */
    public static function fronleichnam(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::FRONLEICHNAM, Easter::date($jahr)->modify("+60 days"));
    }

    /**
     * Factory Method for <b>Augsburg's Feast of Peace</b> of a given year.
     *
     * This is only a holiday for Augsburg city!
     *
     * @param int $jahr The given year.
     * @return Feiertag
     */
    public static function augsburgerFriedensfest(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::AUGSBURGERFRIEDENSFEST, new \DateTimeImmutable("$jahr-08-08"));
    }

    /**
     * Factory Method for <b>Feast of the Assumption</b> of a given year.
     *
     * @param int $jahr The given year.
     * @return Feiertag
     */
    public static function mariaeHimmelfahrt(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::MARIAEHIMMELFAHRT, new \DateTimeImmutable("$jahr-08-15"));
    }

    /**
     * Factory Method for <b>German Unity Day</b> of a given year.
     *
     * @param int $jahr The given year.
     * @return Feiertag
     */
    public static function tagDerDeutschenEinheit(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::TAGDERDEUTSCHENEINHEIT, new \DateTimeImmutable("$jahr-10-03"));
    }

    /**
     * Factory Method for <b>Reformation Day</b> of a given year.
     *
     * @param int $jahr The given year.
     * @return Feiertag
     */
    public static function reformationstag(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::REFORMATIONSTAG, new \DateTimeImmutable("$jahr-10-31"));
    }

    /**
     * Factory Method for <b>All Saints' Day</b> of a given year.
     *
     * @param int $jahr The given year.
     * @return Feiertag
     */
    public static function allerheiligen(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::ALLERHEILIGEN, new \DateTimeImmutable("$jahr-11-01"));
    }

    /**
     * Factory Method for <b>Penance Day</b> of a given year.
     *
     * @param int $jahr The given year.
     * @return Feiertag
     */
    public static function bussUndBettag(int $jahr): Feiertag
    {
        // For Buss-Und-Bettag compute the first wednesday before Nov 23.!
        // init with 22, because 23 may be a wednesday
        $date = new \DateTimeImmutable("$jahr-11-22");
        
        while ($date->format("N") != 3) {
            $date = $date->modify("-1 days");
        }
        
        return new Feiertag(FeiertagEnum::BUSSUNDBETTAG, $date);
    }

    /**
     * Factory Method for <b>1st Christmas Day</b> of a given year.
     *
     * @param int $jahr The given year.
     * @return Feiertag
     */
    public static function ersterWeihnachtstag(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::ERSTERWEIHNACHTSTAG, new \DateTimeImmutable("$jahr-12-25"));
    }

    /**
     * Factory Method for <b>2nd Christmas Day</b> of a given year.
     *
     * @param int $jahr The given year.
     * @return Feiertag
     */
    public static function zweiterWeihnachtstag(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::ZWEITERWEIHNACHTSTAG, new \DateTimeImmutable("$jahr-12-26"));
    }

    /*
     * ===========================================================
     * Instance
     * ===========================================================
     */
    
    /**
     * The "key".
     *
     * @var int
     */
    private $key;

    /**
     * The date.
     *
     * @var \DateTimeInterface
     */
    private $date;

    /**
     * Constructs a new Feiertag instance from a given "key" and a given date.
     *
     * @param int $key The "key".
     * @param \DateTimeInterface $date The date.
     */
    private function __construct(int $key, \DateTimeInterface $date)
    {
        $this->key = $key;
        $this->date = $date;
    }

    /**
     * Gets the underlying date object.
     *
     * @return \DateTimeInterface
     */
    public function getDate(): \DateTimeInterface
    {
        return clone $this->date;
    }

    /**
     * Gets the "key" of the Feiertag instance.
     *
     * This is one of the constants of the Feiertag class.
     *
     * @return int The "key".
     */
    public function getKey(): int
    {
        return $this->key;
    }

    /**
     * Returns the timezone offset of the underlying date.
     *
     * @return int The timezone offset.
     */
    public function getOffset(): int
    {
        return $this->date->getOffset();
    }

    /**
     * Gets the Unix timestamp of the underlying date.
     *
     * @return int The Unix timestamp.
     */
    public function getTimestamp(): int
    {
        return $this->date->getTimestamp();
    }

    /**
     * Returns the timezone relative to the underlying date.
     *
     * @return \DateTimeZone The timezone.
     */
    public function getTimezone(): \DateTimeZone
    {
        return $this->date->getTimezone();
    }

    /**
     * Returns the underlying date formatted according to given format.
     *
     * @param string $format The given format.
     * @return string The formated date.
     */
    public function format(string $format): string
    {
        return $this->date->format($format);
    }

    /**
     * Creates a corresponding DateTime instance for this Feiertag object
     *
     * @return \DateTime
     */
    public function toDateTime(): \DateTime
    {
        return new \DateTime($this->format(\DateTime::ATOM), $this->getTimezone());
    }

    /**
     * Creates a corresponding DateTimeImmutable instance for this Feiertag object.
     *
     * @return \DateTimeImmutable
     */
    public function toDateTimeImmutable(): \DateTimeImmutable
    {
        return new \DateTimeImmutable($this->format(\DateTime::ATOM), $this->getTimezone());
    }
}
