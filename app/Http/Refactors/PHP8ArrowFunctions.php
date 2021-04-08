<?php

namespace App\Http\Refactors;

class PHP8ArrowFunctions extends Refactor implements RefactorInterface
{

    public function original($args): PHP8ArrowFunctions
    {
        /** code */

        $a = 5;
        $b = 6;

        function multiply($a, $b)
        {
            return $a * $b;
        }

        $product = multiply($a, $b);

        /** end code */


        //output
        $this->showOutput(__FUNCTION__, $product);
        return $this;
    }

    public function refactor($args): PHP8ArrowFunctions
    {
        /** code */

        $a = 5;
        $b = 6;

        $multiply = fn($a, $b) => $a * $b;
        $product  = $multiply($a, $b);

        /** end code */


        //output
        $this->showOutput(__FUNCTION__, $product);
        return $this;
    }

    public function getExplanation() : string
    {
        return '
            <h1>This shows blabla</h1>
        ';
    }

}
