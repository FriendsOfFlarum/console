<?php

namespace Flagrow\Console\Extend;

use Flagrow\Console\Providers\ConsoleProvider;
use Flarum\Extend\ExtenderInterface;
use Flarum\Extension\Extension;
use Illuminate\Contracts\Container\Container;

class EnableConsole implements ExtenderInterface
{

    public function extend(Container $container, Extension $extension = null)
    {
        $container->register(ConsoleProvider::class);
    }
}
