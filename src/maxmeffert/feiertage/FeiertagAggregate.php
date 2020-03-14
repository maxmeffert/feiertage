<?php
namespace maxmeffert\feiertage;

use Sabertooth\Optionals\OptionalInterface;
use Sabertooth\Optionals\Optional;

class FeiertagAggregate implements \ArrayAccess, \IteratorAggregate
{
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
    public function __construct(int $jahr, array $feiertage)
    {
        $this->jahr = $jahr;
        $this->feiertage = $feiertage;
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