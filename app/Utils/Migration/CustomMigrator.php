<?php

namespace App\Utils\Migration;

use Illuminate\Database\Migrations\Migrator;
use Illuminate\Support\Str;

class CustomMigrator extends Migrator
{
    /**
     * Resolve a migration instance from a file.
     *
     * @param  string  $file
     * @return object
     */
    public function resolve($file)
    {
        if (is_numeric($file[0])) {
            return parent::resolve($file);
        }
        $class = Str::studly($file);
        return new $class;
    }
}