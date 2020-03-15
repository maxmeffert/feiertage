<?php
namespace maxmeffert\feiertage;

abstract class Feiertage
{
    public static function of(int $jahr): FeiertagAggregate
    {
        $feiertagFactory = new FeiertagFactory(new GaussianEasterSundayCalculator());
        
        $feiertage[FeiertagEnum::NEUJAHRSTAG] =  $feiertagFactory->Neujahrstag($jahr);
        $feiertage[FeiertagEnum::HEILIGEDREIKOENIGE] =  $feiertagFactory->HeiligeDreiKoenige($jahr);
        $feiertage[FeiertagEnum::GRUENDONNERSTAG] =  $feiertagFactory->GruenDonnerstag($jahr);
        $feiertage[FeiertagEnum::KARFREITAG] =  $feiertagFactory->Karfreitag($jahr);
        $feiertage[FeiertagEnum::OSTERSONNTAG] =  $feiertagFactory->OsterSonntag($jahr);
        $feiertage[FeiertagEnum::OSTERMONTAG] =  $feiertagFactory->OsterMontag($jahr);
        $feiertage[FeiertagEnum::TAGDERARBEIT] =  $feiertagFactory->TagDerArbeit($jahr);
        $feiertage[FeiertagEnum::CHRISTIHIMMELFAHRT] =  $feiertagFactory->ChristiHimmelfahrt($jahr);
        $feiertage[FeiertagEnum::PFINGSTSONNTAG] =  $feiertagFactory->PfingstSonntag($jahr);
        $feiertage[FeiertagEnum::PFINGSTMONTAG] =  $feiertagFactory->PfingstMontag($jahr);
        $feiertage[FeiertagEnum::FRONLEICHNAM] =  $feiertagFactory->Fronleichnam($jahr);
        $feiertage[FeiertagEnum::AUGSBURGERFRIEDENSFEST] =  $feiertagFactory->AugsburgerFriedensfest($jahr);
        $feiertage[FeiertagEnum::MARIAEHIMMELFAHRT] =  $feiertagFactory->MariaeHimmelfahrt($jahr);
        $feiertage[FeiertagEnum::TAGDERDEUTSCHENEINHEIT] =  $feiertagFactory->TagDerDeutschenEinheit($jahr);
        $feiertage[FeiertagEnum::REFORMATIONSTAG] =  $feiertagFactory->Reformationstag($jahr);
        $feiertage[FeiertagEnum::ALLERHEILIGEN] =  $feiertagFactory->Allerheiligen($jahr);
        $feiertage[FeiertagEnum::BUSSUNDBETTAG] =  $feiertagFactory->BussUndBettag($jahr);
        $feiertage[FeiertagEnum::ERSTERWEIHNACHTSTAG] =  $feiertagFactory->ErsterWeihnachtstag($jahr);
        $feiertage[FeiertagEnum::ZWEITERWEIHNACHTSTAG] =  $feiertagFactory->ZweiterWeihnachtstag($jahr);

        return new FeiertagAggregate($jahr, $feiertage);
    }

    public static function check($object): bool
    {
        if ($object instanceof Feiertag) {
            return true;
        } elseif ($object instanceof \DateTimeInterface) {
            return self::of(self::yearOf($object))->contains($object);
        }
        
        return false;
    }

    public static function which($object): int
    {
        if ($object instanceof Feiertag) {
            return $object->getKey();
        } elseif ($object instanceof \DateTimeInterface) {
            return self::whichDateTime($object);
        }
        return FeiertagEnum::NONE;
    }

    private static function whichDateTime(\DateTimeInterface $object): int
    {
        $feiertage = self::of(self::yearOf($object));
        foreach ($feiertage as $feiertag) {
            if ($feiertag->equals($object)) {
                return $feiertag->getKey();
            }
        }
        return FeiertagEnum::NONE;
    }
    
    private static function yearOf(\DateTimeInterface $d): int
    {
        return intval($d->format("Y"));
    }
}
