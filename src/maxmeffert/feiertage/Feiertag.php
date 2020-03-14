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
}
