<?php
namespace maxmeffert\feiertage;

use Sabertooth\Optionals\OptionalInterface;
use Sabertooth\Optionals\Optional;

/**
 * Represents all 19 legal holidiays in Germany for a given year.
 * Computes movable holidays, i.e. christian holidays, with the *Gaussian Easter Algorithm*.
 *
 * @author maxmeffert
 * @link https://de.wikipedia.org/wiki/Feiertage_in_Deutschland
 */
class Feiertage
{

    /*
     * ===========================================================
     * Utility Methods
     * ===========================================================
     */
    
    /**
     * Gets either the current year or the year of a given date.
     *
     * @param \DateTimeInterface $d The given date.
     * @return int The year.
     */
    public static function jahr(\DateTimeInterface $d = null): int
    {
        if (is_null($d)) {
            $d = new \DateTime();
        }
        
        return intval($d->format("Y"));
    }

    /*
     * ===========================================================
     * Factory Method
     * ===========================================================
     */
    
    /**
     * Creates a new Feiertage instance for a given year.
     *
     * @param int $jahr The year.
     * @return \intrawarez\feiertage\Feiertage
     */
    public static function of(int $jahr = null): FeiertagAggregate
    {
        if (is_null($jahr)) {
            $jahr = self::jahr();
        }
        
        $feiertagFactory = new FeiertagFactory();
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

    /*
     * ===========================================================
     * Static API Methods
     * ===========================================================
     */
    
    /**
     * Whether the givent object is a holiday.
     *
     * Returns <b>true</b> if the given object is a Feiertag instance,
     * or if the given object is a \DateTimeInterface and a holiday in its respective year.
     *
     * @param object $date The given object.
     * @return boolean
     */
    public static function check($object): bool
    {
        if ($object instanceof Feiertag) {
            return true;
        } elseif ($object instanceof \DateTimeInterface) {
            return Feiertage::of(self::jahr($object))->contains($object);
        }
        
        return false;
    }

    /**
     * May return the Feiertag instance of a given object.
     *
     * @param object $date
     * @return OptionalInterface
     */
    public static function which($object): OptionalInterface
    {
        if ($object instanceof Feiertag) {
            return Optional::Of($object);
        } elseif ($object instanceof \DateTimeInterface) {
            return Feiertage::of(self::jahr($object))->get($object);
        }
        
        return Optional::Absent();
    }
}
