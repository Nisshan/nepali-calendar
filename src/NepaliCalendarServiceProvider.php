<?php

namespace Nisshan\NepaliCalendar;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Nisshan\NepaliCalendar\Commands\NepaliCalendarCommand;

class NepaliCalendarServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('nepali-calendar')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_nepali-calendar_table')
            ->hasCommand(NepaliCalendarCommand::class);
    }
}
