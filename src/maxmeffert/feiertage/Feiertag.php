<?php
namespace maxmeffert\feiertage;

class Feiertag
{
    private $key;
    private $date;

    public function __construct(int $key, \DateTimeInterface $date)
    {
        $this->key = $key;
        $this->date = $date;
    }

    public function getDate(): \DateTimeInterface
    {
        return clone $this->date;
    }

    public function getKey(): int
    {
        return $this->key;
    }

    public function getOffset(): int
    {
        return $this->date->getOffset();
    }

    public function getTimestamp(): int
    {
        return $this->date->getTimestamp();
    }

    public function getTimezone(): \DateTimeZone
    {
        return $this->date->getTimezone();
    }

    public function format(string $format): string
    {
        return $this->date->format($format);
    }

    public function toDateTime(): \DateTime
    {
        return new \DateTime($this->format(\DateTime::ATOM), $this->getTimezone());
    }

    public function toDateTimeImmutable(): \DateTimeImmutable
    {
        return new \DateTimeImmutable($this->format(\DateTime::ATOM), $this->getTimezone());
    }

    public function equals(object $other): bool
    {
        if ($other instanceof Feiertag) {
            return $this->equalsFeiertag($other);
        } elseif ($other instanceof \DateTimeInterface) {
            return $this->equalsDateTime($other);
        }
        return false;
    }

    private function equalsFeiertag(Feiertag $other): bool
    {
        $format = "Y-m-d";
        $otherKey = $other->getKey();
        $otherDate = $other->format($format);
        $thisKey = $this->key;
        $thisDate = $this->format($format);
        return $otherKey == $thisKey && $otherDate == $thisDate;
    }

    private function equalsDateTime(\DateTimeInterface $other): bool
    {
        $format = "Y-m-d";
        $otherDate = $other->format($format);
        $thisDate = $this->format($format);
        return $otherDate == $thisDate;
    }
}
