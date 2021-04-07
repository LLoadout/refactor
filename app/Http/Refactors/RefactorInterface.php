<?php

namespace App\Http\Refactors;

interface RefactorInterface
{
    public function original($args);

    public function refactor($args);

    public function getExplanation();

    public function explain();
}
