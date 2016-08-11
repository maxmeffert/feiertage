# feiertage

PHP Helper class to compute german (movable) holidiays, i.e. christian holidays.
The computation is based on the [Gaussian Easter Algorithm](https://de.wikipedia.org/wiki/Gau%C3%9Fsche_Osterformel).

## Installation

```

composer require intrawarez/feiertage

```

## Usage

### Construction


```php

$ft = Feiertage::of(2016);


```

### asdf

```php

$easterSunday = $ft->getOsterSonntag();


```