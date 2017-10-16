<?php

namespace Flagrow\Console\Console;

use Flagrow\Console\Events\ConfigureConsoleApplication;
use Flarum\Extension\ExtensionManager;
use Flarum\Foundation\AbstractServer;
use Illuminate\Console\Application;
use Illuminate\Contracts\Events\Dispatcher;

/**
 * Console server for Flagrow
 * Based on Flarum\Console\Server
 */
class Server extends AbstractServer
{
    public function listen()
    {
        $console = $this->getConsoleApplication();

        exit($console->run());
    }

    /**
     * @return Application
     */
    protected function getConsoleApplication()
    {
        $app = $this->getApp();
        $app->make(ExtensionManager::class);
        $events = $app->make(Dispatcher::class);

        $console = new Application($app, $events, $app->version());
        $console->setName('Flagrow Console');

        $events->fire(new ConfigureConsoleApplication($app, $console));

        return $console;
    }
}
