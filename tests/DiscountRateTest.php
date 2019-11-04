<?php
require __DIR__ . "/../src/DiscountRate.php";
Use PHPUnit\Framework\TestCase;

class DiscountRateTest extends TestCase
{
    function testWithPlatinumMemberWillDiscountFifteenPercent()
    {
        $expectedResult = 0.15;
        $actualResult = discountRateByMembershipType('platinum');
        $this->assertEquals($expectedResult, $actualResult);
    }

    function testWithGoldMemberWillDiscountTenPercent()
    {
        $expectedResult = 0.1;
        $actualResult = discountRateByMembershipType('gold');
        $this->assertEquals($expectedResult, $actualResult);
    }

    function testWithSilverMemberWillDiscountFivePercent()
    {
        $expectedResult = 0.05;
        $actualResult = discountRateByMembershipType('silver');
        $this->assertEquals($expectedResult, $actualResult);
    }

    function testWithInvalidMemberTypeWillThrowException()
    {
        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessage('invalid membership type');
        discountRateByMembershipType('invalidMemberType');
    }

    function testWithNotOnBlackFridayThenNoDiscount() {
        $expectedResult = 0;
        $notBlackFriday = DateTime::createFromFormat("Y-m-d", "2019-01-01");
        $this->assertEquals($expectedResult, discountRateByMembershipType('platinum', $notBlackFriday));
        $this->assertEquals($expectedResult, discountRateByMembershipType('gold', $notBlackFriday));
        $this->assertEquals($expectedResult, discountRateByMembershipType('silver', $notBlackFriday));
    }
}