<?php


namespace App\Http\Factories;

use Illuminate\Support\Str;

class RefactorFactory
{
    public static function create($module)
    {
        return app('App\Http\Refactors\\' . Str::studly($module));
    }
}
