<?php

namespace Flagrow\Console\Listeners;

use Flarum\Console\Event\Configuring;
use Illuminate\Console\Scheduling\ScheduleRunCommand;
use Illuminate\Contracts\Events\Dispatcher;

class ConfigureConsole
{
    /**
     * @var array
     */
    protected $commands = [
        ScheduleRunCommand::class,
    ];

    public function subscribe(Dispatcher $events)
    {
        $events->listen(Configuring::class, [$this, 'configure']);
    }

    public function configure(Configuring $event)
    {
        if ($event->app->isInstalled()) {
            $config = $event->app->make('flarum.config');

            foreach ($this->commands as $command) {
                $event->console->add(
                    $event->app->make($command, compact('config'))
                );
            }
        }
    }
}
