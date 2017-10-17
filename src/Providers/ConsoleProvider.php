<?php

namespace Flagrow\Console\Providers;

use Flagrow\Console\Events\ConfigureConsoleApplication;
use Flarum\Debug\Console\CacheClearCommand;
use Flarum\Debug\Console\InfoCommand;
use Flarum\Foundation\AbstractServiceProvider;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Console\Scheduling\ScheduleRunCommand;
use Illuminate\Contracts\Events\Dispatcher as Events;

class ConsoleProvider extends AbstractServiceProvider
{
    /**
     * @var array
     */
    protected $commands = [
        ScheduleRunCommand::class,
        InfoCommand::class,
        CacheClearCommand::class
    ];

    /**
     *
     */
    public function register()
    {
        $this->app->singleton(Schedule::class);

        $this->app
            ->make(Events::class)
            ->listen(ConfigureConsoleApplication::class, [$this, 'addCommands']);
    }

    /**
     * @param ConfigureConsoleApplication $event
     */
    public function addCommands(ConfigureConsoleApplication $event)
    {
        if (!$this->app->isInstalled()) {
            return;
        }

        $config = $this->app->make('flarum.config');

        foreach($this->commands as $command) {
            $event->console->add(
                $this->app->make($command, compact('config'))
            );
        }
    }
}