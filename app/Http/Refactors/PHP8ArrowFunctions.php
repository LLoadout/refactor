<?php

namespace App\Http\Refactors;

class PHP8ArrowFunctions extends Refactor implements RefactorInterface
{

    public function original($args): PHP8ArrowFunctions
    {
        $a = 5;
        $b = 6;

        function multiply($a, $b)
        {
            return $a * $b;
        }
        $product = multiply($a, $b);

        echo "<h3>output from original method</h3>";
        echo $product;

        return $this;
    }

    public function refactor($args): PHP8ArrowFunctions
    {
        $a = 5;
        $b = 6;

        $multiply = fn($a, $b) => $a * $b;
        $product  = $multiply($a, $b);

        echo "<h3>output from refactored method</h3>";
        echo $product;

        return $this;
    }

    public function getExplanation()
    {

        $explanation = '
            <h1>This shows blabla</h1>
        ';
        return $explanation;
    }

}
