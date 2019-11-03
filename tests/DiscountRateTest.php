<?php

Use PHPUnit\Framework\TestCase;

class DiscountRateTest extends TestCase
{
    function testWithPlatinumMemberWillDiscountFifteenPercent()
    {
        $expectedResult = 0.15;
        $actualResult = discountRateByMembershipType('platinum');
        $this->assertEquals($expectedResult, $actualResult);
    }
}