<?php
require_once __DIR__ . "/../src/DiscountRate.php";
Use PHPUnit\Framework\TestCase;
Use DateTimeImmutable;

class DiscountRateTest extends TestCase
{
    function testWithPlatinumMemberWillDiscountFifteenPercent()
    {
        $expectedResult = 0.15;
        $blackFriday = DateTimeImmutable::createFromFormat('Y-m-d', '2019-11-29');
        $actualResult = discountRateByMembershipType('platinum', $blackFriday);
        $this->assertEquals($expectedResult, $actualResult);
    }

    function testWithGoldMemberWillDiscountTenPercent()
    {
        $expectedResult = 0.1;
        $blackFriday = DateTimeImmutable::createFromFormat('Y-m-d', '2019-11-29');
        $actualResult = discountRateByMembershipType('gold', $blackFriday);
        $this->assertEquals($expectedResult, $actualResult);
    }

    function testWithSilverMemberWillDiscountFivePercent()
    {
        $expectedResult = 0.05;
        $blackFriday = DateTimeImmutable::createFromFormat('Y-m-d', '2019-11-29');
        $actualResult = discountRateByMembershipType('silver', $blackFriday);
        $this->assertEquals($expectedResult, $actualResult);
    }

    function testWithInvalidMemberTypeWillThrowException()
    {
        $blackFriday = DateTimeImmutable::createFromFormat('Y-m-d', '2019-11-29');
        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessage('invalid membership type');
        discountRateByMembershipType('invalidMemberType', $blackFriday);
    }

    function testWithNotOnBlackFridayThenNoDiscount() {
        $expectedResult = 0;
        $notBlackFriday = DateTimeImmutable::createFromFormat("Y-m-d", "2019-01-01");
        $this->assertEquals($expectedResult, discountRateByMembershipType('platinum', $notBlackFriday));
        $this->assertEquals($expectedResult, discountRateByMembershipType('gold', $notBlackFriday));
        $this->assertEquals($expectedResult, discountRateByMembershipType('silver', $notBlackFriday));
    }
}