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

        preg_match_all('%/\*\*&nbsp;code&nbsp;\*/(.*?)/\*\*&nbsp;end&nbsp;code&nbsp;\*/%i', $content, $matches, PREG_PATTERN_ORDER);
        preg_match_all('%/\*\* output \*/(.*?)/\*\* end output \*/%i', $content, $output, PREG_PATTERN_ORDER);

        $torefactor = str_replace(["/**&nbsp;stub", "&nbsp;stub&nbsp;*/"], "", $matches[1][0]);
        $refactored = str_replace(["/**&nbsp;stub", "&nbsp;stub&nbsp;*/"], "", $matches[1][1]);
        $output     = $output[1];

        $title       = $refactor->title;
        $description = $refactor->description;
        $explanation = $refactor->getExplanation();
        $requires    = $refactor->requires;

        return view('refactor', compact('content', 'title', 'description','requires', 'explanation', 'torefactor', 'refactored', 'output'));
    }


}
