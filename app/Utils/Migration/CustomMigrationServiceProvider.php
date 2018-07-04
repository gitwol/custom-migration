<?php

namespace App\Utils\Migration;

use Illuminate\Database\MigrationServiceProvider;

class CustomMigrationServiceProvider extends MigrationServiceProvider
{
    /**
     * Register the migration creator.
     *
     * @return void
     */
    protected function registerCreator()
    {
        $this->app->singleton(
            'migration.creator',
            function ($app) {
                return new CustomMigrationCreator($app['files']);
            }
        );
    }


    /**
     * Register the migrator service.
     *
     * @return void
     */
    protected function registerMigrator()
    {
        $this->app->singleton('migrator', function ($app) {
            $repository = $app['migration.repository'];

            return new CustomMigrator($repository, $app['db'], $app['files']);
        });
    }
}