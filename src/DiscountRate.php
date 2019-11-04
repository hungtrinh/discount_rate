<?php
use DateTimeImmutable;

function isNotBlackFriday(DateTimeImmutable $currentDate) {
    $isNotFriday = 5 !== (int) $currentDate->format('N');
    $isNotNovember = 11 !== (int) $currentDate->format('n');
    $dayOfMonth = (int) $currentDate->format('j');
    $isNotBlackFriday = $isNotFriday || $isNotNovember  || $dayOfMonth < 23 || $dayOfMonth > 29;
    return $isNotBlackFriday;
}

function discountRateByMembershipType($membershipType, DateTimeImmutable $currentDate) {
    if (isNotBlackFriday($currentDate)) return 0;
    if ('platinum' === $membershipType) return 0.15;
    if ('gold' === $membershipType) return 0.1;
    if ('silver' === $membershipType) return 0.05;
    throw new UnexpectedValueException('invalid membership type');
}