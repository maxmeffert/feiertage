# feiertage

PHP Helper class to compute german (movable) holidiays, i.e. christian holidays.
The computation is based on the [Gaussian Easter Algorithm](https://de.wikipedia.org/wiki/Gau%C3%9Fsche_Osterformel).

## Installation

```

composer require intrawarez/feiertage

```

## Usage

```php

$holidays2016 = new Feiertage(2016);

$easterSunday = $holidays2016->getOsterSonntag();


```