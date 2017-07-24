# ![flagrow logo](https://avatars0.githubusercontent.com/u/16413865?v=3&s=20) [Flagrow](https://discuss.flarum.org/d/1832-flagrow-extension-developer-group) Console, a project of [Gravure](https://gravure.io/).

Because you can't extend the default Flarum console commands, this package adds an alternate `php vendor/bin/flagrow` command that uses events to register new commands.

## Install

    composer require flagrow/console

Don't have Composer on your server ? You can also install it with [Bazaar](https://github.com/flagrow/bazaar).

## Usage

You don't have to enable the extension to use it.
Once installed, you can run commands from your install root like this:

    php vendor/bin/flagrow list

If you enable the extension, the `info` and `cache:clear` commands of Flarum will be loaded in the console application as well.

## Use in your extension

The real deal is using it in your own extension.
Simply require it in your extension `composer.json` file:

    "require": {
        "flagrow/console": "^0.1.0"
    },

And now listen for the `ConfigureConsoleApplication` event.
Have a look at the [AddFlarumCommands](src/Listeners/AddFlarumCommands.php) class and the [flagrow/serve](https://github.com/flagrow/serve) extension to see how it's done.

## Support our work

We prefer to keep our work available to everyone.
In order to do so we rely on voluntary contributions on [Patreon](https://www.patreon.com/flagrow).
