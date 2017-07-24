<?php

namespace Flagrow\Console\Console;

use Flagrow\Console\Events\ConfigureConsoleApplication;
use Flarum\Foundation\AbstractServer;
use Illuminate\Contracts\Events\Dispatcher;
use Symfony\Component\Console\Application;

/**
 * Console server for Flagrow
 * Based on Flarum\Console\Server
 */
class Server extends AbstractServer
{
    public function __construct($basePath = null, $publicPath = null)
    {
        $basePath = str_replace([
            '/vendor/bin',
            '/vendor/flagrow/console/bin',
            '/workbench/console/bin',
        ], '', $basePath);

        parent::__construct($basePath, $publicPath);
    }

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
        $console = new Application('Flarum', $app->version());

        $events = app(Dispatcher::class);
        $events->fire(new ConfigureConsoleApplication($app, $console));

        return $console;
    }
}
