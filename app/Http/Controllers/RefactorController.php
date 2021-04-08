<?php

namespace App\Http\Controllers;

use App\Http\Factories\RefactorFactory;

class RefactorController extends Controller
{
    public function __invoke($refactor)
    {
        $args     = request()->all();
        $refactor = RefactorFactory::create($refactor);
        $refactor->explain()->original($args)->refactor($args);

    }
}
