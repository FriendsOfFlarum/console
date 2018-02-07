<?php

namespace Flagrow\Console;

use Flarum\Foundation\Application;
use Illuminate\Contracts\Events\Dispatcher;

return function (Dispatcher $events, Application $app) {
    $app->register(Providers\ConsoleProvider::class);

    $events->subscribe(Listeners\ConfigureConsole::class);
};
