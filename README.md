# [feiertage](http://intrawarez.github.io/feiertage/)

A PHP7 utility for **legal holidiays in Germany**.

- Computes all 19 legal holidays in Germany for a given year.
- Not limited to unix years, i.e. before 1970 or after 2037 (**does not rely on [```easter_date```](http://php.net/manual/en/function.easter-date.php)**).
- Tested for years: from 1700 to 2299.

## Installation

```
composer require intrawarez/feiertage
```

## Usage

### Get all holidays for specific year
```php
$ft = Feiertage::of(2016);

```

### Get a specific holliday
```php
$os = Feiertag::OsterSonntag(2016);

```
or use array-access capabilities:
```php
$ft = Feiertage::of(2016);
$os = $ft[Feiertag::OSTERSONNTAG];

```

### Check dates for holidays
```php
$date = new \DateTime(...);
Feiertage::check($date); // true or false
```
or get the corresponding constang:
```php
$date = new \DateTime(...);
$which = Feiertage::which($date); // returns an Optional aka MayBe data structure

if ($which->isPresent()) {

	... $which->get() ...

}

```

### Iterate over holidays
```php
foreach (Feiertage::of(2016) as $holiday) {

	...

}
```

## Dynamic Holidays
As for most western countries, all dynamic legal holidays in Germany are christian feasts, which are organized around **Easter Sunday**.
That's why functions like [```easter_date```](http://php.net/manual/en/function.easter-date.php) exist.
However ```easter_date``` is limited to unix years, i.e. before 1970 or after 2037.
Instead of relying on ```easter_date``` this implementation is based on the [*Gaussian Easter Algorithm*](https://de.wikipedia.org/wiki/Gau%C3%9Fsche_Osterformel), which is not limited to unix years. 
The *Gaussian Easter Algorithm* computes Easter Sunday for a given year as a day of march, e.g. 32th March == 1st April.

The implementation of the *Gaussian Easter Algorithm* used by this library looks like this:
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
		
	$os = gauss($year);
	
	$monat = 3;
	
	if (31 < $os) {
	
		$os = $os % 31;
		$monat = 4;
	
	}
	
	return new \DateTimeImmutable("{$year}-{$monat}-{$os}");
	
}
```
Other reference implementations can be found here:
- http://www.nabkal.de/gauss2.html
- https://gallery.technet.microsoft.com/scriptcenter/Calculate-Date-of-Eastern-36c624f9
- https://de.wikibooks.org/wiki/Algorithmensammlung:_Kalender:_Feiertage

## License

The MIT License (MIT)

Copyright (c) <year> <copyright holders>

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

[https://opensource.org/licenses/MIT](https://opensource.org/licenses/MIT)