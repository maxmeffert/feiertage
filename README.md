# feiertage

PHP7 class for compute german (movable) holidiays.

Instead of [```easter_date```](http://php.net/manual/en/function.easter-date.php) the computation is based on the [Gaussian Easter Algorithm](https://de.wikipedia.org/wiki/Gau%C3%9Fsche_Osterformel), which is not limited to unix years,i.e. before 1970 or after 2037. 
The *Gaussian Easter Algorithm* computes easter sunday as a day of march, e.g. 32.March == 1.April.

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