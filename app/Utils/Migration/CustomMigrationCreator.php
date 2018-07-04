<?php

namespace App\Utils\Migration;

use Illuminate\Database\Migrations\MigrationCreator;

class CustomMigrationCreator extends MigrationCreator
{
    /**
     * Populate the place-holders in the migration stub. Immediately add postfix
     * to class name.
     *
     * @param  string $name
     * @param  string $stub
     * @param  string $table
     *
     * @return string
     */
    protected function populateStub($name, $stub, $table)
    {
        $stub = parent::populateStub(
            $name.'_'.$this->getDatePrefix(),
            $stub,
            $table
        );
        return $stub;
    }

    /**
     * Get the full path to the migration.
     *
     * @param  string $name
     * @param  string $path
     *
     * @return string
     */
    protected function getPath($name, $path)
    {
        return $path.'/'.$name.'_'.$this->getDatePrefix().'.php';
    }
}