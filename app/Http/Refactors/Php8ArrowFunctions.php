<?php

namespace App\Http\Refactors;

class Php8ArrowFunctions extends Refactor implements RefactorInterface
{
    public $title       = "Refactoring to arrow function";
    public $description = "In this refactoring we change a function call to fn, for onliners this is a huge improvement";
    public $requires    = ["php >= 7.4.0"];
    public $doc         = "https://www.php.net/manual/en/functions.arrow.php";
    public $url         = "php8-arrow-functions";

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

    public function getExplanation(): string
    {
        return '
            Arrow functions were introduced in PHP 7.4 as a more concise syntax for anonymous functions.
            Both anonymous functions and arrow functions are implemented using the Closure class.
            Arrow functions have the basic form fn (argument_list) => expr.
            Arrow functions support the same features as anonymous functions, except that using variables from 
            the parent scope is always automatic. When a variable used in the expression is defined in the parent 
            scope it will be implicitly captured by value. In the following example, the functions $fn1 and $fn2 
            behave the same way.
        ';
    }

}
