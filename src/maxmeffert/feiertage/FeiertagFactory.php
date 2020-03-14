<?php
namespace maxmeffert\feiertage;

class FeiertagFactory 
{
    /**
     * Factory Method for <b>New Year's Day</b> of a given year.
     *
     * @param int $jahr The given year.
     * @return Feiertag
     */
    public function neujahrstag(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::NEUJAHRSTAG, new \DateTimeImmutable("$jahr-01-01"));
    }

    /**
     * Factory Method for <b>Twelfth Day</b> of a given year.
     *
     * @param int $jahr The given year.
     * @return Feiertag
     */
    public function heiligeDreiKoenige(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::HEILIGEDREIKOENIGE, new \DateTimeImmutable("$jahr-01-06"));
    }

    /**
     * Factory Method for <b>Holy Thursday</b> of a given year.
     *
     * @param int $jahr The given year.
     * @return Feiertag
     */
    public function gruenDonnerstag(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::GRUENDONNERSTAG, Easter::date($jahr)->modify("-3 days"));
    }

    /**
     * Factory Method for <b>Good Friday</b> of a given year.
     *
     * @param int $jahr The given year.
     * @return Feiertag
     */
    public function karfreitag(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::KARFREITAG, Easter::date($jahr)->modify("-2 days"));
    }

    /**
     * Factory Method for <b>Easter Sunday</b> of a given year.
     *
     * @param int $jahr The given year.
     * @return Feiertag
     */
    public function osterSonntag(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::OSTERSONNTAG, Easter::date($jahr));
    }

    /**
     * Factory Method for <b>Easter Monday</b> of a given year.
     *
     * @param int $jahr The given year.
     * @return Feiertag
     */
    public function osterMontag(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::OSTERMONTAG, Easter::date($jahr)->modify("+1 days"));
    }

    /**
     * Factory Method for <b>Labour Day</b> of a given year.
     *
     * @param int $jahr The given year.
     * @return Feiertag
     */
    public function tagDerArbeit(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::TAGDERARBEIT, new \DateTimeImmutable("$jahr-05-01"));
    }

    /**
     * Factory Method for <b>Ascension Day</b> of a given year.
     *
     * @param int $jahr The given year.
     * @return Feiertag
     */
    public function christiHimmelfahrt(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::CHRISTIHIMMELFAHRT, Easter::date($jahr)->modify("+39 days"));
    }

    /**
     * Factory Method for <b>Whit Sunday</b> of a given year.
     *
     * @param int $jahr The given year.
     * @return Feiertag
     */
    public function pfingstSonntag(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::PFINGSTSONNTAG, Easter::date($jahr)->modify("+49 days"));
    }

    /**
     * Factory Method for <b>Whit Monday</b> of a given year.
     *
     * @param int $jahr The given year.
     * @return Feiertag
     */
    public function pfingstMontag(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::PFINGSTMONTAG, Easter::date($jahr)->modify("+50 days"));
    }

    /**
     * Factory Method for <b>Feast of Corpus Christi</b> of a given year.
     *
     * @param int $jahr The given year.
     * @return Feiertag
     */
    public function fronleichnam(int $jahr): Feiertag
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
    public function augsburgerFriedensfest(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::AUGSBURGERFRIEDENSFEST, new \DateTimeImmutable("$jahr-08-08"));
    }

    /**
     * Factory Method for <b>Feast of the Assumption</b> of a given year.
     *
     * @param int $jahr The given year.
     * @return Feiertag
     */
    public function mariaeHimmelfahrt(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::MARIAEHIMMELFAHRT, new \DateTimeImmutable("$jahr-08-15"));
    }

    /**
     * Factory Method for <b>German Unity Day</b> of a given year.
     *
     * @param int $jahr The given year.
     * @return Feiertag
     */
    public function tagDerDeutschenEinheit(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::TAGDERDEUTSCHENEINHEIT, new \DateTimeImmutable("$jahr-10-03"));
    }

    /**
     * Factory Method for <b>Reformation Day</b> of a given year.
     *
     * @param int $jahr The given year.
     * @return Feiertag
     */
    public function reformationstag(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::REFORMATIONSTAG, new \DateTimeImmutable("$jahr-10-31"));
    }

    /**
     * Factory Method for <b>All Saints' Day</b> of a given year.
     *
     * @param int $jahr The given year.
     * @return Feiertag
     */
    public function allerheiligen(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::ALLERHEILIGEN, new \DateTimeImmutable("$jahr-11-01"));
    }

    /**
     * Factory Method for <b>Penance Day</b> of a given year.
     *
     * @param int $jahr The given year.
     * @return Feiertag
     */
    public function bussUndBettag(int $jahr): Feiertag
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
    public function ersterWeihnachtstag(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::ERSTERWEIHNACHTSTAG, new \DateTimeImmutable("$jahr-12-25"));
    }

    /**
     * Factory Method for <b>2nd Christmas Day</b> of a given year.
     *
     * @param int $jahr The given year.
     * @return Feiertag
     */
    public function zweiterWeihnachtstag(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::ZWEITERWEIHNACHTSTAG, new \DateTimeImmutable("$jahr-12-26"));
    }
}