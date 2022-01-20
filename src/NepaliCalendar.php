<?php

namespace Nisshan\NepaliCalendar;

use InvalidArgumentException;

class NepaliCalendar
{
    private array $nepaliDates;

    public function __construct()
    {
        $this->nepaliDates = config('nepali-calendar.nepali-dates');
    }

    private array $nepaliDate = ['year' => '', 'month' => '', 'date' => '', 'day' => '', 'mname' => '', 'num_day' => ''];
    private array $englishDate = ['year' => '', 'month' => '', 'date' => '', 'day' => '', 'mname' => '', 'num_day' => ''];

    public function englishToNepali(int $yy, int $mm, int $dd): array
    {
        // Check for date range
        $checkRange = $this->isInEnglishRange($yy, $mm, $dd);

        if ($checkRange !== true) {
            die($checkRange);
        }

        // Month data.
        $month = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
        // Month for leap year
        $lmonth = [31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

        $def_eyy = 1944;    // initial english year.
        $def_nyy = 2000;    // initial nepali date in dataset
        $def_nmm = 9;       // poush => Jan

        $def_ndd = 17 - 1;  // initial nepali date.
        $total_eDays = 0;
        $day = 7 - 1;

        // Count total no. of days in-terms of  year
        for ($i = 0; $i < ($yy - $def_eyy); $i++) { //total days for month calculation...(english)
            if ($this->isLeapYear($def_eyy + $i) === true) {
                for ($j = 0; $j < 12; $j++) {
                    $total_eDays += $lmonth[$j];
                }
            } else {
                for ($j = 0; $j < 12; $j++) {
                    $total_eDays += $month[$j];
                }
            }
        }


        // Count total no. of days in-terms of month
        for ($i = 0; $i < ($mm - 1); $i++) {
            if ($this->isLeapYear($yy) === true) {
                $total_eDays += $lmonth[$i];
            } else {
                $total_eDays += $month[$i];
            }
        }

        // Count total no. of days in-terms of date
        $total_eDays += $dd;

        $i = 0;         // year array key
        $j = $def_nmm; // month array key for year
        $total_nDays = $def_ndd;

        $m = $def_nmm;
        $y = $def_nyy;

        // Count nepali date from array
        while ($total_eDays != 0) {
            $monthDaysOfYear = $this->nepaliDates[$i][$j];

            $total_nDays++;     //count the days
            $day++;             //count the days in terms of 7 days
            if ($total_nDays > $monthDaysOfYear) {
                $m++;
                $total_nDays = 1;
                $j++;
            }

            if ($day > 7) {
                $day = 1;
            }

            if ($m > 12) {
                $y++;
                $m = 1;
            }

            if ($j > 12) {
                $j = 1;
                $i++;
            }

            $total_eDays--;
        }

        $numDay = $day;
        $this->nepaliDate['year'] = $y;
        $this->nepaliDate['month'] = $m <= 9 ? "0" . $m : $m;
        $this->nepaliDate['date'] = $total_nDays <= 9 ? "0" . $total_nDays : $total_nDays;
        $this->nepaliDate['day'] = $this->getDateOfWeek($day);
        $this->nepaliDate['mname'] = $this->getNepaliMonthName($m);
        $this->nepaliDate['num_day'] = $numDay;

        return $this->nepaliDate;
    }

    public function nepaliToEnglish(int $yy, int $mm, int $dd): array
    {
        $def_eyy = 1943;
        $def_emm = 4;
        $def_edd = 14 - 1;  // initial english date.
        $def_nyy = 2000;
        $total_nDays = 0;
        $day = 4 - 1;
        $k = 0;
        $month = [0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
        $lmonth = [0, 31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
        // Check for date range
        $check = $this->isInNepaliRange($yy, $mm, $dd);
        if ($check !== true) {
            die($check);
        }

        // Count total days in-terms of year
        for ($i = 0; $i < ($yy - $def_nyy); $i++) {
            for ($j = 1; $j <= 12; $j++) {
                $total_nDays += $this->nepaliDates[$k][$j];
            }
            $k++;
        }
        // Count total days in-terms of month
        for ($j = 1; $j < $mm; $j++) {
            $total_nDays += $this->nepaliDates[$k][$j];
        }
        // Count total days in-terms of dat
        $total_nDays += $dd;
        // Calculation of equivalent english date...
        $total_eDays = $def_edd;
        $m = $def_emm;
        $y = $def_eyy;
        while ($total_nDays != 0) {
            if ($this->isLeapYear($y)) {
                $a = $lmonth[$m];
            } else {
                $a = $month[$m];
            }
            $total_eDays++;
            $day++;
            if ($total_eDays > $a) {
                $m++;
                $total_eDays = 1;
                if ($m > 12) {
                    $y++;
                    $m = 1;
                }
            }
            if ($day > 7) {
                $day = 1;
            }
            $total_nDays--;
        }

        $numDay = $day;
        $this->englishDate['year'] = $y;
        $this->englishDate['month'] = $m;
        $this->englishDate['date'] = $total_eDays;
        $this->englishDate['day'] = $this->getDateOfWeek($day);
        $this->englishDate['mname'] = $this->getEnglishMonth($m);
        $this->englishDate['num_day'] = $numDay;

        return $this->englishDate;
    }

    private function getDateOfWeek(int $day): string
    {
        return[
            1 => "Sunday",
            2 => "Monday",
            3 => "Tuesday",
            4 => "Wednesday",
            5 => "Thursday",
            6 => "Friday",
            7 => "Saturday",
        ][$day];



    }

    private function getEnglishMonth(int $month): string
    {
        return [
            1 => "January",
            2 => "February",
            3 => "March",
            4 => "April",
            5 => "May",
            6 => "June",
            7 => "July",
            8 => "August",
            9 => "September",
            10 => "October",
            11 => "November",
            12 => "December",
        ][$month];
    }

    private function getNepaliMonthName(int $month): string
    {
        return [
            1 => "Baishak",
            2 => "Jestha",
            3 => "Ashad",
            4 => "Shrawn",
            5 => "Bhadra",
            6 => "Ashwin",
            7 => "kartik",
            8 => "Mangshir",
            9 => "Poush",
            10 => "Magh",
            11 => "Falgun",
            12 => "Chaitra",
        ][$month];
    }

    private function isInEnglishRange(int $yy, int $mm, int $dd): bool
    {
        if ($yy < $this->getFirstEnglishInvalidYear() || $yy > $this->getLastEnglishInvalidYear()) {
            throw new InvalidArgumentException('Invalid Date Provided');
        }
        if ($mm < 1 || $mm > 12) {
            throw new InvalidArgumentException('Month can only contain value from 1-12');
        }
        if ($dd < 1 || $dd > 31) {
            throw new InvalidArgumentException('English Day can only contain value from 1-31');
        }

        return true;
    }

    private function isInNepaliRange(int $yy, int $mm, int $dd): bool
    {
        if ($yy < $this->getFirstNepaliInValidYear() || $yy > $this->getLastNepaliInValidYear()) {
            throw new InvalidArgumentException('Invalid Date Provided');
        }
        if ($mm < 1 || $mm > 12) {
            throw new InvalidArgumentException('Month can only contain value from 1-12');
        }
        if ($dd < 1 || $dd > 32) {
            throw new InvalidArgumentException('Nepali Day can only contain value from 1-32');
        }

        return true;
    }

    private function isLeapYear(int $year): bool
    {
        if ($year % 100 == 0) {
            if ($year % 400 == 0) {
                return true;
            } else {
                return false;
            }
        } else {
            if ($year % 4 == 0) {
                return true;
            } else {
                return false;
            }
        }
    }

    private function getLastNepaliInValidYear(): int
    {
        return end($this->nepaliDates)[0];
    }

    private function getFirstNepaliInValidYear(): int
    {
        return $this->nepaliDates[0][0];
    }

    private function getLastEnglishInvalidYear(): int
    {
        $date = $this->nepaliToEnglish($this->getLastNepaliInValidYear(), 1, 1);

        return $date['year'];
    }

    private function getFirstEnglishInvalidYear(): int
    {
        $date = $this->nepaliToEnglish($this->getFirstNepaliInValidYear(), 1, 1);

        return $date['year'];
    }
}
