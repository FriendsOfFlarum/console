<?php

namespace Flagrow\Console;

use Illuminate\Contracts\Events\Dispatcher;

return function (Dispatcher $events) {
    $events->subscribe(Listeners\AddFlarumCommands::class);
};
