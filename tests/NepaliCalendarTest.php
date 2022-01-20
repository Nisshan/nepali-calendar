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

it('throws exception when english date is smaller then first nepali date in config', function () {
    $cal = new NepaliCalendar();
    $firstEnglishDate = $cal->nepaliToEnglish($this->getFirstNepaliInValidYear(), 1, 1);
    $cal->englishToNepali($firstEnglishDate['year'], 1, 1);
})->throws(InvalidArgumentException::class, 'Invalid Date Provided');

it('throws exception when english date is greater than equivalent last nepali date from config', function () {
    $cal = new NepaliCalendar();
    $lastEnglishDate = $cal->nepaliToEnglish($this->getLastNepaliInValidYear(), 1, 1);
    $cal->englishToNepali($lastEnglishDate['year'], 1, 1);
})->throws(InvalidArgumentException::class, 'Invalid Date Provided');

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

it('throws exception when nepali date is below first date in config', function () {
    $firstNepaliDate = $this->getFirstNepaliInValidYear();
    $cal = new NepaliCalendar();
    $cal->nepaliToEnglish($firstNepaliDate, 1, 1);
})->throws(InvalidArgumentException::class, 'Invalid Date Provided');

it('throws exception when nepali date is greater than last date at config value', function () {
    $lastNepaliDate = $this->getLastNepaliInValidYear();
    $cal = new NepaliCalendar();
    $cal->nepaliToEnglish($lastNepaliDate, 1, 1);
})->throws(InvalidArgumentException::class, 'Invalid Date Provided');

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
