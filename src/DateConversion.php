<?php

namespace Nisshan\NepaliCalendar;

use JetBrains\PhpStorm\Pure;

class DateConversion
{
    private int $year;
    private int $month;
    private int $day;
    private null|string $separator;

    public function __construct(int $year, int $month, int $day, string|null $separator)
    {
        $this->year = $year;
        $this->month = $month;
        $this->day = $day;
        $this->separator = $separator;
    }

    #[Pure]
    public static function convert($year, $month, $day, $separator = null): self
    {
        return new static($year, $month, $day, $separator);
    }

    public function toNepali(): string
    {
        $calendar = new NepaliCalendar();
        $nepaliDate = $calendar->englishToNepali($this->year, $this->month, $this->day);

        return $this->formatDate($nepaliDate);
    }

    public function toEnglish(): string
    {
        $calendar = new NepaliCalendar();
        $englishDate = $calendar->nepaliToEnglish($this->year, $this->month, $this->day);

        return $this->formatDate($englishDate);
    }

    //todo: to return format based on string format passed as parameter
    private function formatDate($date): string
    {
        $separator = $this->separator ?: config('nepali-calendar.date-separator');
        $year = $date['year'];
        $month = $date['month'];
        $day = $date['date'];

        return $year . $separator . $month . $separator . $day;
    }
}
