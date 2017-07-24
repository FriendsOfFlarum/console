<?php

namespace Flagrow\Console\Listeners;

use Flagrow\Console\Events\ConfigureConsoleApplication;
use Flarum\Debug\Console\CacheClearCommand;
use Flarum\Debug\Console\InfoCommand;
use Illuminate\Contracts\Events\Dispatcher;

class AddFlarumCommands
{
    public function subscribe(Dispatcher $events)
    {
        $events->listen(ConfigureConsoleApplication::class, [$this, 'addCommands']);
    }

    /**
     * Register some basic Flarum commands in our package. It's not necessary but might come useful. it's also a good demo
     * Based on Flarum\Console\Server::getConsoleApplication()
     * We do not register install or update commands from Flarum, these should be handled by the official commands
     * @param ConfigureConsoleApplication $event
     */
    public function addCommands(ConfigureConsoleApplication $event)
    {
        if ($event->app->isInstalled()) {
            $config = $event->app->make('flarum.config');

            $commands = [
                InfoCommand::class,
                CacheClearCommand::class,
            ];

            foreach ($commands as $command) {
                $event->console->add($event->app->make(
                    $command,
                    ['config' => $config]
                ));
            }
        }
    }
}
