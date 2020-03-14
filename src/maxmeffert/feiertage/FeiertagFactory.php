<?php
namespace maxmeffert\feiertage;

class FeiertagFactory
{
    private $easterSundayCalculator;

    public function __construct(EasterSundayCalculatorInterface $easterSundayCalculator)
    {
        $this->easterSundayCalculator = $easterSundayCalculator;
    }

    public function neujahrstag(int $jahr): Feiertag
    {
        $date = new \DateTimeImmutable("$jahr-01-01");
        return new Feiertag(FeiertagEnum::NEUJAHRSTAG, $date);
    }

    public function heiligeDreiKoenige(int $jahr): Feiertag
    {
        $date = new \DateTimeImmutable("$jahr-01-06");
        return new Feiertag(FeiertagEnum::HEILIGEDREIKOENIGE, $date);
    }

    public function gruenDonnerstag(int $jahr): Feiertag
    {
        $easterSunday = $this->easterSundayCalculator->calculate($jahr);
        $date = $easterSunday->modify("-3 days");
        return new Feiertag(FeiertagEnum::GRUENDONNERSTAG, $date);
    }

    public function karfreitag(int $jahr): Feiertag
    {
        $easterSunday = $this->easterSundayCalculator->calculate($jahr);
        $date = $easterSunday->modify("-2 days");
        return new Feiertag(FeiertagEnum::KARFREITAG, $date);
    }

    public function osterSonntag(int $jahr): Feiertag
    {
        $easterSunday = $this->easterSundayCalculator->calculate($jahr);
        $date = $easterSunday;
        return new Feiertag(FeiertagEnum::OSTERSONNTAG, $date);
    }

    public function osterMontag(int $jahr): Feiertag
    {
        $easterSunday = $this->easterSundayCalculator->calculate($jahr);
        $date = $easterSunday->modify("+1 days");
        return new Feiertag(FeiertagEnum::OSTERMONTAG, $date);
    }

    public function tagDerArbeit(int $jahr): Feiertag
    {
        $date = new \DateTimeImmutable("$jahr-05-01");
        return new Feiertag(FeiertagEnum::TAGDERARBEIT, $date);
    }

    public function christiHimmelfahrt(int $jahr): Feiertag
    {
        $easterSunday = $this->easterSundayCalculator->calculate($jahr);
        $date = $easterSunday->modify("+39 days");
        return new Feiertag(FeiertagEnum::CHRISTIHIMMELFAHRT, $date);
    }

    public function pfingstSonntag(int $jahr): Feiertag
    {
        $easterSunday = $this->easterSundayCalculator->calculate($jahr);
        $date = $easterSunday->modify("+49 days");
        return new Feiertag(FeiertagEnum::PFINGSTSONNTAG, $date);
    }
    
    public function pfingstMontag(int $jahr): Feiertag
    {
        $easterSunday = $this->easterSundayCalculator->calculate($jahr);
        $date = $easterSunday->modify("+50 days");
        return new Feiertag(FeiertagEnum::PFINGSTMONTAG, $date);
    }

    public function fronleichnam(int $jahr): Feiertag
    {
        $easterSunday = $this->easterSundayCalculator->calculate($jahr);
        $date = $easterSunday->modify("+60 days");
        return new Feiertag(FeiertagEnum::FRONLEICHNAM, $date);
    }

    public function augsburgerFriedensfest(int $jahr): Feiertag
    {
        $date = new \DateTimeImmutable("$jahr-08-08");
        return new Feiertag(FeiertagEnum::AUGSBURGERFRIEDENSFEST, $date);
    }

    public function mariaeHimmelfahrt(int $jahr): Feiertag
    {
        $date = new \DateTimeImmutable("$jahr-08-15");
        return new Feiertag(FeiertagEnum::MARIAEHIMMELFAHRT, $date);
    }

    public function tagDerDeutschenEinheit(int $jahr): Feiertag
    {
        $date = new \DateTimeImmutable("$jahr-10-03");
        return new Feiertag(FeiertagEnum::TAGDERDEUTSCHENEINHEIT, $date);
    }

    public function reformationstag(int $jahr): Feiertag
    {
        $date = new \DateTimeImmutable("$jahr-10-31");
        return new Feiertag(FeiertagEnum::REFORMATIONSTAG, $date);
    }

    public function allerheiligen(int $jahr): Feiertag
    {
        $date = new \DateTimeImmutable("$jahr-11-01");
        return new Feiertag(FeiertagEnum::ALLERHEILIGEN, $date);
    }

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

    public function ersterWeihnachtstag(int $jahr): Feiertag
    {
        $date = new \DateTimeImmutable("$jahr-12-25");
        return new Feiertag(FeiertagEnum::ERSTERWEIHNACHTSTAG, $date);
    }

    public function zweiterWeihnachtstag(int $jahr): Feiertag
    {
        $date = new \DateTimeImmutable("$jahr-12-26");
        return new Feiertag(FeiertagEnum::ZWEITERWEIHNACHTSTAG, $date);
    }
}
