<?php

namespace Flagrow\Console;

use Flarum\Foundation\Application;

return function (Application $app) {
    // In case the extension is enabled.
    $app->register(Providers\ConsoleProvider::class);
};
