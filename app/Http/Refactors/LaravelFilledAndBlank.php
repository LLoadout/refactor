<?php

namespace App\Http\Refactors;

class LaravelFilledAndBlank extends Refactor implements RefactorInterface
{
    public $title       = "Laravel blank and filled helper";
    public $description = "The hand blank and filled helpers for Laravel are a nice way to determine variable state";
    public $requires    = ['laravel' => '5.5'];
    public $doc         = "https://laravel.com/docs/master/helpers#method-blank";
    public $icon        = "https://laravel.com/img/favicon/favicon.ico";


    public function original($args = null): LaravelFilledAndBlank
    {
        /** code */
        $null            = null;
        $string          = "string";
        $array           = ['a', 'b', 'c'];
        $collection      = collect($array);
        $emptyArray      = [];
        $number          = 1;
        $emptyCollection = collect([]);
        $boolean         = false;
        $allVars         = get_defined_vars();

        $blanks = $filled = $empty = [];
        foreach ($allVars as $key => $var) {
            if (!isset($var) || (is_countable($var) && count($var) === 0)) {
                array_push($blanks, $key);
            } else {
                array_push($filled, $key);
            }
            if (empty($var)) {
                array_push($empty, $key);
            }
        }

        $output = "Blanks : " . implode(', ', $blanks) . "<br />";
        $output .= "Filled : " . implode(', ', $filled) . "<br />";
        $output .= "Empty : " . implode(', ', $empty);

        /** end code */

        $this->showOutput(__FUNCTION__, $output);
        return $this;
    }

    public function refactor($args = null): LaravelFilledAndBlank
    {
        /** code */

        $null            = null;
        $string          = "string";
        $array           = ['a', 'b', 'c'];
        $collection      = collect($array);
        $emptyArray      = [];
        $number          = 1;
        $emptyCollection = collect([]);
        $boolean         = false;
        $allVars         = get_defined_vars();

        /**
         * blank() and filled() are two Laravel helpers
         */
        $blanks = collect($allVars)->filter('blank');
        $filled = collect($allVars)->filter('filled');
        $empty  = collect($allVars)->filter(fn($var) => empty($var));

        $outputRefactored = "Blanks : " . $blanks->keys()->join(', ') . "<br />";
        $outputRefactored .= "Filled : " . $filled->keys()->join(',') . "<br />";
        $outputRefactored .= "Empty : " . $empty->keys()->join(',');

        /** end code */

        $this->showOutput(__FUNCTION__, $outputRefactored);
        return $this;
    }

    public function getExplanation(): string
    {
        return '
            In this refactor we show you the power of the blank() and filled() helpers. 
            In this way you can easily determine whether a variable if filled, thus has a value.
        ';
    }

}
