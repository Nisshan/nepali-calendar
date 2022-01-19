<?php

use Nisshan\NepaliCalendar\DateConversion;

if (! function_exists('toNepaliDate')) {
    function toNepaliDate(int $year, int $month, int $day, string|null $separator = null): string
    {
        return DateConversion::convert($year, $month, $day, $separator)->toNepali();
    }
}

if (! function_exists('toEnglishDate')) {
    function toEnglishDate(int $year, int $month, int $day, string|null $separator = null): string
    {
        return DateConversion::convert($year, $month, $day, $separator)->toEnglish();
    }
}
