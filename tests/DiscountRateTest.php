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
}