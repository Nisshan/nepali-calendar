<?php

namespace Nisshan\NepaliCalendar;


use InvalidArgumentException;

class NepaliCalendar
{
    //will transfer this to config at later point
    private array $nepaliDates = array(
        0 => array(2000, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        1 => array(2001, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        2 => array(2002, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        3 => array(2003, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        4 => array(2004, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        5 => array(2005, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        6 => array(2006, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        7 => array(2007, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        8 => array(2008, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 29, 31),
        9 => array(2009, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        10 => array(2010, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        11 => array(2011, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        12 => array(2012, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30),
        13 => array(2013, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        14 => array(2014, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        15 => array(2015, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        16 => array(2016, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30),
        17 => array(2017, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        18 => array(2018, 31, 32, 31, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        19 => array(2019, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        20 => array(2020, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30),
        21 => array(2021, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        22 => array(2022, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30),
        23 => array(2023, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        24 => array(2024, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30),
        25 => array(2025, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        26 => array(2026, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        27 => array(2027, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        28 => array(2028, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        29 => array(2029, 31, 31, 32, 31, 32, 30, 30, 29, 30, 29, 30, 30),
        30 => array(2030, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        31 => array(2031, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        32 => array(2032, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        33 => array(2033, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        34 => array(2034, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        35 => array(2035, 30, 32, 31, 32, 31, 31, 29, 30, 30, 29, 29, 31),
        36 => array(2036, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        37 => array(2037, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        38 => array(2038, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        39 => array(2039, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30),
        40 => array(2040, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        41 => array(2041, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        42 => array(2042, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        43 => array(2043, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30),
        44 => array(2044, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        45 => array(2045, 31, 32, 31, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        46 => array(2046, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        47 => array(2047, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30),
        48 => array(2048, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        49 => array(2049, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30),
        50 => array(2050, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        51 => array(2051, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30),
        52 => array(2052, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        53 => array(2053, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30),
        54 => array(2054, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        55 => array(2055, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        56 => array(2056, 31, 31, 32, 31, 32, 30, 30, 29, 30, 29, 30, 30),
        57 => array(2057, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        58 => array(2058, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        59 => array(2059, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        60 => array(2060, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        61 => array(2061, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        62 => array(2062, 30, 32, 31, 32, 31, 31, 29, 30, 29, 30, 29, 31),
        63 => array(2063, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        64 => array(2064, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        65 => array(2065, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        66 => array(2066, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 29, 31),
        67 => array(2067, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        68 => array(2068, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        69 => array(2069, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        70 => array(2070, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30),
        71 => array(2071, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        72 => array(2072, 31, 32, 31, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        73 => array(2073, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        74 => array(2074, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30),
        75 => array(2075, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        76 => array(2076, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30),
        77 => array(2077, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        78 => array(2078, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30),
        79 => array(2079, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        80 => array(2080, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30),
        81 => array(2081, 31, 31, 32, 32, 31, 30, 30, 30, 29, 30, 30, 30),
        82 => array(2082, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 30, 30),
        83 => array(2083, 31, 31, 32, 31, 31, 30, 30, 30, 29, 30, 30, 30),
        84 => array(2084, 31, 31, 32, 31, 31, 30, 30, 30, 29, 30, 30, 30),
        85 => array(2085, 31, 32, 31, 32, 30, 31, 30, 30, 29, 30, 30, 30),
        86 => array(2086, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 30, 30),
        87 => array(2087, 31, 31, 32, 31, 31, 31, 30, 30, 29, 30, 30, 30),
        88 => array(2088, 30, 31, 32, 32, 30, 31, 30, 30, 29, 30, 30, 30),
        89 => array(2089, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 30, 30),
        90 => array(2090, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 30, 30)
    );
    private array $nepaliDate = array('year' => '', 'month' => '', 'date' => '', 'day' => '', 'nmonth' => '', 'num_day' => '');
    private array $englishDate = array('year' => '', 'month' => '', 'date' => '', 'day' => '', 'emonth' => '', 'num_day' => '');


//    public  static function fromDate() : self
//    {
//        return new  static();
//    }

    public function englishToNepali(int $yy, int $mm, int $dd): array
    {
        // Check for date range
        $checkRange = $this->isInEnglishRange($yy, $mm, $dd);

        if($checkRange !== TRUE)
        {
            die($checkRange);
        }

        // Month data.
        $month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        // Month for leap year
        $lmonth = array(31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

        $def_eyy = 1944;    // initial english year.
        $def_nyy = 2000;    // initial nepali date in dataset
        $def_nmm = 9;       // poush => Jan

        $def_ndd = 17 - 1;  // initial nepali date.
        $total_eDays = 0;
        $day = 7 - 1;

        // Count total no. of days in-terms of  year
        for ($i = 0; $i < ($yy - $def_eyy); $i++) //total days for month calculation...(english)
        {
            if ($this->isLeapYear($def_eyy + $i) === TRUE) {
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
            if ($this->isLeapYear($yy) === TRUE) {
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
        $this->nepaliDate['nmonth'] = $this->getNepaliMonthName($m);
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
        $month = array(0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        $lmonth = array(0, 31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        // Check for date range
        $check = $this->isInNepaliRange($yy, $mm, $dd);
        if ($check !== TRUE) {
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
        $this->englishDate['emonth'] = $this->getEnglishMonth($m);
        $this->englishDate['num_day'] = $numDay;
        return $this->englishDate;
    }

    private function getDateOfWeek(int $day): int|string
    {
        return match ($day) {
            1 => "Sunday",
            2 => "Monday",
            3 => "Tuesday",
            4 => "Wednesday",
            5 => "Thursday",
            6 => "Friday",
            7 => "Saturday",
        };
    }

    private function getEnglishMonth(int $month): string
    {
        return match ($month) {
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
        };
    }

    private function getNepaliMonthName(int $month): bool|string
    {
        return match ($month) {
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
        };
    }

    //todo when nepali date is moved to config end date needs to be checked and make it dynamic

    private function isInEnglishRange(int $yy, int $mm, int $dd): bool|string
    {
        if ($yy < 1440 || $yy > 2033) {
            throw new InvalidArgumentException('Supported only between 1940-2033');
        }
        if ($mm < 1 || $mm > 12) {
            throw new InvalidArgumentException( 'Month can only contain value from 1-12');
        }
        if ($dd < 1 || $dd > 31) {
            throw new InvalidArgumentException('English Day can only contain value from 1-31');
        }
        return TRUE;
    }

    private function isInNepaliRange(int $yy, int $mm, int $dd): bool|string
    {
        if ($yy < 2000 || $yy > 2089) {
            throw new InvalidArgumentException('Supported only between 2000-2089');
        }
        if ($mm < 1 || $mm > 12) {
            throw new InvalidArgumentException( 'Month can only contain value from 1-12');
        }
        if ($dd < 1 || $dd > 32) {
            throw new InvalidArgumentException('Nepali Day can only contain value from 1-32');
        }
        return TRUE;
    }

    private function isLeapYear(int $year): bool
    {
        if ($year % 100 == 0) {
            if ($year % 400 == 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            if ($year % 4 == 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }
}
