<?php

namespace Nisshan\NepaliCalendar;

use Nisshan\NepaliCalendar\Commands\NepaliCalendarCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
            ->hasConfigFile();
    }
}
