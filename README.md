# Table of contents
<!-- TOC -->

- [Install phpunit](#install-phpunit)
- [See full project history first time](#see-full-project-history-first-time)
- [First spec, discount rate is 0.15 for platinum customer](#first-spec-discount-rate-is-015-for-platinum-customer)
- [Production code, done first spec for platinum customer](#production-code-done-first-spec-for-platinum-customer)
- [Second spec, discount rate is 0.1 for gold customer](#second-spec-discount-rate-is-01-for-gold-customer)
- [Production code, done second spec for gold customer](#production-code-done-second-spec-for-gold-customer)
- [Third spec, discount rate is 0.05 for silver customer](#third-spec-discount-rate-is-005-for-silver-customer)
- [Production code, done third spec for silver customer](#production-code-done-third-spec-for-silver-customer)
- [Fourth spec, raise exception in case invalid type](#fourth-spec-raise-exception-in-case-invalid-type)
- [Production code, done fourth spec for invalid customer type](#production-code-done-fourth-spec-for-invalid-customer-type)
- [FINISH](#finish)

<!-- /TOC -->

Please run step by step after checkout code

## Install phpunit

```sh
$ composer install
```

## See full project history first time

``` sh
$ git log --oneline --graph --decorate

* 281a761 (HEAD -> master) Production code, done fourth spec for invalid customer type
* c014171 Fourth spec, raise exception in case invalid type
* 1a4be5e Production code, done third spec for silver customer
* d800dc4 Third spec, discount rate is 5% for silver customer
* c427daa Production code, done second spec for gold customer
* 9341691 Second spec, discount rate is 10% for gold customer
* f64bdf4 Production code, done first spec for platinum customer
* a590862 First spec, discount rate is 15% for platinum customer
```

## First spec, discount rate is 0.15 for platinum customer

```sh
$ git checkout a590862
Note: switching to 'a590862'.

$ vendor/bin/phpunit --testdox tests
PHPUnit 8.4.2 by Sebastian Bergmann and contributors.

Discount Rate
✘ With platinum member will discount fifteen percent
  │
  │ Error: Call to undefined function discountRateByMembershipType()
  │
  │ /Users/trinhhung/Projects/discount-rate/tests/DiscountRateTest.php:10
  │

Time: 105 ms, Memory: 6.00 MB


 ERRORS!
 Tests: 1, Assertions: 0, Errors: 1.
```

## Production code, done first spec for platinum customer

```sh
$ git checkout f64bdf4
Note: switching to 'f64bdf4'.

$ composer test
phpunit --testdox tests
PHPUnit 8.4.2 by Sebastian Bergmann and contributors.

Discount Rate
 ✔ With platinum member will discount fifteen percent

Time: 32 ms, Memory: 4.00 MB

OK (1 test, 1 assertion)
```

## Second spec, discount rate is 0.1 for gold customer

```sh
$ git checkout 9341691
Note: switching to '9341691'.

$ composer test
PHPUnit 8.4.2 by Sebastian Bergmann and contributors.

Discount Rate
 ✔ With platinum member will discount fifteen percent
 ✘ With gold member will discount ten percent
   │
   │ Failed asserting that null matches expected 0.1.
   │
   │ /Users/trinhhung/Projects/discount-rate/tests/DiscountRateTest.php:18
   │

Time: 48 ms, Memory: 6.00 MB

Summary of non-successful tests:

Discount Rate
 ✘ With gold member will discount ten percent
   │
   │ Failed asserting that null matches expected 0.1.
   │
   │ /Users/trinhhung/Projects/discount-rate/tests/DiscountRateTest.php:18
   │

FAILURES!
Tests: 2, Assertions: 2, Failures: 1.
Script phpunit --testdox tests handling the test event returned with error code 1
```

## Production code, done second spec for gold customer

```sh
$ git checkout c427daa
Note: switching to 'c427daa'.

$ composer test
> phpunit --testdox tests
PHPUnit 8.4.2 by Sebastian Bergmann and contributors.

Discount Rate
 ✔ With platinum member will discount fifteen percent
 ✔ With gold member will discount ten percent

Time: 34 ms, Memory: 4.00 MB

OK (2 tests, 2 assertions)
```

## Third spec, discount rate is 0.05 for silver customer

```sh
$ git checkout d800dc4
Note: switching to 'd800dc4'.

$ composer test
> phpunit --testdox tests
PHPUnit 8.4.2 by Sebastian Bergmann and contributors.

Discount Rate
 ✔ With platinum member will discount fifteen percent
 ✔ With gold member will discount ten percent
 ✘ With silver member will discount five percent
   │
   │ Failed asserting that null matches expected 0.05.
   │
   │ /Users/trinhhung/Projects/discount-rate/tests/DiscountRateTest.php:25
   │

Time: 51 ms, Memory: 6.00 MB

Summary of non-successful tests:

Discount Rate
 ✘ With silver member will discount five percent
   │
   │ Failed asserting that null matches expected 0.05.
   │
   │ /Users/trinhhung/Projects/discount-rate/tests/DiscountRateTest.php:25
   │

FAILURES!
Tests: 3, Assertions: 3, Failures: 1.
Script phpunit --testdox tests handling the test event returned with error code 1
```

## Production code, done third spec for silver customer

```sh
$ git checkout 1a4be5e 
Note: switching to '1a4be5e'.

$ composer test
> phpunit --testdox tests
PHPUnit 8.4.2 by Sebastian Bergmann and contributors.

Discount Rate
 ✔ With platinum member will discount fifteen percent
 ✔ With gold member will discount ten percent
 ✔ With silver member will discount five percent

Time: 36 ms, Memory: 4.00 MB

OK (3 tests, 3 assertions)
```

## Fourth spec, raise exception in case invalid type

```sh
$ git checkout c014171
Note: switching to 'c014171'.

$ composer test       
> phpunit --testdox tests
PHPUnit 8.4.2 by Sebastian Bergmann and contributors.

Discount Rate
 ✔ With platinum member will discount fifteen percent
 ✔ With gold member will discount ten percent
 ✔ With silver member will discount five percent
 ✘ With invalid member type will throw exception
   │
   │ Failed asserting that exception of type "UnexpectedValueException" is thrown.
   │

Time: 53 ms, Memory: 6.00 MB

Summary of non-successful tests:

Discount Rate
 ✘ With invalid member type will throw exception
   │
   │ Failed asserting that exception of type "UnexpectedValueException" is thrown.
   │

FAILURES!
Tests: 4, Assertions: 4, Failures: 1.
Script phpunit --testdox tests handling the test event returned with error code 1
```

## Production code, done fourth spec for invalid customer type

```sh
$ git checkout 281a761
Note: switching to '281a761'.

composer test     
> phpunit --testdox tests
PHPUnit 8.4.2 by Sebastian Bergmann and contributors.

Discount Rate
 ✔ With platinum member will discount fifteen percent
 ✔ With gold member will discount ten percent
 ✔ With silver member will discount five percent
 ✔ With invalid member type will throw exception

Time: 38 ms, Memory: 4.00 MB

OK (4 tests, 5 assertions)
```

## FINISH