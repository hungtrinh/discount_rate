<?php
require_once __DIR__ . "/../src/DiscountRate.php";
Use PHPUnit\Framework\TestCase;
Use DateTimeImmutable; 

class IsNotBlackFridayTest extends TestCase
{
    public function generateNotBlackFridayDataProvider()
    {
        $begin = new DateTimeImmutable ('2019-01-01' );
        $end = new DateTimeImmutable( '2020-01-01' );
        $interval = new DateInterval('P1D');
        $dateRange = new DatePeriod($begin, $interval ,$end);
        foreach ($dateRange as $date) {
            $isBlackFriday = '2019-11-29' === $date->format('Y-m-d') ;
            if ($isBlackFriday) continue;
            yield $date->format('l, Y-m-d') => [$date];
        }
    }
    
    /**
     * @dataProvider generateNotBlackFridayDataProvider
     *
     * @return void
     */
    function testIsNotBlackFridayWillReturnTrueOnNonBlackFriday(DateTimeImmutable $currentDate) {
        $this->assertTrue(isNotBlackFriday($currentDate));
    }

    function testIsNotBlackFridayWillReturnFalseWithDataSetBlackFriday20191129() {
        $blackFriday = DateTimeImmutable::createFromFormat('Y-m-d', '2019-11-29');
        $this->assertFalse(isNotBlackFriday($blackFriday));
    }
}