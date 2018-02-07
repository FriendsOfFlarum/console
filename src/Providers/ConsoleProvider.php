<?php

namespace Flagrow\Console\Providers;

use Flarum\Foundation\AbstractServiceProvider;
use Illuminate\Console\Scheduling\Schedule;

class ConsoleProvider extends AbstractServiceProvider
{
    public function register()
    {
        $this->app->singleton(Schedule::class);
    }
}
