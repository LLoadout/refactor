<?php

namespace App\Http\Refactors;

class Php8NullSafeOperator extends Refactor implements RefactorInterface
{
    public $title       = "Refactoring to null safe operator";
    public $description = "In this refactoring we make use of the nullsafe operator, so we can get null back without blowing our code";
    public $requires    = ['php >= 8.0.0'];
    public $doc         = "https://wiki.php.net/rfc/nullsafe_operator";

    public function original($args): Php8NullSafeOperator
    {

        /** code */

        /** stub

        private function getSession()
        {
            return (object)['user' => new class {
                public function getAddress()
                {
                return (object)['country' => "Belgium"];
                }
            }];
        }
        stub */

        $session = $this->getSession();
        $country = null;

        if ($session !== null) {
            $user = $session->user;

            if ($user !== null) {
                $address = $user->getAddress();

                if ($address !== null) {
                    $country = $address->country;
                }
            }
        }

        /** end code */
        $this->showOutput(__FUNCTION__, $country);

        return $this;
    }

    public function refactor($args): Php8NullSafeOperator
    {

        $session = $this->getSession();

        /** code */

        /** stub

        private function getSession()
        {
            return (object)['user' => new class {
                public function getAddress()
                {
                    return (object)['country' => "Belgium"];
                }
            }];
        }
        stub */

        $session = $this->getSession();
        $country = $session?->user?->getAddress()?->country;

        // setting the session var to null will not blow up our code
        $session = null;
        $country2 = $session?->user?->getAddress()?->country;


        /** end code */

        $this->showOutput(__FUNCTION__, $country);
        $this->showOutput(__FUNCTION__." example 2", $country2);

        return $this;
    }

    private function getSession()
    {
        return (object)['user' => new class {
            public function getAddress()
            {
                return (object)['country' => "Belgium"];
            }
        }];
    }

    public function getExplanation(): string
    {
        return '
            As of PHP 8.0.0, you can make use of the null safe operator.
            It is fairly common to only want to call a method or fetch a 
            property on the result of an expression if it is not null.
            Currently in PHP < 8.0.0 , checking for null leads to deeper 
            nesting and repetition, this can be avoided now.      
        ';
    }

}
