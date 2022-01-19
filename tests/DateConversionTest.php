<?php

use Nisshan\NepaliCalendar\DateConversion;

it('converts to date in y-m-d format with default separator', function () {
    $nepaliDate = DateConversion::convert(2022, 1, 17)->toNepali();
    $this->assertEquals('2078-10-03', $nepaliDate);
});

it('converts to date in y/m/d format with custom separator', function () {
    $nepaliDate = DateConversion::convert(2022, 1, 17, '/')->toNepali();
    $this->assertEquals('2078/10/03', $nepaliDate);
});

it('converts date using helper function with default separator', function () {
    $nepaliDate = toNepaliDate(2022, 1, 17);
    $this->assertEquals('2078-10-03', $nepaliDate);
});


it('converts to date in y/m/d format with custom separator using helper function', function () {
    $nepaliDate = toNepaliDate(2022, 1, 17, '/');
    $this->assertEquals('2078/10/03', $nepaliDate);
});
