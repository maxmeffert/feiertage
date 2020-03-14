<?php
namespace maxmeffert\feiertage;

/**
 * Represents a single legal holiday in Germany.
 *
 * Computes the date of a single legal holiday in Germany for a given year.
 *
 * @author maxmeffert
 */
class Feiertag
{
    /**
     * The "key".
     *
     * @var int
     */
    private $key;

    /**
     * The date.
     *
     * @var \DateTimeInterface
     */
    private $date;

    /**
     * Constructs a new Feiertag instance from a given "key" and a given date.
     *
     * @param int $key The "key".
     * @param \DateTimeInterface $date The date.
     */
    public function __construct(int $key, \DateTimeInterface $date)
    {
        $this->key = $key;
        $this->date = $date;
    }

    /**
     * Gets the underlying date object.
     *
     * @return \DateTimeInterface
     */
    public function getDate(): \DateTimeInterface
    {
        return clone $this->date;
    }

    /**
     * Gets the "key" of the Feiertag instance.
     *
     * This is one of the constants of the Feiertag class.
     *
     * @return int The "key".
     */
    public function getKey(): int
    {
        return $this->key;
    }

    /**
     * Returns the timezone offset of the underlying date.
     *
     * @return int The timezone offset.
     */
    public function getOffset(): int
    {
        return $this->date->getOffset();
    }

    /**
     * Gets the Unix timestamp of the underlying date.
     *
     * @return int The Unix timestamp.
     */
    public function getTimestamp(): int
    {
        return $this->date->getTimestamp();
    }

    /**
     * Returns the timezone relative to the underlying date.
     *
     * @return \DateTimeZone The timezone.
     */
    public function getTimezone(): \DateTimeZone
    {
        return $this->date->getTimezone();
    }

    /**
     * Returns the underlying date formatted according to given format.
     *
     * @param string $format The given format.
     * @return string The formated date.
     */
    public function format(string $format): string
    {
        return $this->date->format($format);
    }

    /**
     * Creates a corresponding DateTime instance for this Feiertag object
     *
     * @return \DateTime
     */
    public function toDateTime(): \DateTime
    {
        return new \DateTime($this->format(\DateTime::ATOM), $this->getTimezone());
    }

    /**
     * Creates a corresponding DateTimeImmutable instance for this Feiertag object.
     *
     * @return \DateTimeImmutable
     */
    public function toDateTimeImmutable(): \DateTimeImmutable
    {
        return new \DateTimeImmutable($this->format(\DateTime::ATOM), $this->getTimezone());
    }
}
