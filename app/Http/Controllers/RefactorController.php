<?php

namespace App\Http\Controllers;

use App\Http\Factories\RefactorFactory;

class RefactorController extends Controller
{
    public function __invoke($refactor)
    {
        ob_start();

        $args     = request()->all();
        $refactor = RefactorFactory::create($refactor);
        $refactor->explain()->original($args)->refactor($args);
        $content = ob_get_contents();
        ob_end_clean();

        $title = $refactor->title;
        $longtitle = $refactor->longtitle;
        $explanation = $refactor->getExplanation();
        return view('refactor', compact('content','title','longtitle','explanation'));
    }
}
