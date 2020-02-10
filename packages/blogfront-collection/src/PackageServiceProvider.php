<?php

namespace LaPress\BlogFront\Collection;

use Illuminate\Support\ServiceProvider;
use LaPress\BlogFront\Collection\Commands\CreateIndexesCommand;
use LaPress\BlogFront\Collection\Commands\IndexDocumentsCommand;

/**
 * @author    Sebastian Szczepański
 * @copyright ably
 */
class PackageServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/collection.php' => config_path('collection.php'),
        ]);
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/collection.php', 'collection');
        $this->commands([
            CreateIndexesCommand::class,
            IndexDocumentsCommand::class
        ]);
    }
}
