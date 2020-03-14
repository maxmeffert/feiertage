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
        return new Feiertag(FeiertagEnum::NEUJAHRSTAG, new \DateTimeImmutable("$jahr-01-01"));
    }

    public function heiligeDreiKoenige(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::HEILIGEDREIKOENIGE, new \DateTimeImmutable("$jahr-01-06"));
    }

    public function gruenDonnerstag(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::GRUENDONNERSTAG, $this->easterSundayCalculator->calculate($jahr)->modify("-3 days"));
    }

    public function karfreitag(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::KARFREITAG, $this->easterSundayCalculator->calculate($jahr)->modify("-2 days"));
    }

    public function osterSonntag(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::OSTERSONNTAG, $this->easterSundayCalculator->calculate($jahr));
    }

    public function osterMontag(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::OSTERMONTAG, $this->easterSundayCalculator->calculate($jahr)->modify("+1 days"));
    }

    public function tagDerArbeit(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::TAGDERARBEIT, new \DateTimeImmutable("$jahr-05-01"));
    }

    public function christiHimmelfahrt(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::CHRISTIHIMMELFAHRT, $this->easterSundayCalculator->calculate($jahr)->modify("+39 days"));
    }

    public function pfingstSonntag(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::PFINGSTSONNTAG, $this->easterSundayCalculator->calculate($jahr)->modify("+49 days"));
    }
    
    public function pfingstMontag(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::PFINGSTMONTAG, $this->easterSundayCalculator->calculate($jahr)->modify("+50 days"));
    }

    public function fronleichnam(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::FRONLEICHNAM, $this->easterSundayCalculator->calculate($jahr)->modify("+60 days"));
    }

    public function augsburgerFriedensfest(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::AUGSBURGERFRIEDENSFEST, new \DateTimeImmutable("$jahr-08-08"));
    }

    public function mariaeHimmelfahrt(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::MARIAEHIMMELFAHRT, new \DateTimeImmutable("$jahr-08-15"));
    }

    public function tagDerDeutschenEinheit(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::TAGDERDEUTSCHENEINHEIT, new \DateTimeImmutable("$jahr-10-03"));
    }

    public function reformationstag(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::REFORMATIONSTAG, new \DateTimeImmutable("$jahr-10-31"));
    }

    public function allerheiligen(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::ALLERHEILIGEN, new \DateTimeImmutable("$jahr-11-01"));
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
        return new Feiertag(FeiertagEnum::ERSTERWEIHNACHTSTAG, new \DateTimeImmutable("$jahr-12-25"));
    }

    public function zweiterWeihnachtstag(int $jahr): Feiertag
    {
        return new Feiertag(FeiertagEnum::ZWEITERWEIHNACHTSTAG, new \DateTimeImmutable("$jahr-12-26"));
    }
}