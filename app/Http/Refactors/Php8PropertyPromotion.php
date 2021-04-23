<?php

namespace App\Http\Refactors;

class Php8PropertyPromotion extends Refactor implements RefactorInterface
{
    public $title       = "Refactoring to property promotion";
    public $description = "In this refactoring we show the power of propery promotion, this can save you many lines of code";
    public $requires    = ['php >= 8.0.0'];
    public $doc         = "https://www.php.net/manual/en/language.oop5.decon.php";

    public function original($args): Php8PropertyPromotion
    {
        /** code */

        /** stub
        class User
        {
            public string $name;

            public string $email;

            public string $password;

            public function __construct(
                string $name,
                string $email,
                string $password
            ) {
                $this->name     = $name;
                $this->email    = $email;
                $this->password = $password;
            }
        }
        stub */

        /** end code */

        return $this;
    }

    public function refactor($args): Php8PropertyPromotion
    {
        /** code */

        /** stub
        class User
        {
            public function __construct(
                public string $name,
                public string $email,
                public string $password,
        ) {}
        }
        stub */

        /** end code */


        return $this;
    }

    public function getExplanation(): string
    {
        return '
            As of PHP 8.0.0, constructor parameters may also be promoted to correspond to an object property. 
            It is very common for constructor parameters to be assigned to a property in the constructor but 
            otherwise not operated upon. Constructor promotion provides a short-hand for that use case. 
            The example above could be rewritten as the following.       
        ';
    }

}
