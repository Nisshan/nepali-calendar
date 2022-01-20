<?php

use Nisshan\NepaliCalendar\DateConversion;

if (! function_exists('toNepaliDate')) {
    function toNepaliDate(string $date,  string|null $format = null): string
    {
        return DateConversion::convert($date,  $format)->toNepali();
    }
}

if (! function_exists('toEnglishDate')) {
    function toEnglishDate(string $date,  string|null $format = null): string
    {
        return DateConversion::convert($date,  $format)->toEnglish();
    }
}
