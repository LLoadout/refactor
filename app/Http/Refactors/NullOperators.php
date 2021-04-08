<?php

namespace App\Http\Refactors;

class NullOperators extends Refactor implements RefactorInterface
{

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

        $this->showOutput(__FUNCTION__." - example 1", $_GET['status']);

        // Example 2 : With the null coalescing assignment operator it can even be more simplified:
        $_GET['status'] ??= 'no status defined';

        /** end code  */


        $this->showOutput(__FUNCTION__." - example 2", $_GET['status']);
        return $this;
    }

    public function getExplanation() : string
    {
        return '
            <h1>This page explains the null coalescense operator and the null assignment operator</h1>
            <a href="https://www.php.net/manual/en/language.operators.comparison.php#language.operators.comparison.coalesce">https://www.php.net/manual/en/language.operators.comparison.php#language.operators.comparison.coalesce</a>
            <hr />
        ';
    }

}
