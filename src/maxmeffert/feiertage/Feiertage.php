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
class Feiertage implements \ArrayAccess, \IteratorAggregate
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
    public static function of(int $jahr = null): Feiertage
    {
        if (is_null($jahr)) {
            $jahr = self::jahr();
        }
        
        return new Feiertage($jahr);
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

    /*
     * ===========================================================
     * Instance
     * ===========================================================
     */
    
    /**
     * The year.
     * @var int
     */
    private $jahr;

    /**
     * The hollydays.
     * @var array
     */
    private $feiertage = [];

    /**
     * Constructs a new Feiertage instance.
     * @param int $jahr
     */
    private function __construct(int $jahr)
    {
        $this->jahr = $jahr;
        
        $this->feiertage[FeiertagEnum::NEUJAHRSTAG] = Feiertag::Neujahrstag($jahr);
        $this->feiertage[FeiertagEnum::HEILIGEDREIKOENIGE] = Feiertag::HeiligeDreiKoenige($jahr);
        $this->feiertage[FeiertagEnum::GRUENDONNERSTAG] = Feiertag::GruenDonnerstag($jahr);
        $this->feiertage[FeiertagEnum::KARFREITAG] = Feiertag::Karfreitag($jahr);
        $this->feiertage[FeiertagEnum::OSTERSONNTAG] = Feiertag::OsterSonntag($jahr);
        $this->feiertage[FeiertagEnum::OSTERMONTAG] = Feiertag::OsterMontag($jahr);
        $this->feiertage[FeiertagEnum::TAGDERARBEIT] = Feiertag::TagDerArbeit($jahr);
        $this->feiertage[FeiertagEnum::CHRISTIHIMMELFAHRT] = Feiertag::ChristiHimmelfahrt($jahr);
        $this->feiertage[FeiertagEnum::PFINGSTSONNTAG] = Feiertag::PfingstSonntag($jahr);
        $this->feiertage[FeiertagEnum::PFINGSTMONTAG] = Feiertag::PfingstMontag($jahr);
        $this->feiertage[FeiertagEnum::FRONLEICHNAM] = Feiertag::Fronleichnam($jahr);
        $this->feiertage[FeiertagEnum::AUGSBURGERFRIEDENSFEST] = Feiertag::AugsburgerFriedensfest($jahr);
        $this->feiertage[FeiertagEnum::MARIAEHIMMELFAHRT] = Feiertag::MariaeHimmelfahrt($jahr);
        $this->feiertage[FeiertagEnum::TAGDERDEUTSCHENEINHEIT] = Feiertag::TagDerDeutschenEinheit($jahr);
        $this->feiertage[FeiertagEnum::REFORMATIONSTAG] = Feiertag::Reformationstag($jahr);
        $this->feiertage[FeiertagEnum::ALLERHEILIGEN] = Feiertag::Allerheiligen($jahr);
        $this->feiertage[FeiertagEnum::BUSSUNDBETTAG] = Feiertag::BussUndBettag($jahr);
        $this->feiertage[FeiertagEnum::ERSTERWEIHNACHTSTAG] = Feiertag::ErsterWeihnachtstag($jahr);
        $this->feiertage[FeiertagEnum::ZWEITERWEIHNACHTSTAG] = Feiertag::ZweiterWeihnachtstag($jahr);
    }

    /**
     * Gets the year of the holidays.
     *
     * @return int
     */
    public function getJahr(): int
    {
        return $this->jahr;
    }

    /**
     * Gets the array copy of all holidays.
     *
     * @return array The array of all Feiertag instance clones.
     */
    public function toArray(): array
    {
        $array = [];
        
        foreach ($this->feiertage as $key => $value) {
            $array[$key] = clone $value;
        }
        
        return $array;
    }

    /**
     * Gets the array of dates of all hollidays.
     *
     * @return array The Array of \DateTimeInterface instances.
     */
    public function getDates(): array
    {
        return array_map(function (Feiertag $f) {
            return $f->getDate();
        }, $this->toArray());
    }

    /**
     * Gets the array of dates of all hollidays.
     *
     * @return array The Array of \DateTime instances.
     */
    public function toDateTimes(): array
    {
        return array_map(function (Feiertag $f) {
            return $f->toDateTime();
        }, $this->toArray());
    }

    /**
     * Gets the array of dates of all hollidays.
     *
     * @return array The Array of \DateTimeImmutable instances.
     */
    public function toDateTimeImmutables(): array
    {
        return array_map(function (Feiertag $f) {
            
            return $f->toDateTimeImmutable();
        }, $this->toArray());
    }

    /**
     * Gets the iterator corresponding to the Feiertage instance.
     *
     * @return \Iterator The Iterator
     */
    public function getIterator(): \Iterator
    {
        return new \ArrayIterator($this->toArray());
    }

    /**
     * Whether a date for a given offset exists.
     * A valid offset is one of the constants: Feiertage::NEUJAHRSTAGE, etc.
     *
     * @param int $offset The given offset.
     * @return bool Whether the offset exists.
     */
    public function offsetExists($offset): bool
    {
        return isset($this->feiertage[$offset]);
    }

    /**
     * Gets the date for a given offset.
     * A valid offset is one of the constants: Feiertage::NEUJAHRSTAGE, etc.
     *
     * @param int $offset The given offset.
     * @return \DateTime The date mapped to the offset.
     */
    public function offsetGet($offset): Feiertag
    {
        return clone $this->feiertage[$offset];
    }

    /**
     * Not Supported! Feiertage ist immutable.
     *
     * @param int $offset
     * @param \DateTime $value
     * @return bool
     */
    public function offsetSet($offset, $value): bool
    {
        return false;
    }

    /**
     * Not Supported! Feiertage ist immutable.
     *
     * @param int $offset
     * @return bool
     */
    public function offsetUnset($offset): bool
    {
        return false;
    }

    /**
     * Whether a given date is a holliday in this Fiertage instance.
     *
     * @param \DateTimeInterface $date The given date.
     * @return boolean
     */
    public function contains(\DateTimeInterface $date): bool
    {
        /**
         *
         * @var Feiertag $f
         */
        foreach ($this as $f) {
            if ($f->getDate() == $date) {
                return true;
            }
        }
        
        return false;
    }

    /**
     * May get the Feiertag instance of a given date.
     *
     * @param \DateTimeInterface $date The given date.
     * @return OptionalInterface The optional Feiertag instance.
     */
    public function get(\DateTimeInterface $date): OptionalInterface
    {
        /**
         *
         * @var Feiertag $f
         */
        foreach ($this as $key => $f) {
            if ($f->getDate() == $date) {
                return Optional::Of(clone $f);
            }
        }
        
        return Optional::Absent();
    }
}
