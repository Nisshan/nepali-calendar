<?php

namespace Nisshan\NepaliCalendar\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Nisshan\NepaliCalendar\NepaliCalendar
 */
class NepaliCalendar extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'nepali-calendar';
    }
}
