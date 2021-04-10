<?php

namespace App\Http\Refactors;

class NullOperators extends Refactor implements RefactorInterface
{
    public $title       = "Refactoring to null coalescing operators";
    public $description = "In this refactoring we refactor isset to the null coalescing operator and expand 
                         it with the null coalescing assignment operator";
    public $requires    = ['php >= 7.0.0'];


    public function original($args): NullOperators
    {
        /** code */

        // Fetches the value of $_GET['status']
        // and returns 'no status defined' if it does not exist.

        $status = isset($_GET['status']) ? $_GET['status'] : 'no status defined';

        /** end code */


        $this->showOutput(__FUNCTION__, $status);
        return $this;
    }

    public function refactor($args): NullOperators
    {
        /** code */

        // Example 1 : With the null coalescing operator
        $_GET['status'] = $_GET['status'] ?? 'no status defined';

        $this->showOutput(__FUNCTION__ . " - example 1", $_GET['status']);

        // Example 2 : With the null coalescing assignment operator it can even be more simplified:
        $_GET['status'] ??= 'no status defined';

        /** end code */


        $this->showOutput(__FUNCTION__ . " - example 2", $_GET['status']);
        return $this;
    }

    public function getExplanation(): string
    {
        return '
            The null coalescing operator (??) has been added as syntactic sugar for the common case of 
            needing to use a ternary in conjunction with isset(). It returns its first operand if it exists
            and is not null; otherwise it returns its second operand.
            <br/><br/>
            source: https://www.php.net
        ';
    }

}
