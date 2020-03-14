<?php
namespace maxmeffert\feiertage;

class FeiertagAggregate implements \ArrayAccess, \IteratorAggregate
{
    private $jahr;
    private $feiertage = [];

    public function __construct(int $jahr, array $feiertage)
    {
        $this->jahr = $jahr;
        $this->feiertage = $feiertage;
    }

    public function getJahr(): int
    {
        return $this->jahr;
    }

    public function toArray(): array
    {
        $array = [];
        
        foreach ($this->feiertage as $key => $value) {
            $array[$key] = $value;
        }
        
        return $array;
    }

    public function getDates(): array
    {
        return array_map(function (Feiertag $f) {
            return $f->getDate();
        }, $this->toArray());
    }

    public function toDateTimes(): array
    {
        return array_map(function (Feiertag $f) {
            return $f->toDateTime();
        }, $this->toArray());
    }

    public function toDateTimeImmutables(): array
    {
        return array_map(function (Feiertag $f) {
            return $f->toDateTimeImmutable();
        }, $this->toArray());
    }

    public function getIterator(): \Iterator
    {
        return new \ArrayIterator($this->toArray());
    }

    public function offsetExists($offset): bool
    {
        return isset($this->feiertage[$offset]);
    }

    public function offsetGet($offset): Feiertag
    {
        return clone $this->feiertage[$offset];
    }

    public function offsetSet($offset, $value): bool
    {
        return false;
    }

    public function offsetUnset($offset): bool
    {
        return false;
    }
    
    public function contains(\DateTimeInterface $date): bool
    {
        foreach ($this as $f) {
            if ($f->getDate() == $date) {
                return true;
            }
        }
        
        return false;
    }
}
