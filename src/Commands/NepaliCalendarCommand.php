<?php

namespace Nisshan\NepaliCalendar\Commands;

use Illuminate\Console\Command;

class NepaliCalendarCommand extends Command
{
    public $signature = 'nepali-calendar';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
