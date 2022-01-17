<?php

use Nisshan\NepaliCalendar\NepaliCalendar;

it('convert today english date to nepali', function () {
    $cal = new NepaliCalendar();
    $nepaliDate = $cal->englishToNepali(2022, 1, 17);

    $expectedNepaliDate = [
        "year" => 2078,
        "month" => 10,
        "date" => "03",
        "day" => "Monday",
        "nmonth" => "Magh",
        "num_day" => 2,
    ];

    $this->assertEquals($expectedNepaliDate, $nepaliDate);
});

it('convert today nepali date to english', function () {
    $cal = new NepaliCalendar();
    $englishDate = $cal->nepaliToEnglish(2078, 10, 3);

    $expectedEnglishDate = [
        "year" => 2022,
        "month" => 1,
        "date" => "17",
        "day" => "Monday",
        "emonth" => "January",
        "num_day" => 2,
    ];

    $this->assertEquals($expectedEnglishDate, $englishDate);
});

it('throws exception when english date is below 1439', function () {
    $cal = new NepaliCalendar();
    $cal->englishToNepali(1439, 1, 1);
})->throws(InvalidArgumentException::class, 'Supported only between 1940-2033');

it('throws exception when english date is greater than 2033', function () {
    $cal = new NepaliCalendar();
    $cal->englishToNepali(2034, 1, 1);
})->throws(InvalidArgumentException::class, 'Supported only between 1940-2033');

it('throws exception when english month is less than 1', function () {
    $cal = new NepaliCalendar();
    $cal->englishToNepali(2022, 0, 17);
})->throws(InvalidArgumentException::class, 'Month can only contain value from 1-12');

it('throws exception when english month is greater than 12', function () {
    $cal = new NepaliCalendar();
    $cal->englishToNepali(2022, 13, 17);
})->throws(InvalidArgumentException::class, 'Month can only contain value from 1-12');

it('throws exception when english day is less than than 1', function () {
    $cal = new NepaliCalendar();
    $cal->englishToNepali(2022, 12, 0);
})->throws(InvalidArgumentException::class, 'English Day can only contain value from 1-31');

it('throws exception when english day is greater than than 31', function () {
    $cal = new NepaliCalendar();
    $cal->englishToNepali(2022, 12, 32);
})->throws(InvalidArgumentException::class, 'English Day can only contain value from 1-31');


it('throws exception when nepali date is below 2000', function () {
    $cal = new NepaliCalendar();
    $cal->nepaliToEnglish(1999, 1, 1);
})->throws(InvalidArgumentException::class, 'Supported only between 2000-2089');

it('throws exception when nepali date is greater than 2090', function () {
    $cal = new NepaliCalendar();
    $cal->nepaliToEnglish(2090, 1, 1);
})->throws(InvalidArgumentException::class, 'Supported only between 2000-2089');

it('throws exception when nepali month is less than 1', function () {
    $cal = new NepaliCalendar();
    $cal->nepaliToEnglish(2078, 0, 3);
})->throws(InvalidArgumentException::class, 'Month can only contain value from 1-12');

it('throws exception when nepali month is greater than 12', function () {
    $cal = new NepaliCalendar();
    $cal->nepaliToEnglish(2078, 13, 3);
})->throws(InvalidArgumentException::class, 'Month can only contain value from 1-12');

it('throws exception when nepali day is less than than 1', function () {
    $cal = new NepaliCalendar();
    $cal->nepaliToEnglish(2078, 12, 0);
})->throws(InvalidArgumentException::class, 'Nepali Day can only contain value from 1-32');

it('throws exception when nepali day is greater than than 32', function () {
    $cal = new NepaliCalendar();
    $cal->nepaliToEnglish(2078, 12, 33);
})->throws(InvalidArgumentException::class, 'Nepali Day can only contain value from 1-32');
