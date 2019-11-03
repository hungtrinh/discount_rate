<?php

function discountRateByMembershipType($membershipType) {
    if ('platinum' === $membershipType) return 0.15;
}