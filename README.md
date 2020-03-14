[![Build Status](https://travis-ci.org/maxmeffert/feiertage.svg?branch=master)](https://travis-ci.org/maxmeffert/feiertage)
[![Coverage Status](https://coveralls.io/repos/github/maxmeffert/feiertage/badge.svg?branch=master)](https://coveralls.io/github/maxmeffert/feiertage?branch=master)
[![Latest Stable Version](https://poser.pugx.org/maxmeffert/feiertage/v/stable)](https://packagist.org/packages/maxmeffert/feiertage)
[![License](https://poser.pugx.org/maxmeffert/feiertage/license)](https://packagist.org/packages/maxmeffert/sabertooth)

# [feiertage](http://intrawarez.github.io/feiertage/)

A PHP7 utility for **legal holidiays in Germany**.

- Computes all 19 legal holidays in Germany for a given year.
- Based on the **[Gaussian Easter Formula](https://de.wikipedia.org/wiki/Gau%C3%9Fsche_Osterformel)**
- Not limited to unix years, i.e. before 1970 or after 2037 (**does not rely on [```easter_date```](http://php.net/manual/en/function.easter-date.php)**).
- Tested for years: from 1700 to 2299.

## Installation

```
composer require maxmeffert/feiertage
```

## Documentation

Documentation can be found [here](http://intrawarez.github.io/feiertage/docs/).

## Usage

### Get all holidays for specific year
```php
$ft = Feiertage::of(2020);
```

### Get a specific holliday
```php
$ft = Feiertage::of(2020);
$os = $ft[FeiertagEnum::OSTERSONNTAG];
```

### Check dates for holidays
```php
$date = new \DateTime(...);
if (Feiertage::check($date))
{
	...
}
```
or get the corresponding constant:
```php
$date = new \DateTime(...);
$which = Feiertage::which($date);
if ($which == FeiertagEnum::OSTERSONNTAG)
{
	... 
}
```

### Iterate over holidays
```php
foreach (Feiertage::of(2020) as $holiday)
{
	...
}
```

## Dynamic Holidays
As for most western countries, all dynamic legal holidays in Germany are christian feasts, which are organized around **Easter Sunday**.
That's why functions like [```easter_date```](http://php.net/manual/en/function.easter-date.php) exist.
However [```easter_date```](http://php.net/manual/en/function.easter-date.php) is limited to unix years, i.e. before 1970 or after 2037.
Instead of relying on [```easter_date```](http://php.net/manual/en/function.easter-date.php) this implementation is based on the *[Gaussian Easter Formula](https://de.wikipedia.org/wiki/Gau%C3%9Fsche_Osterformel)*, which is not limited to unix years. 
The *[Gaussian Easter Formula](https://de.wikipedia.org/wiki/Gau%C3%9Fsche_Osterformel)* computes Easter Sunday for a given year as a day of march, e.g. the 32th March is the 1st April, the 33rd March is the 2nd April, etc.

The implementation of the *[Gaussian Easter Formula](https://de.wikipedia.org/wiki/Gau%C3%9Fsche_Osterformel)* used by this library looks like this:
```php
function div (int $a, int $b) : int {

	return intval( $a / $b );

}

function mod (int $a, int $b) : int {

	return intval( $a % $b );

}

function gauss (int $year) : int {
	
	$a = mod($year, 19);
	$b = mod($year, 4);
	$c = mod($year, 7);
	$H1 = div($year, 100);
	$H2 = div($year, 400);
	$N = 4 + $H1 - $H2;
	$M = 15 + $H1 - $H2 - div(8 * $H1 + 13, 25);
	$d = mod(19 * $a + $M, 30);
	$e = mod(2 * $b + 4 * $c + 6 * $d + $N, 7);
	$o = 22 + $d + $e;

	if ($o == 57) {
		
		$o = 50;
		
	}
	
	if ($d == 28 && $e == 6 && $a > 10) {
		
		$o = 49;
		
	}

	return $o;

}

function easterSunday (int $year) : \DateTimeImmutable {
		
	$day = gauss($year);
	
	$month = 3;
	
	if (31 < $os) {
	
		$day = mod($os, 31);
		$month = 4;
	
	}
	
	return new \DateTimeImmutable("{$year}-{$month}-{$day}");
	
}
```
Other reference implementations can be found here:
- http://www.nabkal.de/gauss2.html
- https://gallery.technet.microsoft.com/scriptcenter/Calculate-Date-of-Eastern-36c624f9
- https://de.wikibooks.org/wiki/Algorithmensammlung:_Kalender:_Feiertage

## License

The MIT License (MIT)

Copyright (c) 2020 Maximilian Meffert

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

[https://opensource.org/licenses/MIT](https://opensource.org/licenses/MIT)