<?php

namespace Flagrow\Console\Events;

use Flarum\Foundation\Application as FlarumApplication;
use Illuminate\Console\Application as ConsoleApplication;

class ConfigureConsoleApplication
{
    /**
     * @var FlarumApplication
     */
    public $app;

    /**
     * @var ConsoleApplication
     */
    public $console;

    /**
     * @param FlarumApplication $app
     * @param ConsoleApplication $console
     */
    public function __construct(FlarumApplication $app, ConsoleApplication $console)
    {
        $this->app = $app;
        $this->console = $console;
    }
}
