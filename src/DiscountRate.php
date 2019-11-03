<?php

function discountRateByMembershipType($membershipType) {
    if ('platinum' === $membershipType) return 0.15;
    if ('gold' === $membershipType) return 0.1;
}