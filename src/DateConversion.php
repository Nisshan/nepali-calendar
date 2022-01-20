<?php

namespace Nisshan\NepaliCalendar;

class DateConversion
{
    private string $date;
    private string|null $format;

    public function __construct(string $date, string|null $format)
    {
        $this->date = $date;
        $this->format = $format;
    }

    public static function convert($date, $format = null): self
    {
        return new static($date, $format);
    }

    public function toNepali(): string
    {
        $date = $this->changeDateFormat();
        $calendar = new NepaliCalendar();
        $nepaliDate = $calendar->englishToNepali($date[0], $date[1], $date[2]);

        return $this->formatDate($nepaliDate);
    }

    public function toEnglish(): string
    {
        $date = $this->changeDateFormat();
        $calendar = new NepaliCalendar();
        $englishDate = $calendar->nepaliToEnglish($date[0], $date[1], $date[2]);

        return $this->formatDate($englishDate);
    }

    private function formatDate($date): string
    {
        $dateFormat = $this->explodeFormat();

        return collect($dateFormat)->reduce(function ($formatedDate, $part) use ($date) {
            return $formatedDate . $this->dateLookupTable($date, $part);
        });
    }

    private function changeDateFormat(): array
    {
        return explode('-', $this->date);
    }

    private function explodeFormat(): array
    {
        $format = $this->format ?: config('nepali-calendar.date-format');

        return str_split($format);
    }

    private function dateLookupTable($date, $format): string|null
    {
        if (! in_array($format, ['Y','M','D','d','m','y'])) {
            return $format;
        }

        return [
            'Y' => $date['year'],
            'y' => $date['year'],
            'M' => $date['mname'],
            'D' => $date['day'],
            'd' => $date['date'],
            'm' => $date['month'],
        ][$format];
    }
}
