<?php

namespace Nisshan\NepaliCalendar\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Nisshan\NepaliCalendar\NepaliCalendarServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected array $dates ;

    protected function setUp(): void
    {
        parent::setUp();
        $this->dates = config('nepali-calendar.nepali-dates');
        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Nisshan\\NepaliCalendar\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            NepaliCalendarServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_nepali-calendar_table.php.stub';
        $migration->up();
        */
    }

    public function getFirstNepaliInValidYear() : int
    {
        return $this->dates[0][0] - 1;
    }

    public function getLastNepaliInValidYear() : int
    {
        return end($this->dates)[0] + 1;
    }
}
